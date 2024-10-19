@extends('layouts.backend.admin')

@section('content')
    @include('layouts.backend.alert')
    <div class="title pb-20">
        <h2 class="h3 mb-0">Dashboard Overview</h2>
    </div>
    <div class="mb-3">
        <div class="jumbotron  text-center"
            style="background: rgba(0, 179, 255, 0.694);backdrop-filter: blur(10px); border-radius:20px;">
            <h2>Selamat Datang di</h2>
            <h4 class="text-white">{{ env('APP_NAME') }}</h4>
        </div>
        <hr>
    </div>
    <div class="row justify-content-center">

    </div>
@endsection
