<?php

namespace App\Data;

use App\Data\FlashBagData;
use Spatie\LaravelData\Data;

class SharedData extends Data
{
    public function __construct(
        public readonly SecurityData $security,
        public readonly ?FlashBagData $flash,
    ) {
    }
}
