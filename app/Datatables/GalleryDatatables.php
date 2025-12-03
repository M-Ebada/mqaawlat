<?php

namespace App\Datatables;

use App\Core\Support\DataTableActions;
use App\Core\Support\Date;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class GalleryDatatables implements DatatableInterface
{
    public function columns(): array
    {
        return [
            "image",
            "status",
            "created_at",
            "updated_at",
        ];
    }

    public function datatables(Request $request)
    {
        return Datatables::of($this->query($request))
            ->addColumn("image", function (Gallery $role) {
                return DataTableActions::image($role->image);
            })
            ->addColumn("created_at", function (Gallery $role) {
                return Date::formattedDate($role, formattedDate: "Y-m-d");
            })
            ->addColumn("updated_at", function (Gallery $role) {
                return Date::formattedDate($role, formattedDate: "Y-m-d");
            })
            ->addColumn("status", function (Gallery $role) {
                return (new DataTableActions())
                ->model($role)
                ->modelId($role->id)
                ->checkStatus($role->status)
                ->switcher();
            })
            ->addColumn("action", function (Gallery $role) {
                return (new DataTableActions())
                    ->edit(route("admin.gallery.edit", $role->id))
                    ->delete(route("admin.gallery.destroy", $role->id))
                    ->make();
            })
            ->rawColumns(["action", "status" , "title", 'order', 'image'])
            ->make(true);
    }

    public function query(Request $request)
    {
        return Gallery::query()->latest()->select("*");
    }
}
