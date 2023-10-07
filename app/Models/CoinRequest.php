<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoinRequest extends Model
{
    use HasFactory;

    protected $table = 'coin_requests';

    protected $fillable = [
        'user_id',
        'coins_requested',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
