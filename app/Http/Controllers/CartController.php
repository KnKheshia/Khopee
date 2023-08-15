<?php

namespace App\Http\Controllers;

use DB;
use App\Sale;
use App\Order;
use App\Stuff;
use Cookie;
use Closure;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facedes\Storage;

class CartController extends Controller
{
    private function getCarts(){
        $carts = json_decode(request()->cookie('http://localhost/khopee/public/'), true);
        $carts = $carts != '' ? $carts:[];
        return $carts;
    }
    public function addToCart(Request $request)
    {
        $this->validate($request, [
            'stuff_id' => 'required|exists:stuffs,id',
            'qty'      => 'required|integer'
        ]);

        $carts = $this->getCarts();
        if($carts && array_key_exists ($request->stuff_id, $carts)){
            $carts[$request->stuff_id]['qty'] += $request->qty;
        } else{
            $stuff = Stuff::find($request->stuff_id);
            $carts[$request->stuff_id] = [
                'qty'       => $request->qty,
                'stuff_id'  => $stuff->id,
                'name'      => $stuff->name,
                'price'     => $stuff->price,
            ];
        }
        $cookie = cookie('http://localhost/khopee/public/', json_encode($carts), 2880);
        return redirect()->back()->with(['succsess' => 'Your product success add to cart'])->cookie($cookie);
    }
    public function listCart()
    {
        $carts = $this->getCarts();
        $subtotal = collect($carts)->sum(function($q){
                        return $q['qty'] * $q['price'];
                    });
        return view('content.carts.list',compact('carts', 'subtotal'));
    }
    public function updatecart(Request $request)
    {
        $carts = $this->getCarts();
        foreach($request->stuff_id as $key => $row){
            if($request->qty[$key] == 0){
                unset($carts[$row]);
            }else{
                $carts[$row]['qty'] = $request->qty[$key];
            }
        }
        $cookie = cookie('http://localhost/khopee/public/', json_encode($carts), 2880);
        return redirect()->back()->cookie($cookie);
    }
    public function checkout()
    {
        $carts = $this->getCarts();
        $subtotal = collect($carts)->sum(function($q){
                        return $q['qty'] * $q['price'];
                    });
        return view('content.carts.checkout', compact('carts', 'subtotal'));
    }
    public function processPayment(Request $request)
    {
        $this->validate($request,[
            'name'      => 'required|string|max:100',
            'address'   => 'required|string',
        ]);
        DB::beginTransaction();
        try {
            $affiliate = json_encode(request()->cookie('http://localhost/khopee/public/'),true);
            $explodeAffiliate = explode('-', $affiliate);

            $carts = $this->getCarts();
            $subtotal = collect($carts)->sum(function($q){
                return $q['qty'] *  $q['price'];
            });
            $order = Sale::create([
                'invoice'   => Str::random(4) . '-' . time(),
                'name'      => $request->name,
                'address'   => $request->address,
                'subtotal'  => $subtotal,
            ]);
            foreach($carts as $cart){
                $product = Stuff::find($cart['stuff_id'])->decrement('quantity', $cart['qty']);
                Order::create([
                    'sale_id'   => $order->id,
                    'stuff_id'  => $cart['stuff_id'],
                    'price'     => $cart['price'],
                    'qty'       => $cart['qty'],
                ]);
            }
            DB::commit();

            $carts = [];
            $cookie = cookie('http://localhost/khopee/public/', json_encode($carts),2880);
            Cookie::queue(Cookie::forget('http://localhost/khopee/public/'));

            return redirect(route('create.invoice', $order->invoice))->cookie($cookie);
        }catch(\Exception $e){
            DB::rollback();
            return redirect()->back();
        }
    }
    public function createInvoice($invoice)
    {
        $sale = Sale::where('invoice',$invoice)->first();

        return view('content.carts.invoice', compact('sale'));
    }
}