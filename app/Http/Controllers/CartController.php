<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Movie;
use App\Receipt;
use App\User;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
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
        $user =  User::where('id', $id)->first();
        $data = Cart::where("user_id", $id)->paginate(10);
        $movie = Movie::paginate(4);

        //membuat variabel tampil yang diisi dengan data
        $tampil['data'] = $data;
        $tampil['movie'] = $movie;
        $tampil['user']=$user;
        //tampilkan resources/views/kelas/index.blade.php beserta variabel tampil
        return view("cart.index", $tampil);
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
        
        $this->validate($request,[
            'user_id' => 'required',
            'movie_id' => 'required',
            'cart_id' => 'required',
            'payed' => 'required'
        ]);

        $idUser = Auth::user()->id;
        $user =  User::findOrFail($idUser);
        $cart =  Cart::findOrFail($request->cart_id);
        // $cart = Cart::where("idCart", $request->cart_id)->first();
        $movie = Movie::where("idMovie", $request->movie_id)->first();
        // $data = User::findOrFail($id);
        $cart->payed =1;
        $cart->save();
        $user->balance -= $cart->totalPrice;
        $user->save();

        $tampil['data'] = $cart;
        $tampil['movie'] = $movie;
        $tampil['user']=$user;


        $data = Receipt::create($request->all());
        return redirect()->route("cart.index")->with(
            "success",
            "Data berhasil disimpan."
        );
        // return view("balance.index",$tampil);


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
        
        $idUser = Auth::user()->id;
        $user =  User::where('id', $idUser)->first();
        $data = Cart::where("idCart", $id)->first();
        $movie = Movie::where("idMovie", $data->movie_id)->first();
        $user->balance -= $data->totalPrice;
        $data->save();

        $this->validate($request,[
            'user_id' => $idUser,
            'movie_id' => $data->movie_id,
            'cart_id' => $id,
            'payed' => 1,
        ]);
        
        // $request->merge(['user_id' => $idUser]);
        // $request->merge(['movie_id' => $data->movie_id]);
        // $request->merge(['cart_id' => $id]);
        // $request->merge(['payed' => 1]);

        $tampil['data'] = $data;
        $tampil['movie'] = $movie;
        $tampil['user']=$user;


        $data = Receipt::create($request->all());
        return view("balance.index",$tampil);
        // return redirect()->route("home.index")->with(
        //     "success",
        //     "Data berhasil disimpan."
        // );
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
