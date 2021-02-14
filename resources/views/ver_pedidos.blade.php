@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Listado de Pedidos') }}</div>

                <div class="card-body">
                    <ver_pedidos></ver_pedidos>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
