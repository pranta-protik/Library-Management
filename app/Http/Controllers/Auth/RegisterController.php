<?php

namespace App\Http\Controllers\Auth;

use App\Member;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
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
    protected $redirectTo = '/register';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('role');
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
            'role'=>'required|string',
            'username'=>'required|string|max:255|unique:users',
            'firstName'=>'required|string|max:255',
            'lastName'=>'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'dob'=>'required|date',
            'gender'=>'required|string',
            'contact'=>'required|string',
            'address'=>'required|string',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'role'=>$data['role'],
            'username'=>$data['username'],
            'firstName'=>$data['firstName'],
            'lastName'=>$data['lastName'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'dob'=>$data['dob'],
            'gender'=>$data['gender'],
            'contact'=>$data['contact'],
            'address'=>$data['address'],
        ]);
    }

    protected function validateMember(array $data){
        return Validator::make($data,[
           'profession'=>'required|string',
           'institution'=>'required|string',
        ]);
    }

    protected function createMember(array $data,$user){
        return Member::create([
            'user_id'=>$user->id,
            'profession'=>$data['profession'],
            'institution'=>$data['institution'],
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        if (auth()->guest()){

            $this->validateMember($request->all());
            $this->createMember($request->all(),$user);
        }
        //$this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

}
