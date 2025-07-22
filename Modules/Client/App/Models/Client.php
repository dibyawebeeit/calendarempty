<?php

namespace Modules\Client\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Client\Database\factories\ClientFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\State;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $table = "clients";
    protected $fillable = [
        'first_name',
        'last_name',
        'address',
        'city',
        'stateId',
        'zipcode',
        'attorney_rate',
        'legal_secretary_rate',
        'legal_assistant_rate',
        'initial_balance',
        'notes',
        'status'
    ];

    protected static function newFactory()
    {
        //return ClientFactory::new();
    }

    public function stateDetails()
    {
        return $this->hasOne(State::class, 'id', 'stateId');
    }
}
