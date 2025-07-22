<?php

namespace Modules\Event\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Event\Database\factories\AssigneFactory;

use App\Models\User;

class Assign extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $table = "assign";
    protected $fillable = [
        'eventId',
        'reminderId',
        'userId'
    ];

    protected static function newFactory()
    {
        //return AssigneFactory::new();
    }

    public function userDetails()
    {
        return $this->hasOne(User::class, 'id', 'userId');
    }
}
