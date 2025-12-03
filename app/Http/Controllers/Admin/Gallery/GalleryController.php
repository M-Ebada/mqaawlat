<?php

namespace App\Http\Controllers\Admin\Gallery;

use App\Datatables\GalleryDatatables;
use Log;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Services\Gallery\GalleryServices;

class GalleryController extends Controller
{
    public function __construct(
        private readonly GalleryDatatables $roleDatatables,
        private readonly GalleryServices $roleServices,
    )
    {
    }

    public function index(Request $request)
    {
        if (request()->expectsJson()) {
            return $this->roleDatatables->datatables($request);
        }
        return view("admin.pages.gallery.index")->with([
            "columns" => $this->roleDatatables->columns(),
        ]);
    }

    public function create()
    {
        $type = 'parent';
        return view("admin.pages.gallery.create")->with([
            'type'      => $type,
        ]);
    }

    public function store(Request $request)
    {
        try {

            $this->roleServices->store($request);

        } catch (Exception $exception) {

            Log::error($exception->getMessage());

            return $exception->getMessage();

            return back()->withInput()->with('error', $exception->getMessage());
        }

        return back()->with("success", __("added Successfully"));
    }

    public function edit($id)
    {
        return view("admin.pages.gallery.edit")->with([
            "model" => $this->roleServices->findById($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        try {

            $this->roleServices->update($request, $id);

        } catch (Exception $exception) {

            Log::error($exception->getMessage());

            return back()->withInput()->with('error', $exception->getMessage());
        }

        return back()->with("success", __("updated Successfully"));
    }

    public function destroy($id)
    {
        try {

            Gallery::query()->findOrFail($id)->delete();

        } catch (Exception $exception) {

            Log::error($exception->getMessage());

            return $this->sendFailedResponse($exception->getMessage());
        }

        return $this->sendSuccessResponse([], __("Deleted Successfully"));

    }


    

}
