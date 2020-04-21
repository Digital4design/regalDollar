<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvestmentModel extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'investment';
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'user_id',
        'plan_id',
        'plan_start_date',
        'plan_end_date',
        'paypal_transaction_id',
        'amount',
        'indicateagreement',
        'reinvestment',
        'is_request',
        'linked_account',
        'signature',
        ];
    /**
     * Return current login user role here.
     * @var string
     */
}
