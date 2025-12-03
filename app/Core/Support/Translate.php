<?php

namespace App\Core\Support;

use Stichoza\GoogleTranslate\GoogleTranslate;

class Translate
{
    public static function translate($to, $word, $from = null): ?string
    {
        if (!is_null($word)) {
            $googleTranslate = new GoogleTranslate();
            if ($from == null) {
                $googleTranslate->setSource();
            } else {
                $googleTranslate->setSource($from);
            }
            $googleTranslate->setTarget($to);
            return $googleTranslate->translate($word);
        }
        return $word ?? "";
    }
}
