<?php

namespace App\Core\Support;

use App\Models\GeneralSetting;
use App\Models\Media;
use Str;

class Image
{
    public static array $allowedImageExtensions = [
        ".png",
        ".jpg",
        ".jpeg",
        ".svg"
    ];

    public static function imageRules($isUpdateAction = false): array
    {
        if ($isUpdateAction) {
            return [
                "nullable",
                "mimetypes:" . implode(",", Media::$IMAGES_MIMES_TYPES)
            ];
        }
        return [
            "required",
            "mimetypes:" . implode(",", Media::$IMAGES_MIMES_TYPES)
        ];
    }

    public static function updateImage($model, $imageRequest, $collection, $deleteOld = false, $secondCollection = false): void
    {

        if ($deleteOld) {
            $model->clearMediaCollectionExcept($collection, []);
        }
        $hasAddedSencodCollection = false;

        if ($imageRequest) {
            if (is_array($imageRequest)) {
                foreach ($imageRequest as $singleImage) {
                    if($singleImage == null){
                        continue;
                    }
                    $fileName = Str::uuid() . "-" . Str::slug($collection) . "." . $singleImage->getClientOriginalExtension();
                    if(!$hasAddedSencodCollection && $secondCollection != false){
                        $model->addMedia($singleImage)->usingFileName($fileName)->toMediaCollection($secondCollection);
                        $hasAddedSencodCollection = true;
                    }else{
                        $model->addMedia($singleImage)->usingFileName($fileName)->toMediaCollection($collection);
                    }
                   
                }
            } else {
                $fileName = Str::uuid() . "-" . Str::slug($collection) . "." . $imageRequest->extension();
                $model->addMedia($imageRequest)->usingFileName($fileName)->toMediaCollection($collection);
            }
        }
    }

    public static function getImageUrl($model, $collection): ?string
    {
        if ($model == 'gs') {
            $model = GeneralSetting::query()->first();
        }
        return $model->getFirstMediaUrl($collection);
    }

    public static function getImagesUrl($model, $collection): array
    {
        $images = [];
        foreach ($model->getMedia($collection) as $image) {
            $images[] = [
                "url" => $image->getUrl(),
                "size" => $image->human_readable_size
            ];
        }
        return $images;
    }
}
