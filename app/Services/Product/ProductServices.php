<?php

namespace App\Services\Product;

use App\Core\Support\Image;
use App\Helper\Helper;
use App\Models\Product;
use DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class ProductServices
{
    public function index($active = false): Collection
    {
        return Product::query()->when($active, fn(Builder $query) => $query->active())->get();
    }

    public function findById($id, ?bool $active = false, ?bool $withTrashed = false): Product
    {
        return Product::query()
            ->when($active, fn(Builder $query) => $query->active())
            ->when($withTrashed, fn(Builder $query) => $query->withTrashed())
            ->findOrFail($id);
    }

    public function store($request): void
    {
        DB::transaction(function () use ($request) {

            $category = Product::query()->create([
                'title' => $request->title,
                'content' => $request->content,
                'short_description' => $request->short_description,
                'slug'  => Helper::getSlug($request->title['en']),
                'keywords'  => $request->keywords,
            ]);

            if ($request->hasFile("image")) {
                Image::updateImage($category, $request->image, 'image');
            }
            
        });
    }

    public function update($request, $id): void
    {
        DB::transaction(function () use ($request, $id) {

            $category = $this->findById(id: $id);
            
            $category->update([
                'title' => $request->title,
                'content' => $request->content,
                'short_description' => $request->short_description,
                'slug'  => Helper::getSlug($request->title['en']),
                'keywords'  => $request->keywords,
            ]);

            if ($request->hasFile("image")) {
                Image::updateImage($category, $request->image, 'image');
            }   

        });
    }

    public function destroy($id): void
    {
        DB::transaction(function () use ($id) {

            $home = $this->findById(id: $id);

            $home->delete();

        });
    }

    public function restore($id): void
    {
        DB::transaction(function () use ($id) {

            $home = $this->findById(id: $id, withTrashed: true);

            $home->restore();

        });
    }
}
