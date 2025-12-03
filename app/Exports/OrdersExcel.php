<?php

namespace App\Exports;

use App\Models\Domain;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use App\Enums\StatusEnum;
use App\Models\Order;
use Carbon\Carbon;
use Log;

class OrdersExcel implements FromView
{

    public $orders;

    public function __construct($request)
    {
        $this->orders = Order::query()
        ->with('user')
            ->when($request->filled("order_number") && $request->order_number != "", function ($query) {
                return $query->where('id', "like", "%" . request()->order_number . "%");
            })
            ->when($request->filled("customer_name") && $request->customer_name != "", function ($query) {
                return $query->whereHas('user', function ($q) {
                        $q->where('first_name', 'LIKE', "%".request()->customer_name."%")
                          ->orWhere('last_name', 'LIKE', "%".request()->customer_name."%");
                    });
            })
            ->when($request->filled("customer_phone") && $request->customer_phone != "", function ($query) {
                return $query->where('phone1', 'LIKE', "%".request()->customer_phone."%")->orWhere('phone2', 'LIKE', "%".request()->customer_phone."%");
            })
            ->when($request->filled("total_cost") && $request->total_cost != "", function ($query) {
                return $query->where('total_price', ">=", request()->total_cost);
            })
            ->when($request->filled("payment_method") && $request->payment_method != "" && $request->payment_method != "all", function ($query) {
                return $query->where('payment_method', "LIKE", "%" . request()->payment_method . "%");
            })
            ->when($request->filled("date_range") && $request->date_range != "", function ($query) {
                $date = explode(" / ", request()->date_range);
                $startDate = Carbon::parse(trim($date[0]))->format("Y-m-d H:i:s");
                $endDate = Carbon::parse(trim($date[1]))->format("Y-m-d H:i:s");
                $query->whereBetween("created_at", [$startDate, $endDate]);
            })
            ->orderBy('orders.id', 'desc')
            ->get();
    }

    public function view(): View
    {
        return  view("export.orders")->with([
            'orders' => $this->orders
        ]);
    }
}
