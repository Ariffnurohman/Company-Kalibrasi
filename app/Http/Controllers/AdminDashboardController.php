<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Pickup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalOrders = Order::count();
        $totalRevenue = Order::sum('total_price');
        $completedOrders = Order::where('status', 'completed')->count();
        $pendingOrders = Order::where('status', 'pending')->count();

        $pendingPickups = Pickup::where('status', 'pending')->get();
        $notifications = auth()->user()->unreadNotifications;

        // Chart data
        $months = [];
        $ordersChart = [];
        $revenueChart = [];

        for ($i = 1; $i <= 12; $i++) {
            $months[] = date("M", mktime(0, 0, 0, $i, 1));

            $ordersChart[] = Order::whereMonth('created_at', $i)->count();
            $revenueChart[] = Order::whereMonth('created_at', $i)->sum('total_price');
        }

        $recentOrders = Order::latest()->take(6)->get();

        return view('admin.dashboard', compact(
            'totalOrders',
            'totalRevenue',
            'completedOrders',
            'pendingOrders',
            'months',
            'ordersChart',
            'revenueChart',
            'recentOrders',
            'pendingPickups',
            'notifications'
        ));
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
    
        $request->validate([
            'name'  => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);
    
        // Update nama & phone
        $user->name = $request->name;
        $user->phone = $request->phone;
    
        // Handle Upload Foto
        if ($request->hasFile('photo')) {
    
            // Hapus foto lama kalau ada
            if ($user->profile_photo && \Storage::disk('public')->exists($user->profile_photo)) {
                \Storage::disk('public')->delete($user->profile_photo);
            }
    
            // Upload foto baru
            $path = $request->file('photo')->store('profile_photos', 'public');
            $user->profile_photo = $path;
        }
    
        $user->save();
    
        return back()->with('success', 'Profile updated successfully!');
    }
    
}
