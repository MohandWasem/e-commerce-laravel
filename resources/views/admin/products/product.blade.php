@extends("admin.style.index")


@section("content")

<a href="{{route('form/product')}}" class="btn btn-gradient-primary btn-fw">ADD Product</a>
<div class="col-lg-12 stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Table / Products</h4>
                    <p class="card-description"> Add class <code>.table-{color}</code>
                    @if(Session::has('success_delete'))
                    <div class="alert alert-success">
                         {{Session::get('success_delete')}}
                    </div>
                    @endif
                    </p>
<table class="table table-bordered">
 <thead>
  <tr>
   <th> id </th>
   <th> name </th>
   <th> price </th>
   <th> sale </th>
   <th> count </th>
   <th> catorgy </th>
   <th> images </th>
   <th> controller </th>
    </tr>
   </thead>

     <tbody>
      @forelse($all_data as $all_data)
      <tr class="table-info">
          <td>{{$id++}}</td>
          <td>{{$all_data->name}}</td>
          <td>{{$all_data->price}}</td>
          <td>{{$all_data->sale}}</td>
          <td>{{$all_data->count}}</td>
          <td>{{$all_data->cat}}</td>
          <td>
            @forelse($all_data->images as $img )
            <img src="{{asset('storage/images/'.$img->image)}}" alt="">
            @empty
            @endforelse
          </td>
          <td>
            <form action="{{route('edite/product',$all_data->id)}}" method="post">
              @csrf
              <input type="submit" value="edit"class="btn btn-gradient-primary btn-fw">
            </form>

            <form action="{{route('delete/product',$all_data->id)}}" method="post">
              @csrf
              <input type="submit" value="delete" class="btn btn-gradient-danger btn-fw">
            </form>
          </td>
      </tr>
      @empty
      @endforelse
     </tbody>
     </table>

@endsection