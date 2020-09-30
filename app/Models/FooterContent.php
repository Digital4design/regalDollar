<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FooterContent extends Model
{
    protected $table ="footer_contents";
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'section',
        'menu_name',
        'link'
    ];
}
