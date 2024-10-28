<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'message_content',
        'sender_type',
        'receiver_type',
    ];

    public function sender()
    {
        return $this->morphTo(); // polymorphic relation
    }

    public function receiver()
    {
        return $this->morphTo(); // polymorphic relation
    }
}
