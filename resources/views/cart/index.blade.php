@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Cart</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @forelse ($data as $item)
        @forelse ($movie as $itemMovie)
            @if (($item->movie_id)==($itemMovie->idMovie))
        
                <div class="card mb-3" style="max-width: 720px;">
                    <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="{{ $itemMovie->image }}" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                        <h5 class="card-title" style="font-size:24px">{{ $itemMovie->nameMovie }}</h5>
                        <br>
                        <br>  
                        <p class="card-text">{{ $itemMovie->description }}</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                    </div>
                </div>
            @endif

          @empty
          Tidak Ada Data Ditemukan
            
          @endforelse

        @empty
        Tidak Ada Data Ditemukan
        @endforelse

    </div>
</div>

@stop