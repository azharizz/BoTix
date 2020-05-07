@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1 class="m-0 text-dark">Ticket</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card mb-3 center">
            <p style="text-align:center">
                <img src="{{ $movie->image }}" class="card-img-top" alt="..." style="max-height: 480px; max-width: 240px;">
            </p>
            <div class="card-body" style="text-align: center;">
                <h5 class="card-title-center">{{ $movie->nameMovie }}</h5>
                <p class="card-text">{{ $movie->description }}</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
            <div>
                <form class="form-horizontal" action="{{ route('ticket.update',$movie->idMovie) }}" method="post">
                    {{ csrf_field() }}
                        {{ method_field('PUT') }}
                    <div class="form-row">
                        <div class="form-group col-md-6" style="text-align: center;">
                            <label for="studio">Studio</label>
                            <input type="inputStudio" readonly class="form-control-plaintext" style="text-align: center;font-size:48px;color:red" name="studio" value="{{ $movie->studio }}">
                        </div>
                        <div class="form-group col-md-6" style="text-align: center;">
                            <label for="price">Price</label>
                            <input type="number" readonly class="form-control-plaintext" style="text-align: center;font-size:48px;color:red" name="totalPrice" value={{ $movie->price }}>
                        </div>
                    </div>
                    <div class="px-5 form-group" style="text-align: center;">
                        <label for="exampleInputEmail1">Total ticket to buy</label>
                        <input type="number" class="form-control" id="inputTicket" name="totalTicket" >
                      </div>
                    <div class="px-5" style="text-align: center;">
                        <div class="form-group">
                            <label for="inputDay">Select Date To Watch</label>
                            <select name="dateBooking" class="form-control">
                                <?php
                                    $dateArr = array();
                                    $currentDateTime = date('m-d-Y ');
                                    $dateArr[0] = str_replace('-', '/', $currentDateTime);
                                    
                                    $d=1;
                                    for ($i=1; $i < 7 ; $i++) { 
                                        $dateArr[$i] = date('d-m-Y', strtotime("+1 day", strtotime($dateArr[$i-1])));
                                    }
                                    $nowDate =date('d-m-Y', strtotime($dateArr[0]));
                                    
                                ?>
                                <option>Date - Month - Year</option>
                                <option><?php echo $nowDate; ?></option>
                                <?php
                                for ($i=1; $i < 7 ; $i++) { 
                                    echo "<option> $dateArr[$i]</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <label for="showTime">Show Time</label>
                        <div class="input-group-btn col-m-4" data-toggle="buttons">
                            <label class="btn btn-primary active">
                                <input type="radio" name="timeBooking" id="option1" value="10.00 - 12.00" checked>10.00 - 12.00
                            </label>
                            <label class="btn btn-primary">
                                <input type="radio" name="timeBooking" id="option2" value="12.50 - 14.50">12.50 - 14.50
                            </label>
                            <label class="btn btn-primary">
                                <input type="radio" name="timeBooking" id="option3" value="15.00 - 17.00">15.00 - 17.00
                            </label>
                        </div>    
                    </div>

                    {{-- <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                Check me out
                            </label>
                        </div>
                    </div> --}}
            </div>
            {{-- <button type="submit" class="btn btn-primary col-m-4">Sign in</button> --}}
            <p style="text-align:center;">
            <input type="submit" class="btn btn-success btn-md" style="font-size:24px;" name="Buy" value="Buy Ticket">
            </p>
            </form>
        </div>
    </div>
</div>
</div>

@stop