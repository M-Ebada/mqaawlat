<?php

namespace App\Console\Commands;

use App\Core\Support\Translate;
use Artisan;
use File;
use Illuminate\Console\Command;

class TranslateCommand extends Command
{
    protected $signature = 'trans-files';

    protected $description = 'Translate files existing in lang folder into [ar] lang';

    public function handle(): void
    {
        Artisan::call("translation:sync-missing-translation-keys");
        $enWords = json_decode(file_get_contents(base_path("lang/ar.json")), true);
        $arWords = [];
        foreach ($enWords as $key => $value) {
            if ($value == "") {
                $arWords[$key] = Translate::translate("ar", $key);
            } else {
                $arWords[$key] = $value;
            }
        }
        File::put(base_path("lang/ar.json"), json_encode($arWords, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
}
