<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function Index()
    {
        $title = 'Dashboard';

        return view('dashboard.dashboard.index', compact('title'));
    }
}
