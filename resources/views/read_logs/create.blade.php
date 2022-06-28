@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">

            <x-read-log.form label="{{ __('read_log.create') }}" buttonLabel="{{ __('read_log.create') }}" :form-options="['route' => ['books.read_logs.store', $book]]" />

        </div>
    </div>
@endsection
