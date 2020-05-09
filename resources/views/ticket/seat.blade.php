@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Select Seat</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
      
      <?php $option=1;?>
      

      <table class="table" style='text-align:center;vertical-align:middle'>
        <tbody>
          <tr>
            <td>Mark</td>
            <td >Otto</td>
            <td class="bg-success"> Booked</td>
          </tr>
          <tr>
            <td>Jacob</td>
            <td>Thornton</td>
            <td class="bg-success">Booked</td>
          </tr>
          <tr>
            <td>Larry</td>
            <td>
              <input class="form-check-input" type="checkbox" name="seat" id="input1" value="1">
              <label class="form-check-label" for="inlineCheckbox1">Input 1</label>
            </td>
            <td class="bg-success">Booked</td>
          </tr>
        </tbody>
      </table>

      <p href=""  class="btn btn-primary" style="float: right">Buy Ticket</p>

    </div>

      
          
    </div>
</div>

@stop