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
    
    
    public function edit($id)
    {
        $log = Log::find($id);
        return view('admins.log-edit')->with('log',$log);
    }

    
    public function update(Request $request, $id)
    {
        $log = Log::find($id);

        $log->origin = $request->input('origin');
        $log->action = $request->input('action');
        $log->save();

        Session::flash('success', 'Log is successfully updated');
        return redirect()->route('logs.index');
    }
    
    public function destroyAll()
    {
        $logs = Log::all();
        foreach($logs as $log){
            $log -> delete();
        }
        Session::flash('success', 'All logs has been cleared');
        return redirect()->route('logs.index');

    }
}
