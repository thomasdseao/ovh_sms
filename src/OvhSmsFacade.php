<?php

namespace Thomasdseao\OvhSms;

use \Illuminate\Support\Facades\Facade;

class OvhSmsFacade extends Facade {
    protected static function getFacadeAccessor() {
        return 'ovhsms';
    }
}
