<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActivityLogs;
class LogController extends Controller
{
    //
    public function log()
    {
        $logs = ActivityLogs::with(['user', 'business'])->paginate(70);

        // Send data to view
        return view('mazerpage.ActivityLogs.logs', compact('logs'));
    }
}
