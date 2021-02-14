@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Listado de Ingredientes') }}</div>

                <div class="card-body">
                    <ver_ingredientes></ver_ingredientes>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
