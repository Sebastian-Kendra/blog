@extends('layouts.master')

@section('content')

    @include('article', [ 'type' => 'full' ])
    @include('comments.index')

@endsection