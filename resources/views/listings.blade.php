@extends('layout')
@section('content')
@include('partials._hero')
@include('partials._search')

<h1>{{$heading}}</h1>

@php
    // $test = 'Ahmed Elselly';    
@endphp
@unless (count($listings) == 0)
    @foreach($listings as $listing) 
    {{-- <h1>ID: {{$listing['id']}} {{$test}}</h1> --}}
    {{-- <a href='/listing/{{$listing['id']}}'>ID: {{$listing['id']}}</a> --}}
    <x-listing-card :listing="$listing" />
    @endforeach    

    @else
        <h2>No items were found</h2>
@endunless


@endsection