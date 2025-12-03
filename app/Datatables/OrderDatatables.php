<?php

namespace App\Datatables;

use App\Core\Support\DataTableActions;
use App\Core\Support\Date;
use App\Enums\OrderEnum;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class OrderDatatables implements DatatableInterface
{
    public function columns(): array
    {
        return [
            "number",
            "status",
            "payment_status",
            "total_price",
            "total_qty",
            "delivery_type",
            "user",
            "created_at",
            "updated_at",
        ];
    }

    public function datatables(Request $request)
    {
        return Datatables::of($this->query($request))
           ->addColumn("number", function (Order $product) {
                return '#ORDER000' . $product->id;
            })
           ->addColumn("total_price", function (Order $product) {
                return price($product->total_price);
            })
            ->addColumn("status", function (Order $product) {
                return '<span class="' . OrderEnum::getStatusLabel()[$product->status]['class'] . ' text-light" style="color:#fff !important">' . OrderEnum::getStatusLabel()[$product->status]['title'] . '</span>';
            })
            ->addColumn("payment_status", function (Order $product) {
                return $product->is_paid ? '<span class="badge badge-success">'.__("Paid").'</span>' : '<span class="badge badge-danger">'.__("Unpaid").'</span>';
            })
            ->addColumn("user", function (Order $product) {
                return $product->user ? $product->user->name . ' (' . $product->phone1 . ')' : '-';
            })
            ->addColumn("created_at", function (Order $role) {
                return Date::formattedDate($role, formattedDate: "Y-m-d");
            })
            ->addColumn("updated_at", function (Order $role) {
                return Date::formattedDate($role, formattedDate: "Y-m-d");
            })
            ->addColumn("action", function (Order $role) {
                return (new DataTableActions())
                    ->show(route("admin.order.show", $role->id))
                    ->print(route("admin.order.print", $role->id))
                    ->make();
            })
            ->rawColumns(["action", "status", "number", "total_price", "user", "created_at", "updated_at", "payment_status"])
            ->make(true);
    }

    public function query(Request $request)
    {
        return Order::query()
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
            ->select('*');
    }
}
