<?php

namespace App\Http\Controllers;

use App\Models\Pivot\ServiceReward;
use App\Models\Schedule;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $bonusAtual = ServiceReward::join('rewards', 'reward_id', '=', 'rewards.id')
                    ->where([
                        ['rewards.date_start', '<', now()],
                        ['rewards.date_end', '>', now()]
                    ])
                    ->first();

        $totalServicos = Schedule::where('customer_id', Auth()->user()->id)
                        ->where([
                            ['date_execution', '<', $bonusAtual->date_end],
                            ['date_execution', '>', $bonusAtual->date_start]
                        ])
                        ->count();
        return view('home', compact('bonusAtual', 'totalServicos'));
    }
}
