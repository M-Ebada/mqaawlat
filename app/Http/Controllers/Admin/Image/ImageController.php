<?php

namespace App\Http\Controllers\Admin\Image;

use App\Http\Controllers\Controller;
use App\Models\Media;

class ImageController extends Controller
{
    public function destroy($id)
    {
        $media = Media::query()->find($id);
        $media->delete();
        return back()->with("success", __("Media Deleted Successfully"));
    }
}
