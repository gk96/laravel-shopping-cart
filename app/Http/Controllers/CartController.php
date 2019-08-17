<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use DB;
use Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($userid)
    {
        if(Auth::user()->type=="member")
        {
        $myitems = Cart::where('userid','=',$userid)->get();
        return view('cart',compact('myitems'));
        }
    }

    public function addtocart(Request $request)
    {
        

        

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
        
        if(Auth::user()->type=="member")
        {
            if(DB::table('carts')->where('product_id',$request->id)->get()->count()==0)
            {
        DB::table('carts')->insert([
            'userid' => $request->userid,
            'img'   =>  $request->img,
            'product_id' => $request->id,
            'product_name' => $request->name,
            'type' => $request->type,
            'description' => $request->desc,
            'price' => $request->price,
            'qty' => $request->qty,
            'subtotal' => $request->price*$request->qty
                ]);

                $st = DB::table('products')->where('id', $request->id)->first();
                
                $s=$st->stock-$request->qty;
            DB::table('products')
                ->where('id', $request->id) 
                ->update(['stock' => $s]);
    
    
            
                echo '<script>alert("Item Added to Cart")</script>';
            return redirect('/menu');
            
        }
        else
        {

            $ct = DB::table('carts')->where('product_id', $request->id)->first();

            $c=$ct->qty + $request->qty;
            
            
            DB::table('carts')
            ->where('product_id', $request->id) 
            ->update(['qty' => $c]);
            echo '<script>alert("Item already added")</script>'; 
        }
        }   
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        if(Auth::user()->type=="member")
        {
        $id=$_POST['id'];

        $st = DB::table('carts')->where('id', $id)->first();
        $pd = DB::table('products')->where('id', $st->product_id)->first();
        $s=$pd->stock+$st->qty;
        DB::table('products')
            ->where('id', $pd->id) 
            ->update(['stock' => $s]);

        Cart::where('id','=',$id)->delete();
        $uid=$_POST['uid'];
        echo "<script>alert('Item Deleted from Cart');
        location='mycart/$uid';
        </script>";
        }
        

    }
}
