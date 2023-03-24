<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use App\Models\Work;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        $works = Work::all();
        return view('users.create', compact('cities', 'works'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'surname' => 'required|string',
            'name' => 'required|string',
            'patronymic' => 'required|string',
            'b_date' => 'required|date_format:Y-m-d|before:today',
            'city_id' => 'required|exists:cities,id',
            'work_id' => 'required|exists:works,id',
        ]);

        $user = User::create($validatedData);

        return redirect()->route('users.index')->with('success', 'User has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $cities = City::all();
        $works = Work::all();
        return view('users.edit', compact('user', 'cities', 'works'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, Request $request)
    {
        $validatedData = $request->validate([
            'surname' => 'required|string',
            'name' => 'required|string',
            'patronymic' => 'required|string',
            'b_date' => 'required|date_format:Y-m-d|before:today',
            'city_id' => 'required|exists:cities,id',
            'work_id' => 'required|exists:works,id',
        ]);

        $user->update($validatedData);

        return redirect()->route('users.index')->with('success','User has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success','User has been deleted successfully');
    }
}
