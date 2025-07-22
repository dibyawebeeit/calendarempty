<?php

namespace Modules\Event\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Event\Database\factories\EventFactory;

use App\Models\User;
use Modules\Client\App\Models\Client;
use Modules\Event\App\Models\Assign;

class Event extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $table = "events";
    protected $fillable = [
        'start_date',
        'end_date',
        'title',
        'description',
        'importance',
        'clientId'
    ];

    public function client() {
        return $this->belongsTo(Client::class, 'clientId');
    }
    
    public function assignedUser() {
        return $this->hasOneThrough(User::class, Assign::class, 'eventId', 'id', 'id', 'userId')->whereNull('reminderId');
    }

    protected static function newFactory()
    {
        //return EventFactory::new();
    }
}
