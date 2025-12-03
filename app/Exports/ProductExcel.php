<?php

namespace App\Exports;

use App\Models\Domain;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use App\Enums\StatusEnum;
use App\Models\Product;
use Carbon\Carbon;
use Log;

class ProductExcel implements FromView
{

    public $products;

    public function __construct($request)
    {
        $this->products = Product::query()
        ->when($request->filled("category_id") && $request->category_id != "", function ($query) {
            return $query->where('category_id', request()->category_id);
        })
         ->when($request->filled("status") && $request->status != "all", function ($query) {
            return $query->where('status', request()->status);
        })
        ->latest()->get();
    }

    public function view(): View
    {
        return  view("export.products")->with([
            'products' => $this->products
        ]);
    }
}
