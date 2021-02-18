@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Insertar nuevo ingrediente en Pizza') }}</div>

                <div class="card-body">
                    <crear_ingredientes_pizza></crear_ingredientes_pizza>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
