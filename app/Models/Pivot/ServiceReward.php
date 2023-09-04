<?php

namespace App\Models\Pivot;

use App\Models\Reward;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceReward extends Pivot
{
    use HasFactory;

    protected $fillable = [
        'bonus_service',
        'quantity_service',
        'quantity_bonus',
        'reward_id',
        'service_id',
    ];

    public function rewards() {
        return $this->belongsTo(Reward::class);
    }

    public function services() {
        return $this->belongsTo(Service::class);
    }
}
