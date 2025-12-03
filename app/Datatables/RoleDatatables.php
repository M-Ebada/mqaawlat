<?php

namespace App\Datatables;

use App\Core\Support\DataTableActions;
use App\Core\Support\Date;
use App\Models\Role;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RoleDatatables implements DatatableInterface
{
    public function columns(): array
    {
        return [
            "title",
            "created_at",
            "updated_at",
        ];
    }

    public function datatables(Request $request)
    {
        return Datatables::of($this->query($request))
            ->addColumn("title", function (Role $role) {
                return $role->title;
            })
            ->addColumn("created_at", function (Role $role) {
                return Date::formattedDate($role, formattedDate: "Y-m-d");
            })
            ->addColumn("updated_at", function (Role $role) {
                return Date::formattedDate($role, formattedDate: "Y-m-d");
            })
            ->addColumn("action", function (Role $role) {
                return (new DataTableActions())
                    ->edit(route("admin.role.edit", $role->id))
                    ->delete(route("admin.role.destroy", $role->id))
                    ->make();
            })
            ->rawColumns(["action", "status"])
            ->make(true);
    }

    public function query(Request $request)
    {
        return Role::query()->where("id", "!=", 1)->latest()->select("*");
    }
}
