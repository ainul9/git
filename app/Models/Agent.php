<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    protected $table = 'agent';

    protected $fillable = [
        'agentCat',
        'registrationNum',
        'contact',
        'address',
        'city',
        'postcode',
        'state',
        'country',
        'remarks'
    ];

    protected $guarded = ['usersID', 'agentName'];

    public function user()
    {
        return $this->belongsTo(User::class, 'usersID');
    }



}
