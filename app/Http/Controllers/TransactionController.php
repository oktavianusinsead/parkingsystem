<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        // if (\Auth::user()->can('manage report') ) {
        //     $report = Transaction::where('parent_id', '=', parentId())->get();
           
        // } else {
        //     return redirect()->back()->with('error', __('Permission denied.'));
        // }
        return view('reporttransaction.index');
    }
}
