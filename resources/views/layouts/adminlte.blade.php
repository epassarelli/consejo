@extends('adminlte::page')

@section('title', 'Consejo superior')

@section('content_header')

@stop


@section('content')
    {{ $slot }}
@stop



@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
@stop

@section('js')
    @stack('modals')
    @livewireScripts
    {{-- <script>
        console.log('Hi!');
    </script> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('js/datatables/basictable.js') }}"></script>

    <script>
        Livewire.on('alertDelete', id => {
            Swal.fire({
                title: '¿Confirma la eliminación?',
                text: "La acción no podrá ser revertida!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, borrar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('delete', id);
                    //    Swal.fire(
                    //        'Borrado!',
                    //        'Ha sido eliminado con éxito.',
                    //        'success'
                    //    )
                }
            })
        })



        //emit mensaje negativo
        Livewire.on('mensajeNegativo', function(mensaje) {
            Swal.fire({
                title: 'Atención',
                text: mensaje['mensaje'],
                icon: 'warning',
                showCloseButton: true
            })
        });


        //emit mensaje positivo
        Livewire.on('mensajePositivo', function(mensaje) {
            Swal.fire({
                title: 'Excelente!',
                text: mensaje['mensaje'],
                icon: 'success',
                showCloseButton: true
            })
        });
    </script>

@stop
