<?php

namespace App\Http\Controllers\Admin\Testmonial;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Datatables\TestmonialDatatables;
use App\Services\Testmonial\TestmonialServices;
use Log;

class TestmonialController extends Controller
{
    public function __construct(
        private readonly TestmonialDatatables $categoryDatatables,
        private readonly TestmonialServices $categoryServices
    )
    {
    }

    public function index(Request $request)
    {
        if (request()->expectsJson()) {
            return $this->categoryDatatables->datatables($request);
        }

        return view('admin.pages.testmonials.index')->with([
            'columns' => $this->categoryDatatables->columns(),
        ]);
    }

    public function create()
    {
        $categories = Category::query()->whereNull('category_id')->get();
        return view('admin.pages.testmonials.create')->with([
            'categories'    => $categories
        ]);
    }

    public function store(Request $request)
    {
        try {

            $this->categoryServices->store($request);

        } catch (Exception $exception) {

            Log::error($exception->getMessage());

            return $exception->getMessage();
            return back()->withInput()->with('error', $exception->getMessage());
        }

        return back()->with('success', __('added Successfully'));
    }

    public function edit($id)
    {
        return view('admin.pages.testmonials.edit')->with([
            'model' => $this->categoryServices->findById(id: $id)        
        ]);
    }

    public function update(Request $request, $id)
    {
        try {

            $this->categoryServices->update($request, $id);

        } catch (Exception $exception) {

            Log::error($exception->getMessage());

            return back()->withInput()->with('error', $exception->getMessage());
        }

        return back()->with('success', __('updated Successfully'));
    }

    public function destroy($id)
    {
        try {

            $this->categoryServices->destroy($id);

        } catch (Exception $exception) {

            Log::error($exception->getMessage());

            return $this->sendFailedResponse(message: $exception->getMessage());
        }

        return $this->sendSuccessResponse(message: __('deleted Successfully'));

    }

    public function restore($id)
    {
        try {

            $this->categoryServices->restore($id);

        } catch (Exception $exception) {

            Log::error($exception->getMessage());

            return $this->sendFailedResponse(message: $exception->getMessage());
        }

        return $this->sendSuccessResponse(message: __('restored Successfully'));

    }
}
