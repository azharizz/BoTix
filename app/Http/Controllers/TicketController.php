<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use App\Movie;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Movie::paginate(4);
        //membuat variabel tampil yang diisi dengan data
        $tampil['data'] = $data;
        //tampilkan resources/views/kelas/index.blade.php beserta variabel tampil
        return view("ticket.index",$tampil);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Movie::where("idMovie",$id)->first();
        // $data = User::where("id",$id)->get;
        //tampilkan resources/views/kelas/index.blade.php beserta variabel tampil
        // return view("ticket.detail")->with('movie', $movie);
        // $tampil['movie'] = $movie;
        return view("ticket.detail", compact('movie'));
        // return view("balance.index", compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'studio' => 'required',
            'totalPrice' => 'required',
            'dateBooking' => 'required',
            'timeBooking' => 'required',
            'totalTicket' => 'required'
        ]);

        $idUser=Auth::user()->id;
        $tTicket=$request->totalTicket;
        $tPrice=($request->totalPrice)*$tTicket;
        
        $request->merge(['totalPrice' => $tPrice]);
        $request->merge(['user_id' => $idUser]);
        $request->merge(['movie_id' => $id]);
        $request->merge(['payed' => 1]);

        $data = Cart::create($request->all());
        return redirect()->route("cart.index")->with(
            "success",
            "Data berhasil disimpan."
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function buy()
    // {
    //     $data = Movie::paginate(4);
    //     //membuat variabel tampil yang diisi dengan data
    //     $tampil['data'] = $data;
    //     //tampilkan resources/views/kelas/index.blade.php beserta variabel tampil
    //     return view("ticket.detail",$tampil);
    // }


}
