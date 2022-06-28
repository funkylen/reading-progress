@extends('layouts.app')

@section('title', implode(' - ', [__('read_log.create'), $book->title]))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">

            <x-read-log.form
                label="{{ __('read_log.create') }}"
                buttonLabel="{{ __('read_log.create') }}"
                :book="$book"
                :form-options="['route' => ['books.read_logs.store', $book]]"/>

        </div>
    </div>
@endsection
