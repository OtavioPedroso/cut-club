<?php

namespace App\Models;

use App\Models\Pivot\ServiceSchedule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use HasFactory;
    use SoftDeletes;

     /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date_scheduling' => 'datetime',
        'date_execution' => 'datetime',
    ];

    public function services()
    {
        return $this->belongsToMany(Service::class)->using(ServiceSchedule::class);
    }

}
