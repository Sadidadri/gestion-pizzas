@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar un Ingrediente') }}</div>

                <div class="card-body">
                    <editar_ingredientes></editar_ingredientes>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
