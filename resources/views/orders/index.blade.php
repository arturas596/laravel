@extends('orders.layout')
@section('content')
 <div class="row">
 <div class="col-lg-12 margin-tb">
 <div class="pull-left">
 <h2>Laravel 5.7 CRUD Example from scratch </h2>
 </div>
 <div class="pull-right">
 <a class="btn btn-success" href="{{ route('orders.create')
}}"> Create New Order</a>
 </div>
 </div>
 </div>
 @if ($message = Session::get('success'))
 <div class="alert alert-success">
 <p>{{ $message }}</p>
 </div>
 
 @endif

 <table class="table table-bordered">
 <tr>
 <th>No</th>
 <th>item_id</th>
 <th>user_id</th>
 <th>item name</th>
 <th>user name</th>
 <th>Quantity</th>

 <th width="280px">Action</th>
 </tr>

 @foreach ($orders1 as $order)
 <tr>
 <td>{{ ++$i }}</td>
 <td>{{ $order->item_id }}</td>
 <td>{{ $order->user_id }}</td>
 <td>{{ $order->item_name }}</td>
 <td>{{ $order->name }}</td>
 <td>{{ $order->quantity }}</td>
<td>

 <form action="{{ route('orders.destroy',$order->id) }}"
method="POST">

<a class="btn btn-info" href="{{
route('orders.show',$order->id) }}">Show</a>

<a class="btn btn-primary" href="{{
route('orders.edit',$order->id) }}">Edit</a>

<a class="btn btn-primary" href="{{ route('saskaita',$order->id) }}">Saskaita</a>
 @csrf
@method('DELETE')
 <button type="submit" class="btn btn-danger">Delete</button>
 </form>

 </td>
 </tr>

 @endforeach
 



 

@endsection