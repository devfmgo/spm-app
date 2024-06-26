<?php

namespace App\Http\Controllers;

use finfo;
use App\Models\Type;
use App\Models\Unit;
use App\Models\Document;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


$finfo = new finfo(FILEINFO_MIME_TYPE);

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $units = Unit::all();
        $types = Type::all();
        $countDocument = Document::all();
        $limit = 12;
        // filter all data
        if ($countDocument) {
            $documents = Document::with('unit', 'type')->latest()->paginate($limit);
        }
        // filter berdasarkan unit
        if (request('uid') > 1) {
            $documents = Document::with('unit', 'type')->where('unit_id', request('uid'))->latest()->paginate($limit);
        }


        if (request('type') > 0) {
            $documents = Document::with('unit', 'type')->where('type_id', request('type'))->latest()->paginate($limit);
        }

        if (request('uid') > 1 && request('type') > 0) {
            $documents = Document::with('unit', 'type')->where('unit_id', request('uid'))->where('type_id', request('type'))->latest()->paginate($limit);
        }

        // filter berdasarkan search
        if (request('search')) {
            $documents = Document::with('unit', 'type')->where('title', 'LIKE', '%' . request('search') . '%')->latest()->paginate($limit);
        }
        return view('pages.document.index', compact('documents', 'units', 'types'));
    }
    /** Data Document **/
    public function document_data()
    {

        if (request('id') == null) {
            $documents = Document::with('unit', 'type')->paginate(10);
        } elseif (request('id') == "all") {
            $documents = Document::with('unit', 'type')->paginate(10);
        } else {
            $documents = Document::with('unit', 'type')->onlyTrashed()->paginate(10);
        }

        $request = request('id');
        $softDelete = Document::onlyTrashed()->count();
        $unit = Unit::skip(1)->take(10)->get();
        $result = 0;
        return view('pages.document.data-document', compact('documents', 'softDelete', 'request', 'unit', 'result'));
    }
    /** Filter softDelete */
    public function filter($id)
    {
        $idFilter = explode(',', $id);
        $request = request('id');
        $documents = Document::with('unit', 'type')->whereIn('unit_id', $idFilter)->paginate(10);
        $softDelete = Document::onlyTrashed()->count();
        $unit = Unit::all();
        $result = 0;
        return view('pages.document.data-document', compact('documents', 'softDelete', 'request', 'unit', 'result'));
    }

    /** Search document */

    public function search_document()
    {

        $q = request('find');
        $documents = Document::with('unit', 'type')->where('title', 'like', '%' . $q . '%')->paginate(10);
        $softDelete = Document::onlyTrashed()->count();
        $unit = Unit::all();
        $request = request('id');
        $result = Document::where('title', 'like', '%' . $q . '%')->count('id');

        return view('pages.document.data-document', compact('documents', 'softDelete', 'request', 'unit', 'result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $units = Unit::all();
        $types = Type::all();

        return view('pages.document.add-document', compact('units', 'types'));
    }
    // function set folder
    public function folder($type)
    {
        $typesDocument = Type::find($type);
        return $typesDocument->name;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /** Store data document kedalam aplikasi */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'mimes:pdf|max:3000',
            'title' => 'required',
            'unit_id' => 'required',
            'type_id' => 'required'
        ]);

        $uploadedFile = $request->file;
        $filename = $request->unit_id . "_" . $request->type_id . "_" . $request->title . "." . $request->file('file')->getClientOriginalExtension();
        $simpan = $uploadedFile->storeAs('public/' . $this->folder($request->type_id), $filename);
        $data = new Document();
        $data->title = $request->title;
        $data->unit_id = $request->unit_id;
        $data->type_id = $request->type_id;
        $data->slug = Str::slug($request->title);
        $data->file_doc = $filename;
        if ($data->save()) {
            return redirect('data-document/all');
        }
        return back();
    }

    /**
     * Display the specified resource. *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $documents = Document::where('slug', $slug)->first();
        return view('pages.document.view-document', compact('documents'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $units = Unit::all();
        $types = Type::all();
        $document = Document::findOrFail($id);
        return view('pages.document.edit-document', compact('document', 'units', 'types'));
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
            'file' => 'mimes:pdf|max:3000',
            'title' => 'required',
            'unit_id' => 'required',
            'type_id' => 'required'
        ]);

        if ($request->hasFile('file')) {
            $uploadedFile = $request->file;
            $filename = $request->unit_id . "_" . $request->type_id . "_" . $request->title . "." . $request->file('file')->getClientOriginalExtension();
            $simpan = $uploadedFile->storeAs('public/' . $this->folder($request->type_id), $filename);
            $data = Document::find($id);
            $data->title = $request->title;
            $data->unit_id = $request->unit_id;
            $data->type_id = $request->type_id;
            $data->slug = Str::slug($request->title);
            $data->file_doc = $filename;
            if ($data->update($request->all())) {
                toastr()->success('Success', 'Data has been update Success!');
                return redirect('data-document/all');
            }
        } else {
            // dd('without file');
            $data = Document::find($id);
            $data->title = $request->title;
            $data->unit_id = $request->unit_id;
            $data->type_id = $request->type_id;
            $data->slug = Str::slug($request->title);
            if ($data->update($request->all())) {
                toastr()->success('Success', 'Data has been update Success!');
                return redirect('data-document/all');
            }
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirmDelete($id)
    {
        return view('pages.document.confirm-delete', compact('id'));
    }

    public function destroy($id)
    {
        Document::find($id)->delete();
        return redirect()->route('data-document', 'all');
    }
    public function deleteAll($id)
    {

        // script for delete data with file
        $document = Document::with('type')->onlyTrashed()->find($id);
        $folder = $document->type->name;
        $file  = $document->file_doc;
        Storage::delete('public/' . $folder . '/' . $file);
        //Delete Permanent
        Document::where('id', $id)->forceDelete();
        return redirect()->route(
            'data-document',
            'all'
        );
    }
    //  function restore or delete data permanent
    public function restoreDelete($act, $id)
    {
        if ($act == "restore") {
            Document::withTrashed()->where('id', $id)->restore();
            return redirect()->route('data-document', 'all');
        }
        return redirect()->route('data-document', 'all');
    }
    // download document
    public function downloadDocument(Request $request, $slug)
    {
        $documents = Document::where('slug', $slug)->first();
        $url = Storage::url($documents->type->name . '/');
        $path = public_path($url . $documents->file_doc);
        return response()->download($path);
    }
}
