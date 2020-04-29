@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Ticket</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card mb-3" style="max-width: 720px;">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="https://image.tmdb.org/t/p/w600_and_h900_bestv2/7WsyChQLEftFiDOVTGkv3hFpyyt.jpg" class="card-img" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title" style="font-size:24px">Avengers: Infinity War</h5>
                  <br>
                  <br>  
                  <p class="card-text">As the Avengers and their allies have continued to protect the world from threats too large for any one hero to handle, a new danger has emerged from the cosmic shadows: Thanos. A despot of intergalactic infamy, his goal is to collect all six Infinity Stones, artifacts of unimaginable power, and use them to inflict his twisted will on all of reality. Everything the Avengers have fought for has led up to this moment - the fate of Earth and existence itself has never been more uncertain.</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  <a href="#"  class="btn btn-primary" style="float: right">Buy Ticket</a>
                </div>
              </div>
            </div>
          </div>
        <div class="card mb-3" style="max-width: 720px;">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="https://image.tmdb.org/t/p/w600_and_h900_bestv2/4q2NNj4S5dG2RLF9CpXsej7yXl.jpg" class="card-img" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title" style="font-size:24px">Spiderman Far From Home</h5>
                  <br>
                  <br>  
                  <p class="card-text">Peter Parker and his friends go on a summer trip to Europe. However, they will hardly be able to rest - Peter will have to agree to help Nick Fury uncover the mystery of creatures that cause natural disasters and destruction throughout the continent.</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  <a href="#"  class="btn btn-primary" style="float: right">Buy Ticket</a>
                </div>
              </div>
            </div>
          </div>
          
    </div>
</div>

@stop
