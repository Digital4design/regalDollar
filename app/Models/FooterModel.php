<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FooterModel extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'footer_models';
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
