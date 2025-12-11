<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class TechnicianDashboardController extends Controller
{
    public function index()
    {
        $assignedOrders = Order::where('technician_id', auth()->id())->count();
        $completed = Order::where('technician_id', auth()->id())
                          ->where('status', 'Completed')->count();
        $inProgress = Order::where('technician_id', auth()->id())
                           ->whereIn('status', ['Processing','Calibration'])->count();

        $recentOrders = Order::where('technician_id', auth()->id())
                             ->latest()->take(5)->get();

        return view('technician.dashboard', compact(
            'assignedOrders', 'completed', 'inProgress', 'recentOrders'
        ));
    }

    public function profile()
    {
        return view('technician.profile');
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name'  => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'photo' => 'nullable|image|max:2048',
        ]);

        // Update basic data
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->specialization = $request->specialization;

        // Update profile photo
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = 'tech_' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/profile', $filename);

            $user->profile_photo = 'storage/profile/'.$filename;
        }

        $user->save();

        return back()->with('success', 'Profile updated successfully!');
    }
}
