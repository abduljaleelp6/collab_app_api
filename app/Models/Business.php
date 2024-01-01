<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class Business extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;
	//use HasFactory;
    public $table = "business";
    /*
    to avoid following error make primarykey
    SQLSTATE[23000]: Integrity constraint violation: 1048 Column
    'tokenable_id' cannot be null (SQL: insert into `personal_access_tokens`
    or should be id column name
    */
    protected $primaryKey = 'uni_id';
    protected $fillable = [
        'uni_id',
        'BID',
        'business_email',
        'business_main_phone_number',
        'business_address',
        'business_lat',
        'business_lng',
        'business_web_site',
        'business_username',
        'business_name',
        'business_password',
        'business_account_status',
        'business_bio',
        'business_logo',
        'business_cover_image',
        'business_country',
        'business_country_code',
        'business_city',
        'business_main_activity_id',
        'business_sub_activity_id',
        'business_creation_date',
        'business_subscriptions_renew_date',
        'business_exp_date',
        'business_facebook_url',
        'business_linkedin_url',
        'business_instagram_url',
        'business_google_map',
        'business_mode',
        'business_sme',
        'business_sme_type',
        'fcm_token',
        //'socketid',
        //'online',

    ];
    protected $hidden = [
        'business_password'
    ];

    /*
As per auth logic password key name should be "password" So to override default functionality you need:

In your user model add (override) method getAuthPassword

    */
    public function getAuthPassword()
{
    //Update your code (change business_password to password in controller):
    return $this->business_password;
}
}

