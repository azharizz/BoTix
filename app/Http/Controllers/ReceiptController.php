<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Movie;
use App\Receipt;
use App\User;
use Illuminate\Support\Facades\Auth;

class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $id = Auth::user()->id;
        $receipt = Receipt::where("idReceipt", $id)->paginate(10);
        $user =  User::where('id', $id)->first();
        $data = Cart::where("user_id", $id)->paginate(10);
        $movie = Movie::paginate(4);

        //membuat variabel tampil yang diisi dengan data
        $tampil['data'] = $data;
        $tampil['movie'] = $movie;
        $tampil['user']=$user;
        $tampil['receipt']=$receipt;
        //tampilkan resources/views/kelas/index.blade.php beserta variabel tampil
        return view("receipt.index", $tampil);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = Cart::where("idCart",$id)->first();
        $movie = Movie::paginate(4);

        $tampil['data'] = $data;
        $tampil['movie'] = $movie;

        return view("receipt.detail", $tampil);
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
        //
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
}
