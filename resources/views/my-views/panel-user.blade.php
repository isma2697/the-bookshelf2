@extends('layouts.myapp')

@section('content')

<div class="container">
    <h1>Perfil de usuario</h1>
    <h2>{{ Auth::user()->name }}</h2>
    <p>{{ Auth::user()->email }}</p>
    <hr>
    <h3>Mis libros</h3>
    <livewire:book-likes-component  />
</div>
@endsection
