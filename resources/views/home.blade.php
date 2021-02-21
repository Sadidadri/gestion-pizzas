@extends('layouts.app')

@section('estilos')
<link href="https://fonts.googleapis.com/css?family=Quicksand:300,500" rel="stylesheet">
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <home></home>
        </div>
    </div>
</div>
@endsection