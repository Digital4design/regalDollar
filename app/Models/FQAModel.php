<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FQAModel extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'fqa';
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'fqaHeadding',
        'fqaAnswer',
        'fqa_type',
    ];
    /**
     * Return current login user role here.
     * @var string
     */
}
