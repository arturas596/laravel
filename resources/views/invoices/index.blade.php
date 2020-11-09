@extends('items.layout')
@section('content')
 <div class="row">
 <div class="col-lg-12 margin-tb">
 <div class="pull-left">
 <h2>Pirmas šablonas</h2>
 </div>
 <div class="pull-right">
 <a class="btn btn-success" href="{{ route('items.create')
}}"> Sukurti naują įrašą</a>
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
 <th>Nr.</th>
 <th>Pavadinimas</th>
 <th>Kaina</th>
 <th width="380px">Veiksmai</th>
 </tr>


@foreach ($items as $item)
 <tr>
 <td>{{ ++$i }}</td>
 <td>{{ $item->item_name }}</td>
 <td>{{ $item->price }}</td>
 <td>
 <form action="{{ route('items.destroy',$item->id) }}"
method="POST">

 <a class="btn btn-info" href="{{
route('items.show',$item->id) }}">Rodyti</a>

 <a class="btn btn-primary" href="{{
route('items.edit',$item->id) }}">Redaguoti</a>

@csrf
@method('DELETE')

 <button type="submit" class="btn btn-danger">Trinti</button>
 </form>
 </td>
 </tr>
 @endforeach
 </table>
 {!! $items->links() !!}
@endsection

