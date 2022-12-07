@extends('layouts.master')

@section('content')

        <ol class="post-list" >

            @foreach ($posts as $post)
                <li>
                    @include('article', [ 'type' => 'listing' ])
                </li>
            @endforeach

        </ol>

@endsection