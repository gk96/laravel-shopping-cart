<?php

namespace App\Http\Controllers;

use App\Product;
use DB;
use Auth;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if(Auth::user()->type=="member")
        {
        $id=$_GET['pid'];
        $data = DB::table('products')->where('id', $id)->get();
        return view('product', compact('data'));
        }
    }

    public function showone()
    {
        $id=$_POST['id'];
        $data = DB::table('products')->where('id', $id)->get();
        return view('adminedit', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        $name = $request->name;
        $price= $request->price;
        $stock= $request->stock;
        $code= $request->code;
        $desc= $request->desc;
        $type= $request->type;
        $image= $request->img;
        $i1='images/';
        $i2=$i1."".$image;

        $data=array("name"=>$name,"code"=>$code,"desc"=>$desc,"type"=>$type,"price"=>$price,"stock"=>$stock,"img"=>$i2);
        DB::table('products')->insert($data);
        echo "Product Added successfully.<br/>";
        return view('adminmiddleware');
    }

    public function searchprod(Request $request) 
    { $s=$request->input('search1'); 
        //return $s; 
        //echo "".$s; 
        $data=Product::where('name','LIKE','%'.$s.'%')->get(); 
        //echo "".$data2;
         if(count($data)==0) 
         { 
             return redirect()->back()->with('alert', 'product not available ');
             }
          else 
          { return view('menu',compact('data')); 
            // return view('search',compact('result','r')); 
          } 
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
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $data = DB::select('select * from products');

        return view('adminmiddleware', compact('data'));
    }

    public function showorders(Product $product)
    {
        $data1 = DB::select('select * from orders');
        $data2 = DB::select('select * from orderdetails');
        $data3 = DB::table('orders')
            ->join('orderdetails', 'orders.id', '=', 'orderdetails.orderid')
            ->select('orders.cname','orders.email','orders.addr','orders.status' ,'orderdetails.*')
            ->get();
        return view('orders', compact('data3'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        if(Auth::user()->type=="admin")
        {
            

            if($request->imgf=="")
           { $i1='images/';
    
        DB::table('products')
        ->where('id', $request->id)
        ->update([
        'name' => $request->name,
        'type' => $request->type,
        'code' => $request->code,
        'img' => $request->imgt,
        'desc' => $request->desc,
        'price' => $request->price,
        'stock' => $request->stock,
        ]);
        echo "<script>
        alert('Product Details Updated!!');
        location='home';
        </script>";
           }
           else
           {
            $i1='images/';
    
            DB::table('products')
            ->where('id', $request->id)
            ->update([
            'name' => $request->name,
            'type' => $request->type,
            'code' => $request->code,
            'img' => $i1."".$request->imgf,
            'desc' => $request->desc,
            'price' => $request->price,
            'stock' => $request->stock,
            ]);
            echo "<script>
            alert('Product Details Updated!!');
            location='home';
            </script>";
           }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        
        DB::table('products')->where('id', $_POST['id'])->delete();
        echo "<script>alert('Item has been deleted');
        location='/';
        </script>";
        
    }
}
