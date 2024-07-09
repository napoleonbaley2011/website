<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Http\Request;
use Hash;
use Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'apellidos',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function list()
    {
        return $this::orderBy('id', 'DESC')->get();
    }

    public function store(Request $request)
    {
        $user = $this::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return $user;
    }

    public function modify(Request $request)
    {
        $id = Auth::id();
        $user = User::find($id);

        $user->nombre = $request->nombre;
        $user->apellidos = $request->apellidos;
        $user->save();

        return $user;
    }

    public function editPassword(Request $request)
    {
        $password = Auth::user()->password;
        $user = User::find(Auth::user()->id);
        if (Hash::check($request->password, $password)) {
            $user->old_password = $password;
            $user->password = Hash::make($request->passwordn);
            $user->save();
            return true;
        }
        return false;
    }

    public function deleteOne($id)
    {
        $user = $this::find($id);
        $user->delete();
    }
}