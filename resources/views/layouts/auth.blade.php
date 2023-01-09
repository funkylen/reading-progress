@extends('layouts.clean')

<style>
    .fab {
        padding: calc(25px / 2);
        font-size: 25px;
        width: 50px;
        height: 50px;
        text-align: center;
        text-decoration: none;
        margin: 5px 2px;
        border-radius: 50%;
    }

    .fab:hover {
        opacity: 0.7;
        color: white;
    }

    .fa-google {
        background-color: #dd4b39 !important;
        color: white !important;
    }
</style>

@section('content')
    <div class="container col-xl-10 col-xxl-8 px-4 pt-5">
        <div class="row g-lg-5 py-xl-5">
            <div class="col-lg-7 text-start">
                <h1 class="display-4 fw-bold lh-1 mb-3">{{ __('Read More!') }}</h1>
                <p class="col-lg-10 fs-4">{{ __('Reading Progress helps you track your reading progress. Add books, update reading progress. Keep track of how many books and pages you have read.') }}</p>
            </div>

            <div
                id="form"
                class="col-md-10 mx-auto col-lg-5"
                x-init="setTimeout(() => show = true)"
                x-show="show"
                x-cloak
                x-transition.duration.750ms
                x-data="{ show: false }">

                @yield('form')
            </div>

        </div>
    </div>

    @yield('bottom-content')

@endsection

