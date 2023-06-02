<?php

namespace App\Http\Middleware;

use App\Data\FlashBagData;
use App\Data\SecurityData;
use App\Data\SharedData;
use App\Data\UserData;
use Hybridly\Http\Middleware;

class HandleHybridRequests extends Middleware
{
    /**
     * Defines the properties that are shared to all requests.
     */
    public function share(): SharedData
    {
        return SharedData::from([
            'security' => SecurityData::from([
                'user' => UserData::optional(auth()->user()),
            ]),
            'flash' => FlashBagData::from([
                'success' => session()->get('success'),
                'danger' => session()->get('danger'),
                'warning' => session()->get('warning'),
                'info' => session()->get('info'),
            ]),
        ]);
    }
}
