@extends('layouts.myapp-admin')
@section('content')
    <x-mycomp.floating-box/>
    <x-mycomp.main-books :books="$books"/>
@endsection
