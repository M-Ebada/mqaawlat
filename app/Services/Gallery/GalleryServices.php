<?php

namespace App\Services\Gallery;

use App\Core\Support\Image;
use App\Helper\Helper;
use App\Models\Gallery;
use App\Services\ServiceInterface;
use Auth;
use DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class GalleryServices
{

    public function get($checkStatus, $getWhich = 'both'): Collection|array
    {
        $helpCenter = Gallery::query();
        if($checkStatus){
            $helpCenter = $helpCenter->where('status', true);
        }
        return $helpCenter->get();
    }

    public function findById($id): Model|Collection|Builder|array|null
    {
        return Gallery::query()->findOrFail($id);
    }

    public function store($request): Gallery
    {

        return DB::transaction(function () use ($request) {

            $helpCenter = Gallery::query()->create([
                'status'  => true
            ]);

            if ($request->hasFile("image")) {
                Image::updateImage($helpCenter, $request->image, 'image');
            }
            
            return $helpCenter;
        });
    }

    public function update($request, $id)
    {
        return DB::transaction(function () use ($request, $id) {

            $helpCenter = $this->findById($id);

            if ($request->hasFile("image")) {
                Image::updateImage($helpCenter, $request->image, 'image');
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
