@extends('orders.layout')

@section('content')
<div class="row">
 <div class="col-lg-12 margin-tb">
 <div class="pull-left">
 <h2>Add New Order</h2>
 </div>
 <div class="pull-right">
 <a class="btn btn-primary" href="{{ route('orders.index') }}">
Back</a>
 </div>
 </div>
</div>

@if ($errors->any())
 <div class="alert alert-danger">
 <strong>Whoops!</strong> There were some problems with your
input.<br><br>
 <ul>
 @foreach ($errors->all() as $error)
 <li>{{ $error }}</li>
 @endforeach
 </ul>
 </div>
@endif

<form action="{{ route('orders.store') }}" method="POST">
 @csrf

 <label for="user_id">Vartotojai</label>
 <select name="user_id">


 <option value="0">Rodyti viską</option>
 @foreach ($users as $user)
 <option value="{{$user->id}}">{{ $user->id }}{{ $user->name }} </option>
 @endforeach

 </select>

 <label for="item_id">Produktai</label>
 <select name="item_id">

 <option value="0">Rodyti viską</option>
 @foreach ($items as $item)
 <option value="{{$item->id}}">{{ $item->id }}{{ $item->item_name }}{{ $item->price }}</option>
 @endforeach
 </select>
 <div class="col-xs-12 col-sm-12 col-md-12">
 <div class="form-group">
 <strong>Kiekis:</strong>
 <textarea class="form-control" style="height:50px"
name="quantity" placeholder="quantity"></textarea>
 </div>
 </div>
 <div class="col-xs-12 col-sm-12 col-md-12 text-center">
 <button type="submit" class="btn btn-primary">Submit</button>
 </div>
 </div>
 </form>
@endsection