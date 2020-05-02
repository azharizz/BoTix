@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Ticket</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
      {{-- <@php
          $id={{ $data->id }};
          echo $id
      @endphp --}}
      <?php $no=1;?>
      @forelse ($data as $item)
      <div class="card mb-3" style="max-width: 720px;">
        <div class="row no-gutters">
          <div class="col-md-4">
            <img src="{{ $item->image }}" class="card-img" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title" style="font-size:24px">{{ $item->nameMovie }}</h5>
              <br>
              <br>  
              <p class="card-text">{{ $item->description }}</p>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            <a href="{{ route('ticket.show', ['ticket' => $item->idMovie]) }}"  class="btn btn-primary" style="float: right">Buy Ticket</a>
            </div>
          </div>
        </div>
      </div>
      <?php $no++;?>
      @empty
      Tidak Ada Data Ditemukan
      @endforelse
          
    </div>
</div>

@stop
