@extends('layouts.master')

@section('content')
    @include('partials._message')
    <h1>{{ $stall->name }}</h1>
    <div class="img-responsive">Current image<br/><img src="{{asset('images/' . $img[0]['url'])}} " height="100" width="100"/></div>

@endsection