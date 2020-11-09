@extends('orders.layout')
@section('content')
 @if ($message = Session::get('success'))
 <div class="alert alert-success">
 <a class="btn btn-primary" href="{{ route('saskaita',$order->id) }}">Saskaita</a>
 <p>{{ $message }}</p>
 </div>
 @endif
 <table class="table table-bordered">
 <tr>
 <th>id</th>
 <th>item id</th>
 <th>user id</th>
 <th>User name</th>
 <th>Item name</th>
 <th width="280px">Price</th>
 <th width="280px">quantity</th>
 <th>Paid amount</th>
 </tr>
 @foreach ($invoices2 as $invoice)
 <tr>
 <td>{{ $invoice->id }}</td>
 <td>{{ $invoice->item_id }}</td>
 <td>{{ $invoice->user_id }}</td>
 <td>{{ $invoice->name }}</td>
 <td>{{ $invoice->item_name }}</td>
 <td>{{ $invoice->price }}</td>
 <td>{{ $invoice->quantity}}</td>
 <td>{{ $invoice->price*$invoice->quantity }}</td>
 </tr>
 @endforeach
 </table>