<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\Custom;
use App\Models\NoticeBoard;
use App\Models\PackageTransaction;
use App\Models\Parking;
use App\Models\ParkingSlot;
use App\Models\ParkingZone;
use App\Models\Subscription;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {

        if (\Auth::check()) {
            $start = strtotime(date('Y-m'));
            $end = strtotime(date('Y-12'));
            $currentDate = $start;
            $month = date('m', $currentDate);
            if (\Auth::user()->type == 'super admin') {
                $result['totalOrganization'] = User::where('type', 'owner')->count();
                $result['totalSubscription'] = Subscription::count();
                $result['totalTransaction'] = PackageTransaction::count();
                $result['totalIncome'] = PackageTransaction::sum('amount');
                $result['totalNote'] = NoticeBoard::where('parent_id', parentId())->count();
                $result['totalContact'] = Contact::where('parent_id', parentId())->count();


                $result['organizationByMonth'] = $this->organizationByMonth();
                $result['paymentByMonth'] = $this->paymentByMonth();

                return view('dashboard.super_admin', compact('result'));
            } else {
                $sdate = strtotime(date('Y-m-d'))." 00:00:00";
                $edate = strtotime(date('Y-m-d'))." 23:59:59";
                $startDate = Carbon::today()->startOfDay()->toDateTimeString();
                //cc($edate);
// End date (today at 23:59:59)
                $endDate = Carbon::today()->endOfDay()->toDateTimeString();

                $startMonth = Carbon::now()->startOfMonth()->startOfDay();

    // End date for the current month
    $endMonth = Carbon::now()->endOfMonth()->endOfDay();
                
                $result['totalmobil'] =DB::table('transactions')
                ->whereBetween('datetransact', [$startDate, $endDate])
                ->where('vehicleid','Mobil')
                ->count();
                $result['totaloutmobil'] =DB::table('transactions')
                ->whereBetween('dateout', [$startDate, $endDate])
                ->where('vehicleid','Mobil')
                ->where('alreadyout','x')
                ->count();
                $result['totalmotor'] =DB::table('transactions')
                ->whereBetween('datetransact', [$startDate, $endDate])
                ->where('vehicleid','Motor')
                ->count();
                $result['totalout'] =DB::table('transactions')
                ->whereBetween('dateout', [$startDate, $endDate])
                ->where('vehicleid','Motor')
                ->where('alreadyout','x')
                ->count();
                $result['mandiri'] =DB::table('transactions')
                ->whereBetween('dateout', [$startDate, $endDate])
                ->where('paymentby','Mandiri')
                ->where('alreadyout','x')
                ->count();
                $result['bca'] =DB::table('transactions')
                ->whereBetween('dateout', [$startDate, $endDate])
                ->where('paymentby','BCA')
                ->where('alreadyout','x')
                ->count();
                $result['bri'] =DB::table('transactions')
                ->whereBetween('dateout', [$startDate, $endDate])
                ->where('paymentby','BRI')
                ->where('alreadyout','x')
                ->count();
                $result['bni'] =DB::table('transactions')
                ->whereBetween('dateout', [$startDate, $endDate])
                ->where('paymentby','BNI')
                ->where('alreadyout','x')
                ->count();
                $result['availableSlot'] = ParkingSlot::where('parent_id', parentId())->where('is_available',1)->count();
                $result['todayIncome'] =DB::table('transactions')
                ->whereBetween('dateout', [$startDate, $endDate])
                ->where('alreadyout','x')
                ->sum('cost');

                $result['monthlyincome'] =DB::table('transactions')
                ->whereBetween('dateout', [$startMonth, $endMonth])
                ->where('alreadyout','x')
                ->sum('cost');
                //echo "Total cost: " . $result['todayIncome'];
                $result['income'] = $this->getIncome();
                $result['monthlyIncome'] = Parking::where('parent_id', parentId())->whereMonth('entry_date',$month)->sum('amount');
                $result['qty'] = $this->getQty();
                $result['settings']=settings();
                $result['membermobilout'] =DB::table('transactions')
                ->whereBetween('dateout', [$startMonth, $endMonth])
                ->where('alreadyout','x')
                ->where('statusparking','Member')
                ->where('vehicleid','Mobil')
                ->count('transactionid');
                $result['membermotorin'] =DB::table('transactions')
                ->whereBetween('dateout', [$startMonth, $endMonth])
                ->where('statusparking','Member')
                ->where('vehicleid','Motor')
                ->where('alreadyout','x')
                ->count('transactionid');

               return view('dashboard.index', compact('result'));
            }
        } else {
            if (!file_exists(setup())) {
                header('location:install');
                die();
            } else {
                $landingPage=getSettingsValByName('landing_page');

                if($landingPage=='on'){
                    return view('layouts.landing');
                }else{
                    return redirect()->route('login');
                }
            }

        }

    }

    public function getIncome()
    {
        $interval = [];
        $previousWeekData = strtotime("-2 week +1 day");
        for ($i = 0; $i < 14; $i++) {
            $interval[date('Y-m-d', $previousWeekData)] = date('d-M', $previousWeekData);
            $previousWeekData = strtotime(date('Y-m-d', $previousWeekData) . " +1 day");
        }

        $result = [];
        $result['label'] = [];
        $result['data'] = [];
        foreach ($interval as $date => $label) {
            $sumIncome = Transaction::whereDate('dateout', $date)->sum('cost');
            $result['label'][] = $label;
            $result['data'][] = $sumIncome;
        }

        return $result;

        
    }

    public function getQty()
    {
        $interval = [];
        $previousWeekData = strtotime("-2 week +1 day");
        for ($i = 0; $i < 14; $i++) {
            $interval[date('Y-m-d', $previousWeekData)] = date('d-M', $previousWeekData);
            $previousWeekData = strtotime(date('Y-m-d', $previousWeekData) . " +1 day");
        }

        $result = [];
        $result['label'] = [];
        $result['data'] = [];
        foreach ($interval as $date => $label) {
            $sumQty = Transaction::whereDate('dateout', $date)->count('transactionid');
            $result['label'][] = $label;
            $result['data'][] = $sumQty;
        }

        return $result;

        
    }


    public function organizationByMonth()
    {
        $start = strtotime(date('Y-01'));
        $end = strtotime(date('Y-12'));
        $currentDate = $start;
        $organization = [];
        while ($currentDate <= $end) {
            $organization['label'][] = date('M-Y', $currentDate);
            $month = date('m', $currentDate);
            $year = date('Y', $currentDate);
            $organization['data'][] = User::where('type', 'owner')->whereMonth('created_at', $month)->whereYear('created_at', $year)->count();
            $currentDate = strtotime('+1 month', $currentDate);
        }
        return $organization;
    }

    public function paymentByMonth()
    {
        $start = strtotime(date('Y-01'));
        $end = strtotime(date('Y-12'));
        $currentDate = $start;
        $payment = [];
        while ($currentDate <= $end) {
            $payment['label'][] = date('M-Y', $currentDate);
            $month = date('m', $currentDate);
            $year = date('Y', $currentDate);
            $payment['data'][] = PackageTransaction::whereMonth('created_at', $month)->whereYear('created_at', $year)->sum('amount');
            $currentDate = strtotime('+1 month', $currentDate);
        }
        return $payment;
    }

}
