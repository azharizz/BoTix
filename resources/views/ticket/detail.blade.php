@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Ticket</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card mb-3 center" style="text-align: center;">
            <p style="text-align:center">
                <img src="{{ $movie->image }}" class="card-img-top" alt="..." style="max-height: 480px; max-width: 240px;">
            </p>
            <div class="card-body">
              <h5 class="card-title-center">{{ $movie->nameMovie }}</h5>
              <p class="card-text">{{ $movie->description }}</p>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div>
</div>

@stop