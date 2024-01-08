@extends("admin.style.index")

@section("content")

<a href="{{route('dash/add')}}" class="btn btn-gradient-primary btn-fw">ADD</a>

<div class="col-lg-12 stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Table / Users</h4>
                    <p class="card-description"> Add class <code>.table-{color}</code>
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                         {{Session::get('success')}}</div>
                         @elseif(Session::has('error'))
                         <div class="alert alert-danger">
                          {{Session::get('error')}}</div>
                    @endif
                    </p>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th> id </th>
                          <th> name </th>
                          <th> email </th>
                          <th> gender </th>
                          <th> priv </th>
                          <th> controller </th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse( $admin as $admin )

                        <tr class="table-info">
                          <td>{{$id++}}</td>
                          <td>{{$admin->name}}</td>
                          <td>{{$admin->email}}</td>
                          <td>{{$admin->gender==0?"female":"male"}}</td>
                          <td>
                            {{$admin->priv==300?"owner":""}}
                            {{$admin->priv==200?"admin":""}}
                            {{$admin->priv==100?"supervisor":""}}
                          </td>
                          <td>
                       @if($admin->priv==100 || $priv_login==300 || $priv_login==200 && $admin->id==$id_login )
                            <form action="{{route('dash/edit',$admin->id)}}" method="post">
                              @csrf
                              <input type="submit" class="btn btn-info" value="edit">
    
                            </form>

                            <form action="{{route('dash/delete',$admin->id)}}" method="post">
                              @csrf
                            <input type="submit" class="btn btn-danger" value="delete">
                            </form>
                            @endif
                          </td>
                        </tr>
                        @empty
                        @endforelse

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
@endsection

