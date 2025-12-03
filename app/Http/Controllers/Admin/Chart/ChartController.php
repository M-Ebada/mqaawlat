<?php

namespace App\Http\Controllers\Admin\Chart;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function users()
    {
        return $this->makeChart("users");
    }

    public function vendors()
    {
        return $this->makeChart("vendors");
    }

    public function shops()
    {
        return $this->makeChart("shops");
    }

    private function makeChart(string $tableName)
    {
        for ($i = 1; $i <= 12; $i++) {
            $year = now()->format("Y");
            $date_1 = Carbon::create($year, $i)->startOfMonth()->format('Y-m-d');
            $date_2 = Carbon::create($year, $i)->lastOfMonth()->format('Y-m-d');
            $counts[] = DB::table($tableName)
                ->whereDate("created_at", ">=", $date_1)
                ->whereDate("created_at", "<=", $date_2)
                ->count();
        }
        return $this->sendSuccessResponse(data: [
            "counts" => $counts,
            "months" => collect(self::months())->values()->pluck("title")->values()
        ], message: __("Data Retrieved Successfully"));
    }

    public static function months(): array
    {
        return [
            "jan" => [
                "title" => __("January"),
                "date" => \Illuminate\Support\Carbon::now()->firstOfYear()->format("Y-m-d H:i:s"),
            ],
            "feb" => [
                "title" => __("February"),
                "date" => Carbon::now()->firstOfYear()->addMonth()->format("Y-m-d H:i:s"),
            ],
            "mar" => [
                "title" => __("March"),
                "date" => Carbon::now()->firstOfYear()->addMonths(2)->format("Y-m-d H:i:s"),
            ],
            "apr" => [
                "title" => __("April"),
                "date" => Carbon::now()->firstOfYear()->addMonths(3)->format("Y-m-d H:i:s"),
            ],
            "may" => [
                "title" => __("May"),
                "date" => Carbon::now()->firstOfYear()->addMonths(4)->format("Y-m-d H:i:s"),
            ],
            "june" => [
                "title" => __("June"),
                "date" => Carbon::now()->firstOfYear()->addMonths(5)->format("Y-m-d H:i:s"),
            ],
            "july" => [
                "title" => __("July"),
                "date" => Carbon::now()->firstOfYear()->addMonths(6)->format("Y-m-d H:i:s"),
            ],
            "aug" => [
                "title" => __("August"),
                "date" => Carbon::now()->firstOfYear()->addMonths(7)->format("Y-m-d H:i:s"),
            ],
            "sept" => [
                "title" => __("September"),
                "date" => Carbon::now()->firstOfYear()->addMonths(8)->format("Y-m-d H:i:s"),
            ],
            "oct" => [
                "title" => __("October"),
                "date" => Carbon::now()->firstOfYear()->addMonths(9)->format("Y-m-d H:i:s"),
            ],
            "nov" => [
                "title" => __("November"),
                "date" => Carbon::now()->firstOfYear()->addMonths(10)->format("Y-m-d H:i:s"),
            ],
            "dec" => [
                "title" => __("December"),
                "date" => Carbon::now()->firstOfYear()->addMonths(11)->format("Y-m-d H:i:s"),
            ],
        ];
    }

}
