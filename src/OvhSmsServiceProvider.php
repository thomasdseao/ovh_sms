<?php

namespace Thomasdseao\OvhSms;

use Illuminate\Support\ServiceProvider;

class OvhSmsProvider extends ServiceProvider {
    protected $defer = true;

	public function boot() {
		$this->publishes([
			__DIR__.'/../config/ovh_sms.php' => config_path('ovh_sms.php'),
		], 'ovhsms');
	}

    public function register() {
		$this->mergeConfigFrom( __DIR__.'/../config/ovh_sms.php', 'ovhsms');

        $this->app->singleton('ovhsms', function($app) {
            $config = $app->make('config');

            $url = $config->get('ovhsms.url');
            $app_account = $config->get('ovhsms.app_account');
            $app_login = $config->get('ovhsms.app_login');
            $app_password = $config->get('ovhsms.app_password');

            return new OvhSmsService($url, $app_account, $app_login, $app_password);
        });
    }

    public function provides() {
        return ['ovhsms'];
    }
}
