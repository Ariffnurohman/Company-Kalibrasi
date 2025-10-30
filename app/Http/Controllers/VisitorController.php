<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Carbon\Carbon;

class VisitorController extends Controller
{
    public function index()
    {
        $totalVisitors = Visitor::count();
        $onlineVisitors = Visitor::where('last_activity', '>=', Carbon::now()->subMinutes(5))->count();

        return view('visitors.stats', compact('totalVisitors', 'onlineVisitors'));
    }
}
