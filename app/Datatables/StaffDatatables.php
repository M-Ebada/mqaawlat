<?php

namespace App\Datatables;

use App\Models\Admin;
use App\Core\Support\Date;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Core\Support\DataTableActions;
use Yajra\DataTables\Facades\DataTables;

class StaffDatatables implements DatatableInterface
{
    public function columns(): array
    {
        return [
            "name",
            "username",
            "email",
            "status",
            "created_at",
        ];
    }

    public function datatables(Request $request)
    {
        return datatables($this->query($request))
        ->addColumn("user_profile_image", function (Admin $user) {
            return DataTableActions::image($user->profile_image);
        })
        ->addColumn("action", function (Admin $user) {
            return (new DataTableActions())
                ->edit(route("admin.staff.edit", $user->id))
                ->delete(route("admin.staff.destroy", $user->id))
                ->make();
        })
        ->addColumn("status", function (Admin $user) {
            return (new DataTableActions())
                ->model($user)
                ->modelId($user->id)
                ->checkStatus($user->status)
                ->switcher();
        })
        ->addColumn("created_at", function (Admin $user) {
            return $user->created_at->format('Y-m-d');
        })
        ->addColumn("updated_at", function (Admin $user) {
            return $user->updated_at->format('Y-m-d');
        })
        ->rawColumns(['action', 'status', 'user_profile_image'])
        ->make(true);
    }

    public function query(Request $request)
    {
        return Admin::query()
            ->where("id", "!=", 1)
            ->where(function($q){
                if(Auth::user()?->hotel){
                    return $q->where('hotel_id',Auth::user()->hotel_id);
                }
            })
            ->where("id","!=",Auth::user()->id)
            ->latest()
            ->when(request()->filled("status") && request()->status == "disabled", function ($query) {
                $query->where("account_status", 0);
            })
            ->select("*");
    }
}
