<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

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
        $delete = User::onlyTrashed()->count();
        return view('pages.user.index', compact('users', 'delete'));
    }

    public function trash()
    {
        $users = User::onlyTrashed()->paginate(10);
        $delete = User::onlyTrashed()->count();
        return view('pages.user.index', compact('users', 'delete'));
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
        //
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
    public function edit($id)
    {
        $data = User::find($id);
        return view('pages.user.edit', compact('data'));
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'is_admin' => ['required']
        ]);
        $user = $request->all();
        $user['name'] = $request->name;
        $user['email'] = $request->email;
        $user['password'] = Hash::make($request->password);
        $user['is_admin'] = $request->is_admin;
        dd($user);
        if (User::find($id)->update($user)) {
            toastr()->success('Data Succes Updated', 'Success');
            return redirect()->route('users');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (User::find($id)->delete()) {
            toastr()->success('Data Succes Deleted', 'Success');
            return redirect()->route('users');
        }
        return back();
    }

    public function restore($id)
    {
        if (User::withTrashed()->where('id', $id)->restore()) {
            toastr()->success('Data Succes Resore', 'Success');
            return redirect()->route('users');
        }
        return back();
    }

    public function empty($id)
    {
        if (User::where('id', $id)->forceDelete()) {
            toastr()->success('Data Succes Delete', 'Success');
            return redirect()->route('users');
        }
    }
}
