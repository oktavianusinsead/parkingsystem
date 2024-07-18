<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ReportDailyController extends Controller
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
        $end=$endDate." 23:59:59";
        $results = DB::select("
        SELECT 
    tiketno,datetransact,dateout,duration,cost,paymentby,vehicleid
FROM 
    transactions
WHERE 
    alreadyout = 'x' AND
    statusparking = 'Casual' AND
    vehicleid IN ('Mobil', 'Motor') AND
    dateout BETWEEN '2024-07-01 00:00:00' and '2024-07-01 23:59:59'
GROUP BY 
    DATE(dateout)
ORDER BY 
    DATE(dateout);
        ");
        return view('reportdaily.index',compact('results'));
    }


    public function getPaymentReport(Request $request)
    {
        // if (\Auth::user()->can('manage report') ) {
        //     $report = Transaction::where('parent_id', '=', parentId())->get();
           
        // } else {
        //     return redirect()->back()->with('error', __('Permission denied.'));
        // }
        $startDate = $request->input('entry_date', date('Y-m-d'));
        $start=$startDate." 00:00:00";
        $endDate = $request->input('end_date', date('Y-m-d'));
        $end=$endDate." 23:59:59";
        $results = DB::select("
         SELECT 
    tiketno,datetransact,dateout,duration,cost,paymentby,vehicleid
FROM 
    transactions
WHERE 
    alreadyout = 'x' AND
    statusparking = 'Casual' AND
    vehicleid IN ('Mobil', 'Motor') AND
    dateout BETWEEN ? AND ?
           
            ORDER BY 
                dateout DESC;
        ", [$start, $end]);
        return view('reportdaily.index',compact('results'));
    }

   
}
