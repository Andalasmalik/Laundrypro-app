<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index', [
            'users' => User::all(),
            'tb_outlet'=> Outlet::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request ->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'outlet_id' => 'required',
            'role' => 'required'
            ]);
            
            $validated['password']=Hash::make($validated['password']);
            
           $input = User::create($validated);
    
          if($input) return redirect('#')->with('susces', 'Data berhasil diinput');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($users)
    {
        return view('user.index', [
            'user'=> $users
        ]);
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
        $validated = $request ->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'outlet_id' => 'required',
            'role' => 'required'
            ]);


            $input = User::where('id', $id)
                    ->update($validated);
                    
            if($input) return redirect('user')->with('susces', 'Data berhasil diinput');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
