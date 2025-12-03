<?php

namespace App\Core\Support;

use Exception;

class OtpGenerator
{
    /**
     * @param int|null $length
     * @return int
     * @throws Exception
     */
    public static function getOtp(?int $length = 6): int
    {
        try {

            if (config("services.enable_random_code")) {

                $code = random_int(000000, (int)str_repeat("9", $length));

            } else {

                $code = (int)str_repeat("9", $length);

            }

            return $code;

        } catch (Exception $e) {

            throw new Exception(__("Something went wrong, please try again"));

        }
    }
}
