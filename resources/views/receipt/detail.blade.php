@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1 class="m-0 text-dark">Show Ticket</h1>
@stop

@section('content')

@forelse ($movie as $itemMovie)

@if (($data->movie_id)==($itemMovie->idMovie) && ($data->payed)==1)


<div class="container">
    <div class="row justify-content-center">
        <div class="card mb-3 center">
            <p style="text-align:center">
                <img src="{{ $itemMovie->image }}" class="card-img-top" alt="..." style="max-height: 480px; max-width: 240px;">
            </p>
            <div class="card-body" style="text-align: center;">
                <h5 class="card-title-center">{{ $itemMovie->nameMovie }}</h5>
                <p class="card-text">{{ $itemMovie->description }}</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
            <div>
                <form class="form-horizontal" action="" method="post">
                    {{ csrf_field() }}
                        {{ method_field('PUT') }}
                    <div class="form-row">
                        <div class="form-group col-md-6" style="text-align: center;">
                            <label for="studio">Studio</label>
                            <input type="inputStudio" readonly class="form-control-plaintext" style="text-align: center;font-size:48px;color:red" name="studio" value="{{ $itemMovie->studio }}">
                        </div>
                        <div class="form-group col-md-6" style="text-align: center;">
                            <label for="price">Price</label>
                            <input type="number" readonly class="form-control-plaintext" style="text-align: center;font-size:48px;color:red" name="totalPrice" value={{ $data->totalPrice }}>
                        </div>
                    </div>
                    <div class="px-5 form-group" style="text-align: center;">
                        <label for="price">Total Ticket</label>
                        <input type="number" readonly class="form-control-plaintext" style="text-align: center;font-size:48px;color:red" name="totalTicket" value={{ $data->totalTicket }}>
                    </div>
                    {{-- <div class="px-5 form-group" style="text-align: center;">
                        <label for="exampleInputEmail1">Total ticket to buy</label>
                        <input type="number" class="form-control" id="inputTicket" name="totalTicket" >
                      </div> --}}
                      <div class="px-5 form-group" style="text-align: center;">
                        <label for="price">Date Watch</label>
                        <input type="text" readonly class="form-control-plaintext" style="text-align: center;font-size:48px;color:red" name="totalTicket" value={{ $data->dateBooking }}>
                    </div>
                    <div class="px-5 form-group" style="text-align: center;">
                        <label for="price">Show Time</label>
                        <input type="text" readonly class="form-control-plaintext" style="text-align: center;font-size:48px;color:red" name="totalTicket" value={{ $data->timeBooking }}>
                    </div>      
            </div>
            </form>
        </div>
    </div>
</div>
</div>
@endif

@empty
Tidak Ada Data Ditemukan 
@endforelse


@stop