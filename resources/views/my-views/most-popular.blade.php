@extends('layouts.myapp')
@section('content')
    <x-mycomp.floating-box/>
    <x-mycomp.main-books :books="$books" title="Lo más popular"/>

@endsection
