@extends('items.layout')

@section('content')
<div class="row">
 <div class="col-lg-12 margin-tb">
 <div class="pull-left">
 <h2>Pridėkit naują produktą</h2>
 </div>
 <div class="pull-right">
 <a class="btn btn-primary" href="{{ route('items.index') }}">
Atgal</a>
 </div>
 </div>
</div>

@if ($errors->any())
 <div class="alert alert-danger">
 <strong>KLAIDA!</strong> Blogai įvesti duomenys.<br><br>
 <ul>
 @foreach ($errors->all() as $error)
 <li>{{ $error }}</li>
 @endforeach
 </ul>
 </div>
@endif

<form action="{{ route('items.store') }}" method="POST">
 @csrf

 <div class="row">
 <div class="col-xs-12 col-sm-12 col-md-12">
 <div class="form-group">
 <strong>Pavadinimas:</strong>
 <input type="text" name="item_name" class="form-control"
placeholder="item_name">
 </div>
 </div>
 <div class="col-xs-12 col-sm-12 col-md-12">
 <div class="form-group">
 <strong>Kaina</strong>
 <textarea class="form-control" style="height:150px"
name="price" placeholder="price"></textarea>
 </div>
 </div>
 <div class="row">
 <div class="col-xs-12 col-sm-12 col-md-12">
 </div>
 </div>

 <div class="col-xs-12 col-sm-12 col-md-12 text-center">
 <button type="submit" class="btn btn-primary">Patvirtinti</button>
 </div>
 </div>

</form>
@endsection