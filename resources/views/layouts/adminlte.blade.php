@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')

@stop


@section('content')

@stop



@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
@stop

@section('js')
    @stack('modals')
    @livewireScripts
    <script>
        console.log('Hi!');
    </script>
@stop
