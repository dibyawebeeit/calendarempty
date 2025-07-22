<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ratetype extends Model
{
    use HasFactory;

    protected $table = "ratetype";
    protected $fillable = [
        'title',
        'status'
    ];
}
