<?php

namespace App\Services;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardService
{
    public function getDashboardData(): array
    {
        $user = Auth::user();
        return [

            // Statistics
            'totalProducts' => Product::count(),

            'totalUsers' => User::count(),

            'productsToday' => Product::whereDate(
                'created_at',
                today()
            )->count(),

            'productsThisMonth' => Product::whereMonth(
                'created_at',
                now()->month
            )
                ->whereYear(
                    'created_at',
                    now()->year
                )
                ->count(),

            // Recent Data
            'recentProducts' => Product::latest()
                ->take(5)
                ->get(),

            // Logged In User
            'user' => $user,
            'isAdmin' => $user->isAdmin(),
        ];
    }
}