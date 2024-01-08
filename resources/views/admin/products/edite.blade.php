@extends('admin.style.index')


@section('content')

<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Basic form elements</h4>
                    <p class="card-description"> Basic form elements </p>
                    <form class="forms-sample" action="{{route('update/product',$data_pro->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                      <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        @error('name')<div style="color:red;">{{$message}}</div>@enderror
                        <input type="text" class="form-control" name="name" value="{{$data_pro->name}}" id="exampleInputName1" placeholder="Name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Price</label>
                        @error('price')<div style="color:red;">{{$message}}</div>@enderror
                        <input type="text" class="form-control" name="price" id="exampleInputEmail3" placeholder="Price" value="{{$data_pro->price}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Sale</label>
                        @error('sale')<div style="color:red;">{{$message}}</div>@enderror
                        <input type="text" class="form-control" name="sale"  id="exampleInputPassword4" placeholder="Sale" value="{{$data_pro->sale}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Count</label>
                        @error('count')<div style="color:red;">{{$message}}</div>@enderror
                        <input type="text" class="form-control" name="count" id="exampleInputPassword4" placeholder="Count" value="{{$data_pro->count}}">
                      </div>
                      <div class="form-group">
                          <label>File upload</label>
                        @error('img')<div style="color:red;">{{$message}}</div>@enderror
                        @error('img.*')<div style="color:red;">{{$message}}</div>@enderror
                          <input type="file" name="img[]" class="file-upload-default" multiple>
                          <div class="input-group col-xs-12">
                              <input type="text" class="form-control file-upload-info"  placeholder="Upload Image">
                              <span class="input-group-append">
                                  <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="exampleSelectGender">Cat</label>
                        @error('cat')<div style="color:red;">{{$message}}</div>@enderror
                          <select class="form-control" name="cat" id="exampleSelectGender">
                            @forelse($cat as $cat)
                            <option value="{{$cat->name}}" @selected($data_pro->cat==$cat->name)>{{$cat->name}}</option>
                            @empty
                            @endforelse
                          </select>
                        </div>
                        
                      <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>



@endsection