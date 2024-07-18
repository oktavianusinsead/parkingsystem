<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ReportSummaryController extends Controller
{
    public function index()
    {
        // if (\Auth::user()->can('manage report') ) {
        //     $report = Transaction::where('parent_id', '=', parentId())->get();
           
        // } else {
        //     return redirect()->back()->with('error', __('Permission denied.'));
        // }
        
        $results = DB::select("
        SELECT 
    DATE(dateout) AS date,
    SUM(CASE WHEN paymentby = 'Mandiri' AND vehicleid = 'Mobil' THEN cost ELSE 0 END) AS Mandiri_Mobil,
    SUM(CASE WHEN paymentby = 'Mandiri' AND vehicleid = 'Motor' THEN cost ELSE 0 END) AS Mandiri_Motor,
    SUM(CASE WHEN paymentby = 'BCA' AND vehicleid = 'Mobil' THEN cost ELSE 0 END) AS BCA_Mobil,
    SUM(CASE WHEN paymentby = 'BCA' AND vehicleid = 'Motor' THEN cost ELSE 0 END) AS BCA_Motor,
    SUM(CASE WHEN paymentby = 'BNI' AND vehicleid = 'Mobil' THEN cost ELSE 0 END) AS BNI_Mobil,
    SUM(CASE WHEN paymentby = 'BNI' AND vehicleid = 'Motor' THEN cost ELSE 0 END) AS BNI_Motor,
    SUM(CASE WHEN paymentby = 'BRI' AND vehicleid = 'Mobil' THEN cost ELSE 0 END) AS BRI_Mobil,
    SUM(CASE WHEN paymentby = 'BRI' AND vehicleid = 'Motor' THEN cost ELSE 0 END) AS BRI_Motor
FROM 
    transactions
WHERE 
    alreadyout = 'x' AND
    statusparking = 'Casual' AND
    vehicleid IN ('Mobil', 'Motor') AND
    dateout BETWEEN '2024-07-01 00:00:00' and '2024-07-16 23:59:59'
GROUP BY 
    DATE(dateout)
ORDER BY 
    DATE(dateout);
        ");
        return view('reportsummary.index',compact('results'));
    }


    public function getPaymentReport(Request $request)
    {
        // if (\Auth::user()->can('manage report') ) {
        //     $report = Transaction::where('parent_id', '=', parentId())->get();
           
        // } else {
        //     return redirect()->back()->with('error', __('Permission denied.'));
        // }
        $startDate = $request->input('entry_date', date('Y-m-d'));
        $endDate = $request->input('end_date', date('Y-m-d'));
        $results = DB::select("
        SELECT 
    DATE(dateout) AS date,
    SUM(CASE WHEN paymentby = 'Mandiri' AND vehicleid = 'Mobil' THEN cost ELSE 0 END) AS Mandiri_Mobil,
    SUM(CASE WHEN paymentby = 'Mandiri' AND vehicleid = 'Motor' THEN cost ELSE 0 END) AS Mandiri_Motor,
    SUM(CASE WHEN paymentby = 'BCA' AND vehicleid = 'Mobil' THEN cost ELSE 0 END) AS BCA_Mobil,
    SUM(CASE WHEN paymentby = 'BCA' AND vehicleid = 'Motor' THEN cost ELSE 0 END) AS BCA_Motor,
    SUM(CASE WHEN paymentby = 'BNI' AND vehicleid = 'Mobil' THEN cost ELSE 0 END) AS BNI_Mobil,
    SUM(CASE WHEN paymentby = 'BNI' AND vehicleid = 'Motor' THEN cost ELSE 0 END) AS BNI_Motor,
    SUM(CASE WHEN paymentby = 'BRI' AND vehicleid = 'Mobil' THEN cost ELSE 0 END) AS BRI_Mobil,
    SUM(CASE WHEN paymentby = 'BRI' AND vehicleid = 'Motor' THEN cost ELSE 0 END) AS BRI_Motor
FROM 
    transactions
WHERE 
    alreadyout = 'x' AND
    statusparking = 'Casual' AND
    vehicleid IN ('Mobil', 'Motor') AND
    DATE(dateout) BETWEEN ? AND ?
            GROUP BY 
                DATE(dateout)
            ORDER BY 
                DATE(dateout);
        ", [$startDate, $endDate]);
        return view('reportsummary.index',compact('results'));
    }


    public function getQtyReport(Request $request)
    {
        // if (\Auth::user()->can('manage report') ) {
        //     $report = Transaction::where('parent_id', '=', parentId())->get();
           
        // } else {
        //     return redirect()->back()->with('error', __('Permission denied.'));
        // }
        $startDate = $request->input('entry_date', date('Y-m-d'));
        $endDate = $request->input('end_date', date('Y-m-d'));
        $results = DB::select("
        SELECT 
    DATE(dateout) AS date,
    SUM(CASE WHEN paymentby = 'Mandiri' AND vehicleid = 'Mobil' THEN 1 ELSE 0 END) AS Mandiri_Mobil,
    SUM(CASE WHEN paymentby = 'Mandiri' AND vehicleid = 'Motor' THEN 1 ELSE 0 END) AS Mandiri_Motor,
    SUM(CASE WHEN paymentby = 'BCA' AND vehicleid = 'Mobil' THEN 1 ELSE 0 END) AS BCA_Mobil,
    SUM(CASE WHEN paymentby = 'BCA' AND vehicleid = 'Motor' THEN 1 ELSE 0 END) AS BCA_Motor,
    SUM(CASE WHEN paymentby = 'BNI' AND vehicleid = 'Mobil' THEN 1 ELSE 0 END) AS BNI_Mobil,
    SUM(CASE WHEN paymentby = 'BNI' AND vehicleid = 'Motor' THEN 1 ELSE 0 END) AS BNI_Motor,
    SUM(CASE WHEN paymentby = 'BRI' AND vehicleid = 'Mobil' THEN 1 ELSE 0 END) AS BRI_Mobil,
    SUM(CASE WHEN paymentby = 'BRI' AND vehicleid = 'Motor' THEN 1 ELSE 0 END) AS BRI_Motor
FROM 
    transactions
WHERE 
    alreadyout = 'x' AND
    statusparking = 'Casual' AND
    vehicleid IN ('Mobil', 'Motor') AND
    DATE(dateout) BETWEEN ? AND ?
            GROUP BY 
                DATE(dateout)
            ORDER BY 
                DATE(dateout);
        ", [$startDate, $endDate]);
        return view('reportsummary.reportqty',compact('results'));
    }

   
}
