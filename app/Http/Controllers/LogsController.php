<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Log;
use Session;

class LogsController extends Controller
{
    
    public function index()
    {
        $logs = Log::all();
        return view('admins.log')
            ->withLogs($logs);
    }
    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroyAll()
    {
        $logs = Log::all();
        foreach($logs as $log){
            $log -> delete();
        }
        Session::flash('success', 'All logs has been cleared');
        return "ok";

    }
}
