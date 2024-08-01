<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ReportDailyHotelController extends Controller
{
    public function index()
    {
        // if (\Auth::user()->can('manage report') ) {
        //     $report = Transaction::where('parent_id', '=', parentId())->get();
           
        // } else {
        //     return redirect()->back()->with('error', __('Permission denied.'));
        // }
        $startDate = $request->input('entry_date', date('Y-m-d'));
        $start=$startDate." 00:00:00";
        $endDate = $request->input('end_date', date('Y-m-d'));
        $hotel = $request->input('hotel');
        $end=$endDate." 23:59:59";
        $results = DB::select("
         SELECT 
    t.tiketno,t.datetransact,t.dateout,t.duration,t.cost,t.paymentby,t.vehicleid,h.plat_no,h.room_no,h.guest_name,h.check_in,h.check_out
FROM 
    transactions t
left outer join hotels h on h.uidno = t.tiketno
WHERE 
    t.alreadyout = 'x' AND
    t.statusparking = 'Casual' AND
    t.vehicleid IN ('Mobil', 'Motor') AND
    h.user_id=? AND
    t.dateout BETWEEN ? AND ?
           
            ORDER BY 
                t.dateout DESC;
        ", [$hotel,$start, $end]);
        return view('reportdailyhotel.index',compact('results'));
    }


    public function getPaymentHotelReport(Request $request)
    {
        // if (\Auth::user()->can('manage report') ) {
        //     $report = Transaction::where('parent_id', '=', parentId())->get();
           
        // } else {
        //     return redirect()->back()->with('error', __('Permission denied.'));
        // }
        $startDate = $request->input('entry_date', date('Y-m-d'));
        $start=$startDate." 00:00:00";
        $endDate = $request->input('end_date', date('Y-m-d'));
        $hotel = $request->input('hotel');
        $end=$endDate." 23:59:59";
        $results = DB::select("
         SELECT 
    t.tiketno,t.datetransact,t.dateout,t.duration,t.cost,t.paymentby,t.vehicleid,h.room_no,h.plat_no,h.guest_name,h.check_in,h.check_out
FROM 
    transactions t
left outer join hotels h on h.uidno = t.tiketno
WHERE 
    t.alreadyout = 'x' AND
    t.statusparking = 'Casual' AND
    t.vehicleid IN ('Mobil', 'Motor') AND
    h.user_id=? AND
    t.dateout BETWEEN ? AND ?
           
            ORDER BY 
                t.dateout DESC;
        ", [$hotel,$start, $end]);
        return view('reportdailyhotel.index',compact('results'));
    }

   
}
