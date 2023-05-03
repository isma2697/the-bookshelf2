@extends('layouts.myapp')

@section('content')

<div class="container container-user">
    <h1>Mis libros</h1>
    <hr>
    <livewire:book-likes-component :section="$section"/>
</div>
@endsection
