<?php

namespace App\Datatables;

use App\Core\Support\DataTableActions;
use App\Core\Support\Date;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoryDatatables implements DatatableInterface
{
    public function columns(): array
    {
        return [
            "image",
            "title" => ['title->'.app()->getLocale()],
            "status",
            "created_at",
            "updated_at",
        ];
    }

    public function datatables(Request $request)
    {
        return Datatables::of($this->query($request))
            ->addColumn("image", function (Category $role) {
                return DataTableActions::image($role->cover);
            })
            ->addColumn("title", function (Category $product) {
                return $product->title;
            })
            ->addColumn("created_at", function (Category $role) {
                return Date::formattedDate($role, formattedDate: "Y-m-d");
            })
            ->addColumn("updated_at", function (Category $role) {
                return Date::formattedDate($role, formattedDate: "Y-m-d");
            })
            ->addColumn("status", function (Category $role) {
                return (new DataTableActions())
                ->model($role)
                ->modelId($role->id)
                ->checkStatus($role->status)
                ->switcher();
            })
            ->addColumn("action", function (Category $role) {
                return (new DataTableActions())
                    ->edit(route("admin.category.edit", $role->id))
                    ->delete(route("admin.category.destroy", $role->id))
                    ->make();
            })
            ->rawColumns(["action", "status" , "title", 'order', 'image'])
            ->make(true);
    }

    public function query(Request $request)
    {
        return Category::query()->latest()->select("*");
    }
}
