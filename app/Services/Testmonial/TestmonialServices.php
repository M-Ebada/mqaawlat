<?php

namespace App\Services\Testmonial;

use App\Core\Helpers\UploadMedia\UploadMediaHelper;
use App\Helper\Helper;
use App\Models\Testmonial;
use DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class TestmonialServices
{
    public function index($active = false): Collection
    {
        return Testmonial::query()->when($active, fn(Builder $query) => $query->active())->get();
    }

    public function findById($id, ?bool $active = false, ?bool $withTrashed = false): Testmonial
    {
        return Testmonial::query()
            ->when($active, fn(Builder $query) => $query->active())
            ->when($withTrashed, fn(Builder $query) => $query->withTrashed())
            ->findOrFail($id);
    }

    public function store($request): void
    {
        DB::transaction(function () use ($request) {

            $category = Testmonial::query()->create([
                'title' => $request->title,
                'description' => $request->description,
                'position'  => $request->position,
            ]);

            UploadMediaHelper::upload($request->file("image"), $category, 'image');

        });
    }

    public function update($request, $id): void
    {
        DB::transaction(function () use ($request, $id) {

            $category = $this->findById(id: $id);
            
            $category->update([
                'title' => $request->title,
                'description' => $request->description,
                'position'  => $request->position,
            ]);

            UploadMediaHelper::upload($request->file("image"), $category, 'image');
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
