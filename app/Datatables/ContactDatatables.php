<?php

namespace App\Datatables;

use App\Core\Support\DataTableActions;
use App\Core\Support\Date;
use App\Enums\ContactEnum;
use App\Models\Contact;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ContactDatatables implements DatatableInterface
{
    public function columns(): array
    {
        return [
            "status",
            "name",
            "whatsapp",
            "created_at",
            "updated_at",
        ];
    }

    public function datatables(Request $request)
    {
        return Datatables::of($this->query($request))
            ->addColumn("created_at", function (Contact $role) {
                return Date::formattedDate($role, formattedDate: "Y-m-d");
            })
            ->addColumn("updated_at", function (Contact $role) {
                return Date::formattedDate($role, formattedDate: "Y-m-d");
            })
            ->addColumn("status", function (Contact $role) {
                if($role->status == ContactEnum::NEW){
                    return '<span class="badge rounded-pill text-bg-warning">'.__('New').'</span>';
                }elseif($role->status == ContactEnum::SEEN){
                    return '<span class="badge rounded-pill text-bg-success">'.__('Seen').'</span>';
                }
            })
            ->addColumn("action", function (Contact $role) {
                return (new DataTableActions())
                    ->show(route("admin.contact.show", $role->id))
                    ->delete(route("admin.contact.destroy", $role->id))
                    ->make();
            })
            ->rawColumns(["action", "status"])
            ->make(true);
    }

    public function query(Request $request)
    {
        return Contact::query()->latest()->select("*");
    }
}
