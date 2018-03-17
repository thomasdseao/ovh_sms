<?php

namespace Thomasdseao\Ovh_sms;

use \Illuminate\Support\Facades\Facade;

class OvhSmsFacade extends Facade {
    protected static function getFacadeAccessor() {
        return 'ovhsms';
    }
}
