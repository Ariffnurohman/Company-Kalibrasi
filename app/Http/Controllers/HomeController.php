<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
{
    $totalVisitors = Visitor::count();

    $onlineVisitors = Visitor::where('last_activity', '>=', Carbon::now()->subMinutes(5))->count();

    return view('home', compact('totalVisitors', 'onlineVisitors'));
}

}
