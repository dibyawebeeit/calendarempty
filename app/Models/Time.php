<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;

    protected $table = "times";
    protected $fillable = [
        'date',
        'clientId',
        'userId',
        'rateId',
        'description',
        'time',
        'amount'
    ];
}
