<?php

namespace App\Models;

use App\Models\Pivot\ServiceReward;
use App\Models\Pivot\ServiceSchedule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'price',
        'description',
    ];

    public function serviceRewards()
    {
        return $this->hasMany(ServiceReward::class);
    }

    public function serviceSchedule()
    {
        return $this->hasMany(ServiceSchedule::class);
    }

}
