@extends("admin.style.index")
@section("content")

<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Basic form elements</h4>
                    <p class="card-description"> Basic form elements </p>
                    <form class="forms-sample" action="{{route('dash/update',$data_admin->id)}}" method="post">
                      @csrf
                      <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputName1" value="{{$data_admin->name}}" placeholder="Name">
                        @error("name")<div style="color:red;">{{$message}}</div>@enderror
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail3">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail3" value="{{$data_admin->email}}" placeholder="Email">
                        @error("email")<div style="color:red;">{{$message}}</div>@enderror
                      </div>
                  
                      <div class="form-group">
                        <label for="exampleSelectGender">Gender</label>
                        <select class="form-control" name="gender" id="exampleSelectGender">
                          <option value="1" @selected($data_admin->gender==1)>Male</option>
                          <option value="0" @selected($data_admin->gender==0)>Female</option>
                        </select>
                        @error("gender")<div style="color:red;">{{$message}}</div>@enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">priv</label>
                        <select class="form-control" name="priv" id="exampleSelectGender">
                          @forelse($priv as $priv )
                          <option value="{{$priv->number}}" @selected($data_admin->priv==$priv->number)>{{$priv->name}}</option>
                         
                          @empty

                          @endforelse
                        </select>
                        @error("priv")<div style="color:red;">{{$message}}</div>@enderror

                      </div>
                      <button type="submit" class="btn btn-gradient-primary me-2">Edit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>

@endsection