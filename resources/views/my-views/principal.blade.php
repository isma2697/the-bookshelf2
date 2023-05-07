@extends('layouts.myapp')

@section('content')
    <x-mycomp.floating-box/>
    <x-mycomp.books-carousel :books="$books"/>
    <x-mycomp.main-books :books="$books"  />
   
@endsection