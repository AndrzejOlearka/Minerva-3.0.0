<?php

namespace App\Http\Controllers\Auth;

use App\Models\Mine;
use App\Models\Trip;
use App\Models\User;
use App\Models\Mission;
use App\Models\Expedition;
use App\Models\DailyReward;
use App\Models\BasicMineral;
use App\Models\AdvancedMineral;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
     */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user' => ['required', 'string', 'min:5', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        DB::beginTransaction();
        try {
            $user = User::create([
                'user' => $data['user'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'premium_end' => date('Y-m-d', strtotime(date('Y-m-d H:i:s + 3 days')))
            ]);
    
            BasicMineral::insert([
                'user_id' => $user->id
            ]);
    
            AdvancedMineral::insert([
                'user_id' => $user->id
            ]);
    
            Expedition::insert([
                'user_id' => $user->id
            ]);
    
            Trip::insert([
                'user_id' => $user->id
            ]);
    
            Mine::insert([
                'user_id' => $user->id
            ]);
    
            Mission::insert([
                'user_id' => $user->id
            ]);
    
            DailyReward::insert([
                'user_id' => $user->id
            ]);

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
        }
       
        return $user;
    }
}
