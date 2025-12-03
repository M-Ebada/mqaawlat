<?php

namespace App\Http\Controllers\Admin\Product;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Datatables\ProductDatatables;
use App\Services\Product\ProductServices;
use Log;

class ProductController extends Controller
{
    public function __construct(
        private readonly ProductDatatables $categoryDatatables,
        private readonly ProductServices $categoryServices
    )
    {
    }

    public function index(Request $request)
    {
        if (request()->expectsJson()) {
            return $this->categoryDatatables->datatables($request);
        }

        return view('admin.pages.products.index')->with([
            'columns' => $this->categoryDatatables->columns(),
        ]);
    }

    public function create()
    {
        $categories = Category::query()->get();
        return view('admin.pages.products.create')->with([
            'categories'    => $categories
        ]);
    }

    public function store(Request $request)
    {
        
        try {

            $this->categoryServices->store($request);

        } catch (Exception $exception) {
            
            Log::error($exception->getMessage());

            return back()->withInput()->with('error', $exception->getMessage());
        }

        return back()->with('success', __('added Successfully'));
    }

    public function edit($id)
    {
        $categories = Category::query()->get();
        return view('admin.pages.products.edit')->with([
            'model' => $this->categoryServices->findById(id: $id),
            'categories'    => $categories
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
