<?php

namespace App\Datatables;

use App\Core\Support\DataTableActions;
use App\Core\Support\Date;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CouponDatatables implements DatatableInterface
{
    public function columns(): array
    {

        return [
            "code",
            "status",
            "start_at",
            "end_at",
            "amount",
            "usage",
            "created_at",
            "updated_at",
        ];
    }

    public function datatables(Request $request)
    {
        return Datatables::of($this->query($request))
            ->addColumn("usage", function (Coupon $role) {
                $slash = ($role->is_unlimited) ? '/-' : '/' . $role->quantity;
                return $role->usage . $slash;
            })
            ->addColumn("amount", function (Coupon $role) {
                return ($role->is_percentage) ? $role->amount . '%' : price($role->amount);
            })
            ->addColumn("status", function (Coupon $role) {
                return (new DataTableActions())
                ->model($role)
                ->modelId($role->id)
                ->checkStatus($role->status)
                ->switcher();
            })
            ->addColumn("created_at", function (Coupon $role) {
                return Date::formattedDate($role, formattedDate: "Y-m-d");
            })
            ->addColumn("updated_at", function (Coupon $role) {
                return Date::formattedDate($role, formattedDate: "Y-m-d");
            })
            ->addColumn("action", function (Coupon $role) {
                return (new DataTableActions())
                    ->edit(route("admin.coupon.edit", $role->id))
                    ->delete(route("admin.coupon.destroy", $role->id))
                    ->make();
            })
            ->rawColumns(["action", "amount", 'usage', 'status'])
            ->make(true);
    }

    public function query(Request $request)
    {
        return Coupon::query()->latest()->select("*");
    }
}
