@extends('layouts.app')
@section('title')
@section('content')
    <div class="container">
        </h3>
        <embed src="{{ Storage::url($documents->type->name . '/' . $documents->file_doc) }}#toolbar=0&navpanes=0&scrollbar=0"
            width="800" height="1040" class="m-auto shadow-sm">

    </div>
@endsection
