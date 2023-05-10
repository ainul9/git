<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'createtask';

    protected $fillable = [
        'productID',
        'productName',
        'quantity',
        'service',
        'pickupAdd',
        'pickupDate',
        'deliveryAdd',
        'deliveryDate',
        'remarks',
        'status'
    ];

    protected $guarded = ['usersID','agentName'];

    public function user()
    {
        return $this->belongsTo(User::class, 'usersID');
    }

}
