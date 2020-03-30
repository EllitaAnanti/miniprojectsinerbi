<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
* users
*/
use Illuminate\Database\Eloquent\Model as Eloquent;

class M_Users extends Eloquent
{

    protected $table = 'users';

    // ini masukkin aja semua attribute nya yang ada di database
    protected $fillable = array('id', 'profile_image_url', 'full_name','nick_name','email','birth_date'
    ,'city','nationality','password','phone_number','address','hobby','about', 'date_created', 'date_updated','mark_for_delete');
    
    public $timestamps = false;

    protected $hidden = array('password');

}
