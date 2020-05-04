@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
@stop

@section('content')
<div class="container">
    
    {{-- @forelse($data as $item) --}}
    <div class="row justify-content-center">
        {{-- @forelse($data as $item) --}}
        <div class="col-md-8">
            
            <div class="card">
                <div class="card-header" style="background-color: #464e51;">
                    <h1 class="m-0 text-white">Balance</h1>
                </div>

                <div class="card-body">
                    <a class="text-dark" style="font-size:32px">You Have :</a>
                    <br>
                    <a class="text-green" style="font-size:48px;color:green">{{ $user->balance ?? '0' }} cash</a>
                    

                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! --}}
                    <form class="form-horizontal" action="{{ route('balance.update', $user->id) }}" method="post">
                        {{ csrf_field() }}
                        {{-- @csrf_field --}}
                        {{ method_field('PUT') }}
                        {{-- @method('PUT') --}}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="balance" class="col control-label">Enter nominal for add to your balance:</label>
                            <div class="col-sm-10">
                                <input type="numeric" name="balance" class="form-control" value="" >
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="submit" class="btn btn-success btn-md" name="add" value="Add">
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@stop
