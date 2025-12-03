<?php

namespace App\Datatables;

use App\Core\Support\Date;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Core\Support\DataTableActions;
use App\Models\Color;
use Yajra\DataTables\Facades\DataTables;

class ColorDatatables implements DatatableInterface
{
    public function columns(): array
    {
        return [
            "color",
            "title",
            "created_at",
        ];
    }

    public function datatables(Request $request)
    {
        return datatables($this->query($request))
        ->addColumn("color", function (Color $user) {
            return 
            '<div style="margin:auto;width:60px;height:60px;border-radius:50%;background:'.$user->code.'"></div>';
        })
        ->addColumn("title", function (Color $user) {
            return $user->title;
        })
        ->addColumn("action", function (Color $user) {
            return (new DataTableActions())
                ->edit(route("admin.color.edit", $user->id))
                ->delete(route("admin.color.destroy", $user->id))
                ->make();
        })
        ->addColumn("created_at", function (Color $user) {
            return $user->created_at->format('Y-m-d');
        })
        ->addColumn("updated_at", function (Color $user) {
            return $user->updated_at->format('Y-m-d');
        })
        ->rawColumns(['action', 'title', 'color'])
        ->make(true);
    }

    public function query(Request $request)
    {
        return Color::query()
            ->latest()
            ->select("*");
    }
}
