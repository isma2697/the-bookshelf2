@extends('layouts.myapp')
@section('content')
    <x-mycomp.floating-box/>
        <x-mycomp.main-books :books="$books" :title="$title"/>
@endsection
