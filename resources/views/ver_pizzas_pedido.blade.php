@extends('layouts.app')

@section('content')
<div class="loader-wrapper">
    <span class="loader"><span class="loader-inner"></span></span>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Listado de Pizzas en Pedido') }}</div>

                <div class="card-body">
                    
                    <ver_pizzas_pedido></ver_pizzas_pedido>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
