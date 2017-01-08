@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="page-header">
            <h1>CEP</h1>
        </div>

        {{ Form::label('yourName', 'Nome') }}
        {{ Form::text('yourName', null, ['class'=>'form-control', 'v-model'=>'yourName', 'placeholder'=>'Digite seu nome']) }}
        <hr>

        @verbatim
        <h1>Hello {{ yourName }}</h1>
        @endverbatim

    </div>

    <script>

        var app = new Vue({
            el: '#app',
            data: {
                yourName: 'Gui'
            }
        });

    </script>


@endsection
