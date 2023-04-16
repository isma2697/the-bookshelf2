@extends('layouts.myapp')
@section('content')
    <x-mycomp.floating-box/>
    <x-mycomp.book-info :book="$book"/>
    <x-mycomp.comments :comments="$comments" :book="$book"/>
    <x-mycomp.section-books :books="$books"/>  
@endsection
    