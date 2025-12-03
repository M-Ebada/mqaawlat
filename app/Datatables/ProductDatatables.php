<?php

namespace App\Datatables;

use App\Core\Support\DataTableActions;
use App\Core\Support\Date;
use App\Helper\Helper;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductDatatables implements DatatableInterface
{
    public function columns(): array
    {

        return [
            "image",
            "title" => ['title->'.app()->getLocale()],
            "category",
            "status",
            "created_at",
            "updated_at",
        ];
    }

    public function datatables(Request $request)
    {
        return Datatables::of($this->query($request))
            ->addColumn("image", function (Product $role) {
                return DataTableActions::image($role->image);
            })
            ->addColumn("category", function (Product $role) {
                return $role->category?->title;
            })
            ->addColumn("title", function (Product $product) {
                return '<a target="_blank" href="'.route('web.service.show',['slug' => $product->slug]).'">'. $product->title .'</a>';
            })
            ->addColumn("created_at", function (Product $role) {
                return Date::formattedDate($role, formattedDate: "Y-m-d");
            })
            ->addColumn("updated_at", function (Product $role) {
                return Date::formattedDate($role, formattedDate: "Y-m-d");
            })
            ->addColumn("status", function (Product $role) {
                return (new DataTableActions())
                ->model($role)
                ->modelId($role->id)
                ->checkStatus($role->status)
                ->switcher();
            })
            ->addColumn("action", function (Product $role) {
                return (new DataTableActions())
                    ->edit(route("admin.service.edit", $role->id))
                    ->delete(route("admin.service.destroy", $role->id))
                    ->make();
            })
            ->rawColumns(["action", "status", "title", 'category', 'image'])
            ->make(true);
    }

    public function query(Request $request)
    {
        return Product::query()
        ->latest()->select("*");
    }
}
