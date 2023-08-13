<?php

namespace App\Models\Pivot;

use App\Models\Schedule;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceSchedule extends Pivot
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'used_bonus',
        'executed',
        'schedule_id',
        'service_id',
    ];

    public $casts = [
        'used_bonus' => 'boolean',
        'executed' => 'boolean',
    ];

    public function schedules() {
        return $this->belongsTo(Schedule::class);
    }

    public function services() {
        return $this->belongsTo(Service::class);
    }
}
