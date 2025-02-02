@extends('items.layout')

@section('content')
 <div class="row">
 <div class="col-lg-12 margin-tb">
 <div class="pull-left">
 <h2>Edit Item</h2>
 </div>
 <div class="pull-right">
 <a class="btn btn-primary" href="{{ route('items.index') }}">
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

 <form action="{{ route('items.update',$item->id) }}" method="POST">
 @csrf
 @method('PUT')

 <div class="row">
 <div class="col-xs-12 col-sm-12 col-md-12">
 <div class="form-group">
 <strong>Name:</strong>
<input type="text" name="item_name" value="{{ $item->item_name }}"
class="form-control" placeholder="id">
 </div>
 </div>
 <div class="col-xs-12 col-sm-12 col-md-12">
 <div class="form-group">
 <strong>Price:</strong>
<textarea class="form-control" style="height:150px"
name="price" placeholder="price">{{ $item->price }}</textarea>
 </div>
 </div>

 <div class="col-xs-12 col-sm-12 col-md-12 text-center">
 <button type="submit" class="btn btn-primary">Submit</button>
 </div>
 </div>

 </form>
@endsection