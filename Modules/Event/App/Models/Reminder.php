<?php

namespace Modules\Event\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Event\Database\factories\ReminderFactory;

class Reminder extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $table = "reminders";
    protected $fillable = [
        'eventId',
        'daysPrior',
        'date',
        'title',
        'details'
    ];

    protected static function newFactory()
    {
        //return ReminderFactory::new();
    }
}
