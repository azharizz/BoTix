@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Cart</h1>
@stop

@section('content')
<div class="row justify-content-center">
    <div class="card">
        <div class="card-body">
          Money you have : {{$user->balance}}
        </div>
      </div>
    <div class="row justify-content-center">
        
        {{-- @forelse ($receipt as $itemReceipt) --}}
        @forelse ($data as $item)
        @forelse ($movie as $itemMovie)
            {{-- @if (($itemReceipt->cart_id)==($item->idCart)) --}}
                @if (($item->movie_id)==($itemMovie->idMovie) && ($item->payed)==1)
            
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
                            <p class="card-text">Studio : {{ $itemMovie->studio }}</p>
                            <p class="card-text">Date Show : {{ $item->dateBooking }}</p>
                            <p class="card-text">Time Show : {{ $item->timeBooking }}</p>
                            <p class="card-text">Total Ticket : {{ $item->totalTicket }}</p>
                            <p class="card-text">Total Price : {{ $item->totalPrice }}</p>
                            @if ($item->payed==1)
                            <p class="card-text">Status : Payed</p>
                            @else
                            <p class="card-text">Status : Waiting pay</p>
                                
                            @endif
    
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