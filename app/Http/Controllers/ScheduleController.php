<?php

namespace App\Http\Controllers;

use App\Models\Pivot\ServiceSchedule;
use App\Models\Schedule;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $barbers = User::select('id', 'name')->get();
        $services = Service::select('id', 'name')->get();

        return view('schedule', compact('barbers', 'services'));
    }

    public function scheduleService(Request $request)
    {
        if ($request->time < "09:00" || $request->time > "18:00")
        {
            return redirect()->back()->with('toast', json_encode([
                'title' => 'Erro!',
                'message' => 'A barbearia não estará aberta!',
                'type' => 'error'
            ]));
        }

        $data = $request->date. ' ' .$request->time. ':00';
        $availableTime = Schedule::where('date_scheduling', $data)->get();

        if ($availableTime->isEmpty())
        {
            try {
                $schedule = Schedule::create([
                    'date_scheduling' => $data,
                    'user_id' => $request->barber_id,
                    'customer_id' => auth()->user()->id,
                ]);

                foreach ($request->servico_id as $service)
                {
                    ServiceSchedule::create([
                        'service_id' => $service,
                        'schedule_id' => $schedule->id,
                    ]);
                }
            } catch (\Throwable $th) {
                dd($th);
            }

            return redirect()->back()->with('toast', json_encode([
                'title' => 'Sucesso!',
                'message' => 'Horário reservado com sucesso!',
                'type' => 'success'
            ]));
        } else {
            return redirect()->back()->with('toast', json_encode([
                'title' => 'Erro!',
                'message' => 'Horário indisponível!',
                'type' => 'error'
            ]));
        }
    }
}
