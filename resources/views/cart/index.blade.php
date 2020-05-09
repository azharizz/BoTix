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
</div>
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

                        <form class="form-horizontal" action="{{ route('cart.store') }}" method="post">
                            {{ csrf_field() }}
                            {{-- {{ method_field('PUT') }} --}}
                            <input type="hidden" id="custId" name="user_id" value="{{$item->user_id}}">
                            <input type="hidden" id="custId" name="movie_id" value="{{$item->movie_id}}">
                            <input type="hidden" id="custId" name="cart_id" value="{{$item->idCart}}">
                            <input type="hidden" id="custId" name="payed" value=1>
                            <input type="submit" class="btn btn-success btn-md" style="font-size:24px;" name="Pay" value="Pay Ticket">
                            {{-- <a href="{{ route('cart.destroy', ['cart' => $item->idCart]) }}" method="post"  class="btn btn-primary" style="float: right" >Delete Booking Ticket</a> --}}
                        </form>

                        @if ($item->payed==0)
                        <a class="btn btn-primary" onclick="hapus('{{ $item->idCart }}')" href="#">
                            <i class="fas fa-trash"></i>
                        </a>


                        {{-- <form class="form-horizontal" action="{{ route('cart.delete') }}" >
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" id="custId" name="cart_id" value="{{$item->idCart}}">
                            <input type="submit" class="btn btn-success btn-md" name="add" value="Add">
                        </form> --}}
                        {{-- <a href="{{ route('cart.destroy', ['cart' => $item->idCart]) }}"  class="btn btn-danger" style="float: right">Delete Booking Ticket</a> --}}
                        
                        @else
                        @endif
                        {{-- <a href="{{ route('cart.destroy', ['cart' => $item->idCart]) }}"  class="btn btn-danger" style="float: right">Delete Booking Ticket</a> --}}

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
@section('plugins.Sweetalert2', true)
@section('plugins.Pace', true)
@section('js')
@if (session('success'))
<script type="text/javascript">
    Swal.fire(
        'Sukses!',
        '{{ session('success') }}',
        'success'
    )
</script>
@endif
@section('js')
<script type="text/javascript">
    function hapus(id) {
        Swal.fire({
            title: 'Konfirmasi',
            text: "Yakin menghapus data ini?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#dd3333',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "/cart/" + id,
                    type: 'DELETE',
                    data: {
                        '_token': $('meta[name=csrf-token]').attr("content"),
                    },
                    success: function(result) {
                        Swal.fire(
                            'Sukses!',
                            'Berhasil Hapus',
                            'success'
                        );
                        location.reload();
                    }
                });
            }
        })
    }
</script>

@stop