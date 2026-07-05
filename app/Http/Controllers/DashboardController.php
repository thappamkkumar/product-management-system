<?php

namespace App\Http\Controllers;

use App\Services\DashboardService;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __construct(
        private DashboardService $dashboardService
    ) {
    }

    public function index(): View
    {
        $dashboardData = $this->dashboardService->getDashboardData();

        return view('dashboard', $dashboardData);
    }
}
