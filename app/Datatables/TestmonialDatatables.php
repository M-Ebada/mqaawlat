<?php

namespace App\Datatables;

use App\Core\Support\Date;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Core\Support\DataTableActions;
use App\Models\Testmonial;
use Yajra\DataTables\Facades\DataTables;

class TestmonialDatatables implements DatatableInterface
{
    public function columns(): array
    {
        return [
            "image",
            "name",
            "position",
            "status",
            "created_at",
        ];
    }

    public function datatables(Request $request)
    {
        return datatables($this->query($request))
        ->addColumn("name", function (Testmonial $user) {
            return $user->name;
        })
        ->addColumn("position", function (Testmonial $user) {
            return $user->position;
        })
        ->addColumn("image", function (Testmonial $user) {
            return DataTableActions::image($user->image());
        })
        ->addColumn("action", function (Testmonial $user) {
            return (new DataTableActions())
                ->edit(route("admin.testmonial.edit", $user->id))
                ->delete(route("admin.testmonial.destroy", $user->id))
                ->make();
        })
        ->addColumn("status", function (Testmonial $user) {
            return (new DataTableActions())
                ->model($user)
                ->modelId($user->id)
                ->checkStatus($user->status)
                ->switcher();
        })
        ->addColumn("created_at", function (Testmonial $user) {
            return $user->created_at->format('Y-m-d');
        })
        ->addColumn("updated_at", function (Testmonial $user) {
            return $user->updated_at->format('Y-m-d');
        })
        ->rawColumns(['action', 'status', 'image' ,'position' , "name"])
        ->make(true);
    }

    public function query(Request $request)
    {
        return Testmonial::query()
            ->latest()
            ->select("*");
    }
}
