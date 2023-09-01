<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use RegistersUsers;


    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'foto_profil' => ['nullable', 'max:2048'], // Add this line for profile photo

        ]);
    }

    protected function create(array $data){
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    
        if (isset($data['foto_profil'])) {
            $fotoProfilPath = $data['foto_profil']->store('profile_photos', 'public');
            $user->foto_profil = $fotoProfilPath;
            $user->save();
        }
    
        return $user;
    }

    protected function registered(Request $request, $user)
    {
        if ($request->hasFile('foto_profil')) {
            // Store the uploaded profile photo
            $user->foto_profil = $request->file('foto_profil')->store('profile_photos', 'public');
            $user->save();
        }
    }
}
