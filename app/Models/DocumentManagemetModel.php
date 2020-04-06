<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentManagemetModel extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'documents_management';
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'users_id',
        'plan_id',
        'documents_title',
        'documents_path',
        'message',
    ];
    /**
     * Return current login user role here.
     * @var string
     */
}
