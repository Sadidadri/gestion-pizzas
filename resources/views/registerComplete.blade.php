@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registro con éxito') }}</div>

                <div class="card-body">
                    <registroCompletado></registroCompletado>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
