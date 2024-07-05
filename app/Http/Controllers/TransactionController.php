<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
class TransactionController extends Controller
{
    public function index()
    {
        // if (\Auth::user()->can('manage report') ) {
        //     $report = Transaction::where('parent_id', '=', parentId())->get();
           
        // } else {
        //     return redirect()->back()->with('error', __('Permission denied.'));
        // }
        $sdate = date('Y-m-d')." 00:00:00";
        $edate = date('Y-m-d')." 23:59:59";
        $report = Transaction::whereBetween('dateout', [$sdate, $edate])->get();
        return view('reporttransaction.index',compact('report'));
    }
}
