<?php

namespace App\Services\Category;

use App\Core\Support\Image;
use App\Helper\Helper;
use App\Models\Category;
use App\Services\ServiceInterface;
use Auth;
use DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CategoryServices
{

    public function get($checkStatus, $getWhich = 'both'): Collection|array
    {
        $helpCenter = Category::query();
        if($checkStatus){
            $helpCenter = $helpCenter->where('status', true);
        }
        return $helpCenter->get();
    }

    public function findById($id): Model|Collection|Builder|array|null
    {
        return Category::query()->findOrFail($id);
    }

    public function store($request): Category
    {

        return DB::transaction(function () use ($request) {

            $helpCenter = Category::query()->create([
                'title'         => $request->title,
                'description'   => $request->description,
                'type'          => $request->type
            ]);

            if ($request->hasFile("cover")) {
                Image::updateImage($helpCenter, $request->cover, 'cover');
            }
            
            return $helpCenter;
        });
    }

    public function update($request, $id)
    {
        return DB::transaction(function () use ($request, $id) {

            $helpCenter = $this->findById($id);

            $helpCenter->update([
                'title'         => $request->title,
                'description'   => $request->description,
                'category_id'   => ($request->category_id != '') ? $request->category_id : $helpCenter->category_id,
            ]);
            
            if ($request->hasFile("cover")) {
                Image::updateImage($helpCenter, $request->cover, 'cover');
            }

            return $helpCenter;
        });
    }

    public function destroy($id)
    {
        return DB::transaction(function () use ($id) {

            $helpCenter = $this->findById($id);

            $helpCenter->delete();

        });
    }

}
