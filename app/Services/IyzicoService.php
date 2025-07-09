<?php

namespace App\Services;

use Iyzipay\Options;

class IyzicoService
{
    public static function getOptions(): Options
    {
        $options = new Options();
        $options->setApiKey(config('iyzipay.api_key'));
        $options->setSecretKey(config('iyzipay.secret_key'));
        $options->setBaseUrl(config('iyzipay.base_url'));

        return $options;
    }
}
