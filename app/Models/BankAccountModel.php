<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankAccountModel extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'bank_accounts';
	
	/**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [ 
        'user_id',
        'first_name',
        'last_name',
        'bank_name',
        'account_number',
        'swift_code',
    ];

    /**
     * Return current login user role here.
     * @var string
     */
}
