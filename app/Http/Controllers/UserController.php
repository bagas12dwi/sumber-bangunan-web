<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('users.index', ['title' => 'User']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.add', [
            'title' => 'Tambahkan User'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);
        return redirect()->intended('/manage-user')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $manage_user)
    {
        User::destroy($manage_user->id);
        return redirect()->intended('/manage-user')->with('success', 'Data Berhasil Dihapus!');
    }
}
