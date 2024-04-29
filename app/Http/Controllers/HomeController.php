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
use App\Models\User;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {

        if (\Auth::check()) {
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
                $result['totalZone'] = ParkingZone::where('parent_id', parentId())->count();
                $result['totalSlot'] = ParkingSlot::where('parent_id', parentId())->count();
                $result['availableSlot'] = ParkingSlot::where('parent_id', parentId())->where('is_available',1)->count();
                $result['todayIncome'] =Parking::where('parent_id', parentId())->where('entry_date',date('Y-m-d'))->sum('amount');
                $result['income'] = $this->getIncome();

                $result['settings']=settings();


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
        // foreach ($interval as $date => $label) {
        //     $result = Parking::where('parent_id',parentId())->whereDate('entry_date', $date)->sum('amount');
        //     $result['label'][] = $label;
        //     $result['data'][] = $result;
        // }

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
