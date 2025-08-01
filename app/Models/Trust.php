<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trust extends Model
{
    use HasFactory;

    protected $table = "trusts";
    protected $fillable = [
        'date',
        'clientId',
        'description',
        'amount',
        'refund'
    ];
}
