<?php

namespace App\Console\Commands;

use App\Models\Product;
use App\Services\Product\ProductServices;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class updateStocks extends Command
{
    protected $signature = 'update:stocks';

    protected $description = 'Clear all caches on system';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): void
    {
        $products = Product::query()->get();
        $service = new ProductServices();
        foreach($products as $product)
        {
            $product->update([
                'total_qty' => $product->qty
            ]);
            $service->syncStocks($product);
            $service->sumUpAllQty($product);
        }
    }

}
