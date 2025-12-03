<?php

namespace App\Datatables;

use App\Core\Support\DataTableActions;
use App\Core\Support\Date;
use App\Helper\Helper;
use App\Models\User;
use Illuminate\Http\Request;
use LaravelLocalization;
use Yajra\DataTables\Facades\DataTables;

class UserDatatables implements DatatableInterface
{
    public function columns(): array
    {
        return [
            "name",
            "email",
            "phone",
            "status",
            "created_at",
        ];
    }

    public function datatables(Request $request)
    {
        return Datatables::of($this->query($request))
             ->addColumn("name", function (User $user) {
                 return $user->name;
             })
            ->addColumn("created_at", function (User $user) {
                return Date::formattedDate($user);
            })
            ->addColumn("status", function (User $user) {
                return (new DataTableActions())
                    ->model($user)
                    ->modelId($user->id)
                    ->checkStatus($user->status)
                    ->switcher();
            })
            ->addColumn("action", function (User $user) {
                return (new DataTableActions())
                    ->show(route("admin.users.show", $user->id))
                    //->edit(route("admin.user.edit", $user->id))
                    ->delete(route("admin.users.destroy", $user->id))
                    ->make();
            })
            ->rawColumns(["action", "status", "name"])
            ->make(true);
    }

    public function query(Request $request)
    {
        return User::query()
            ->when(request()->filled("status") && request()->status == "disabled", function ($query) {
                $query->where("status", 0);
            })
            ->latest()
            ->select("*");
    }
}
