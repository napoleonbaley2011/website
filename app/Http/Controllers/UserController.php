<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    private $userService;


    public function __construct()
    {
        $this->userService = new User();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lista = $this->userService->list();
        return view('admin.user.index', compact('lista'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'apellidos' => 'required|max:255',
            'email' => 'required|max:255|string|email|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $this->userService->store($request);
        return redirect()->route('user.index')
            ->with('success', 'Se guardo correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.user.perfil');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.user.perfil');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->userService->modify($request);
        return redirect()->route('home')
            ->with('success', 'Se modifico el perfil correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->userService->deleteOne($id);
        return redirect()->route('user.index')
            ->with('success', 'Se eliminó correctamente.');
    }

    public function editPassword(Request $request)
    {
        $success = $this->userService->editPassword($request);
        if ($success) {
            return redirect()->route('home')
                ->with('success', 'Se modificó la contraseña correctamente.');
        }
        return redirect()->route('home')
            ->with('error', 'La contraseña que ingreso no es valida');
    }
}