<?php

namespace App\Http\Controllers;

use App\Item;
use App\User;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = DB::table('orders')
            ->where('id', '=', 1)
            ->get();
            $orders = Order::latest() ->paginate(5);

            $orders1 = DB::table('orders')
            ->join('items', 'items.id', '=', 'orders.item_id')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->get();
            $user = DB::table('users')->where('name', 'John')->first();
        
        
            $orders2 = DB::table('orders')
            ->join('items', 'items.id', '=', 'orders.item_id')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->get();

            $invoices1 = DB::table('invoices')
            ->join('items', 'items.id', '=', 'invoices.order_id')
            ->join('users', 'users.id', '=', 'invoices.user_id')
            ->get();




            return view('orders.index',compact('orders','orders1','orders2','invoices1'))
->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Item::latest()->get();
            $users = User::latest()->get();
            return view('orders.create',compact('items','users'));//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required',
            'user_id' => 'required',
            ]);

            Order::create($request->all());

            return redirect()->route('orders.index')
            ->with('success','Order created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //atrinkti visus užsakymus su laukais iš keleto lentelių
 $orders1 = DB::table('orders')
 ->join('items', 'items.id', '=', 'orders.item_id')
 ->join('users', 'users.id', '=', 'orders.user_id')
 // ->join('invoices', 'invoices.order_id', '=', 'orders.id')
 ->get();
 $user = DB::table('users')->where('name', 'John')->first();
//atrinkti rodomo užsakymo visus laukus iš keleto lentelių
 $orders2 = DB::table('orders')
 ->join('items', 'items.id', '=', 'orders.item_id')
 ->join('users', 'users.id', '=', 'orders.user_id')
 ->where('orders.id', $order->id)
 ->get();
 return view('orders.show', compact('order', 'orders1', 'orders2'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('orders.edit',compact('order'));
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
        $request->validate([
            'item_id' => 'required',
            'user_id' => 'required',
            ]);
           
            $order->update($request->all());
           
            return redirect()->route('orders.index')
            ->with('success','Order updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders.index')
        ->with('success','Order deleted successfully');
    }
    public function saskaita(Request $request)
 { // atrenkamos visos sąskaitos

 $invoices1 = DB::table('orders')
 ->join('items', 'items.id', '=', 'orders.item_id')
 ->join('users', 'users.id', '=', 'orders.user_id')
 ->join('invoices', 'invoices.order_id', '=', 'orders.id')
 ->get();
//galima atrinkti tik pasirinkto užsakymo sąskaitą
$id=$request->id;
$invoices2 = DB::table('orders')
->join('items', 'items.id', '=', 'orders.item_id')
->join('users', 'users.id', '=', 'orders.user_id')
->join('invoices', 'invoices.order_id', '=', 'orders.id')
->where('orders.id', $id)
->get();
 return view('orders.saskaita',compact('invoices1','invoices2'))
 ->with('i', (request()->input('page', 1) - 1) * 5);
 }
}
