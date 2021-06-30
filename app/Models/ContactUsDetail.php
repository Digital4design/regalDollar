<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUsDetail extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'contact_us_details';
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'contact_number',
        'contact_email',
        'contact_address'
    ];
}
