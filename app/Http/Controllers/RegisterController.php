<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegistrationRequest as AuthRegistrationRequest;
use App\Models\Customer;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('customer');
    }

    public function register(AuthRegistrationRequest $request){
        event(new Registered($customer = $this->create($request->validated())));

        $this->guard()->login($customer);

        return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect()->intended(route('front.dashboard'));
    }

    protected function create(array $data)
    {
        $data = collect($data)->forget('password_confirmation');
        $customer = Customer::create(
            array_merge(
                $data->toArray(),
                [
                    'name' => $data['name'],
                    'phone' => $data['phone'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                ]
            )
        );

        return $customer;
    }
}
