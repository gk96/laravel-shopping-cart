<?php

namespace App\Http\Controllers;

use App\Order;
use App\Cart;
use App\Product;
use App\User;
use Auth;
use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userid = auth()->user()->id;
        $myitems = Cart::where('userid','=',$userid)->get();
        $usr = User::where('id','=',$userid)->get();
        return view('/shipping',compact('myitems','usr'));
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
        
        $orderid = DB::table('orders')->insertGetId([
            'custid' => auth()->user()->id,
            'addr' => $request->shippingaddress,
            'cname' => $request->name,
            'email' => $request->email,
            'status' => 'Order Placed',
            ]); 
        $items = Cart::where('userid','=',auth()->user()->id)->get();
        compact('items');

        foreach($items as $item) {
        
        DB::table('orderdetails')->insert([
                'orderid' => $orderid,
                'productid' => $item['product_id'],
                'price' => $item['price'],
                'qty' => $item['qty'],
                'total' => $item['subtotal']
            ]); 
        Cart::where('userid','=',auth()->user()->id)->delete();
        
        $stock = Product::where('id',$item['product_id'])->first(['stock']);
        
        $stock->stock = $stock->stock-$item['qty'];
        

        DB::table('products')
            ->where('id', $item['product_id'])
            ->update(['stock' => $stock->stock]);
        }

        $content = [
    		'title'=> 'Scoop Cafe Order Invoice', 
    		'body'=> 'Your order has been shipped with orderid  .',
    		
    		];
        Mail::to($request->email)->send(new OrderShipped($content));
        echo "<script>
            alert('Order Placed Successfully!!');
            location='home';
        </script>";
        }
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        if(Auth::user()->type=="member")
        {
        $orders = DB::table('orders')
        ->join('orderdetails', 'orders.id', '=', 'orderdetails.orderid')
        ->where('orders.custid','=',auth()->user()->id)
        ->select('orders.id','orders.cname','orders.email', 'orders.addr', 'orders.status','orderdetails.productid','orderdetails.price','orderdetails.qty','orderdetails.total')
        ->get();
        return view("myorders",compact('orders'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
