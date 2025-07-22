<?php

namespace Modules\Billing\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Billing\Database\factories\BillingFactory;

class Billing extends Model
{
    use HasFactory;

    protected $table="billings";
    protected $fillable = [
        'client_id',
        'billing_month',
        'initial_balance',
        'fees',
        'costs',
        'payment',
        'refund',
        'trust_credit',
        'trust_debit',
        'balance_due',
        'is_finalized'
    ];
    
    protected static function newFactory()
    {
        //return BillingFactory::new();
    }
}
