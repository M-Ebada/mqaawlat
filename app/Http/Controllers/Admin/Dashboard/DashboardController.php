<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        return view("admin.pages.dashboard.index");
    }

    public function orderChart(): JsonResponse
    {
        for ($i = 1; $i <= 12; $i++) {
            $year = now()->format("Y");
            $date_1 = Carbon::create($year, $i)->startOfMonth()->format('Y-m-d');
            $date_2 = Carbon::create($year, $i)->lastOfMonth()->format('Y-m-d');
            $order_counts[] = Order::query()
                ->whereDate("created_at", ">=", $date_1)
                ->whereDate("created_at", "<=", $date_2)
                ->count();
        }
        return $this->sendSuccessResponse([
            "counts" => $order_counts,
            "months" => collect(Helper::months())->values()->pluck("title")->values()
        ], __("Data Retrieved Successfully"));
    }
}
