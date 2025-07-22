<?php

namespace Modules\Timecard\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Timecard\Database\factories\TimecardFactory;

use App\Models\User;

class Timecard extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $table = "timecards";
    protected $fillable = [
        'userId',
        'timeIn',
        'timeOut'
    ];

    protected static function newFactory()
    {
        //return TimecardFactory::new();
    }

    public function userDetails()
    {
        return $this->hasOne(User::class, 'id', 'userId');
    }
}
