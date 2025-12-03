<?php

namespace App\Core\Support;

use Carbon\Carbon;

class Date
{
    public static function ApiDate($model, $column = "created_at"): array
    {
        $date = Carbon::parse($model->$column);

        return [
            "timestamps" => $date->timestamp,
            "for_humans" => $date->diffForHumans(),
            "formatted_date" => $date->format("Y-m-d")
        ];
    }

    public static function formattedDate($model, $column = "created_at", $formattedDate = "Y-m-d H:i:s"): string
    {
        $date = Carbon::parse($model->$column);

        return $date->format($formattedDate);
    }
}
