<?php

namespace App\Models;

use App\Models\Pivot\ServiceReward;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    use HasFactory;

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date_start' => 'datetime',
        'date_end' => 'datetime',
    ];

    public function services()
    {
        return $this->belongsToMany(Service::class)->using(ServiceReward::class);
    }
}
