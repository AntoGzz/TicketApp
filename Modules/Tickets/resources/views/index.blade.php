@extends('tickets::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('tickets.name') !!}</p>
@endsection
