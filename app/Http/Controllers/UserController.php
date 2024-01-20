<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Imports\UserImport;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;



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
            toastr()->success('Data Success Restore', 'Success');
            return redirect()->route('users');
        }
        return back();
    }

    public function empty($id)
    {
        if (User::where('id', $id)->forceDelete()) {
            toastr()->success('Data Success Delete', 'Success');
            return redirect()->route('users');
        }
    }
    public function importUser()
    {
        return view('pages.user.import');
    }
    public function ImportUserProccess(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = $file->hashName();

        //temporary file
        $path = $file->storeAs('public/excel/', $nama_file);

        // import data
        $import = Excel::import(new UserImport(), storage_path('app/public/excel/' . $nama_file));

        //remove from server
        Storage::delete($path);
        if ($import) {
            toastr()->success('Data Succes Delete', 'Success');
        }

        // alihkan halaman kembali
        return redirect('/users');
    }

    public function downloadFormatExcel()
    {
        $url = Storage::url('excel/');
        $path = public_path($url . 'Format_Import.xlsx');
        return response()->download($path);
    }
}
