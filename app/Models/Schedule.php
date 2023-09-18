<?php

namespace App\Models;

use App\Models\Pivot\ServiceSchedule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'date_scheduling',
        'date_execution',
        'user_id',
        'customer_id'
    ];

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
