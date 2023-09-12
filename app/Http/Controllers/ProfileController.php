<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth()->user();
        $data = Schedule::where('customer_id', $user->id)
                        ->orderBy('date_execution','desc')
                        ->first();

        return view('profile', compact('user', 'data'));
    }
    public function update(Request $request)
    {
        if (User::where('email', $request->email)->first()) {
            $user = auth('user')->user();
        } else {
            $user = auth('customer')->user();
        }

        $data = $request->validate([
            'password' => 'required|string|min:6|confirmed'
        ]);

        $customer = $user;
        $customer->password = Hash::make($data['password']);
        $customer->update();

        return redirect()->back()->with('toast', json_encode([
            'title' => 'Sucesso!',
            'message' => 'Senha atualizada com sucesso!',
            'type' => 'success'
        ]));
    }
}