<?php

namespace App\Http\Controllers\Admin\Category;

use App\Datatables\CategoryDatatables;
use Log;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Services\Category\CategoryServices;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function __construct(
        private readonly CategoryDatatables $roleDatatables,
        private readonly CategoryServices $roleServices,
    )
    {
    }

    public function index(Request $request)
    {
        if (request()->expectsJson()) {
            return $this->roleDatatables->datatables($request);
        }
        return view("admin.pages.category.index")->with([
            "columns" => $this->roleDatatables->columns(),
        ]);
    }

    public function create()
    {
        $type = 'parent';
        return view("admin.pages.category.create")->with([
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
        return view("admin.pages.category.edit")->with([
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

            Category::query()->findOrFail($id)->delete();

        } catch (Exception $exception) {

            Log::error($exception->getMessage());

            return $this->sendFailedResponse($exception->getMessage());
        }

        return $this->sendSuccessResponse([], __("Deleted Successfully"));

    }

    public function getProducts(Request $request, $id)
    {
        $products = Product::query()->where('category_id', $id)->orderBy('order','asc')->get();
        return view('admin.pages.category.products')->with([
            'products'  => $products,
            'category_id'   => $id
        ]);
    }

    

}
