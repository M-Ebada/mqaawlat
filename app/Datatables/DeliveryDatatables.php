<?php

namespace App\Datatables;

use App\Core\Support\DataTableActions;
use App\Core\Support\Date;
use App\Models\CityDelivery;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DeliveryDatatables implements DatatableInterface
{
    public function columns(): array
    {
        return [
            "title",
            'show_price',
            "regions",
            "created_at",
            "updated_at",
        ];
    }

    public function datatables(Request $request)
    {
        return Datatables::of($this->query($request))
            ->addColumn("title", function (CityDelivery $product) {
                return $product->title;
            })
            ->addColumn("show_price", function (CityDelivery $product) {
                return $product->add_to_product_price ? 'No' : 'Yes';
            })
            ->addColumn("regions", function (CityDelivery $product) {
                return $product->regions->count() . ' Region';
            })
            ->addColumn("created_at", function (CityDelivery $role) {
                return Date::formattedDate($role, formattedDate: "Y-m-d");
            })
            ->addColumn("updated_at", function (CityDelivery $role) {
                return Date::formattedDate($role, formattedDate: "Y-m-d");
            })
            ->addColumn("action", function (CityDelivery $role) {
                return (new DataTableActions())
                    ->edit(route("admin.delivery.edit", $role->id))
                    ->delete(route("admin.delivery.destroy", $role->id))
                    ->make();
            })
            ->rawColumns(["action", "title", 'region', 'show_price'])
            ->make(true);
    }

    public function query(Request $request)
    {
        return CityDelivery::query()->whereNull('city_id')->latest()->select("*");
    }
}
