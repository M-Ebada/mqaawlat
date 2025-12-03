<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Datatables\ContactDatatables;
use App\Enums\ContactEnum;
use Log;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function __construct(
        private readonly ContactDatatables $roleDatatables
    )
    {
    }

    public function index(Request $request)
    {
        if (request()->expectsJson()) {
            return $this->roleDatatables->datatables($request);
        }
        return view("admin.pages.contact.index")->with([
            "columns" => $this->roleDatatables->columns(),
        ]);
    }

    public function show($id)
    {
        $contact = Contact::query()->findOrFail($id);
        $contact->update([
            'status'    => ContactEnum::SEEN
        ]);

        return view('admin.pages.contact.show')->with([
            'model' => $contact
        ]);
    }
    
    public function destroy($id)
    {
        try {

            Contact::query()->findOrFail($id)->delete();

        } catch (Exception $exception) {

            Log::error($exception->getMessage());

            return $this->sendFailedResponse($exception->getMessage());
        }

        return $this->sendSuccessResponse([], __("Deleted Successfully"));

    }
}
