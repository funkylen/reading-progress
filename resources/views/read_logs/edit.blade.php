@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">

            <x-read-log.form label="{{ __('Edit Read Log') }}" buttonLabel="{{ __('Update') }}" :read-log="$readLog"
                :book="$book" :form-options="['route' => ['books.read_logs.update', $book, $readLog], 'method' => 'PUT']" />

        </div>
    </div>
@endsection
