<p align="center">
    <a href="https://packagist.org/packages/thomasdseao/ovh_sms"><img src="https://poser.pugx.org/thomasdseao/ovh_sms/d/total.svg" alt="Total Downloads"></a>
</p>

# Laravel Package for OVH SMS

## Quick Start Guide

- Create a Laravel project: `composer create-project laravel/laravel myproject`
- `cd myproject`
- Installation Via Composer
Add this to your `composer.json` file, in the require object:
```javascript
"thomasdseao/ovh_sms": "1.0.0"
```
- After that, run `composer install` to install the package.
- Copy configuration: `php artisan vendor:publish` (To publish the ovhsms config file)


Now you are ready to use the Ovhsms Facade, e.g. open routes/web.php:

``` PHP
<?php

Route::get('testsms', function(Request $request) {
    return Ovhsms::send("SENDER NAME", "0033610203040", "Hey guys !\nHow are you today ?", 1);
});
```
The parameters definition of function send :
- The sender name (This name will be display on phone when customer receive the SMS)
- Phone number in international format : '0033' before all phone numbers (See example with french number)
- The message (If you want to do a line break, please type : \n) PS : Do not forget to use double quotes for the message parameter
- The nostop : set to 1 to not display "STOP at XXXXX" at the end of the message for a non-commercial SMS


Add this to your .env file :
```
OVH_SMS_URL=https://www.ovh.com/cgi-bin/sms/http2sms.cgi
OVH_SMS_APP_ACCOUNT=sms-pl996816-1
OVH_SMS_APP_LOGIN=login_user
OVH_SMS_PASSWORD=abf30vM9
```
