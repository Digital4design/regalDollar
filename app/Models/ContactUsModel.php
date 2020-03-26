<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUsModel extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'contact_us';
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'contact_subject',
        'contact_option',
        'message',
    ];
    /**
     * Return current login user role here.
     * @var string
     */
}
