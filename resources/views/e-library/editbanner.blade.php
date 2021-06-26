@extends('layouts.app')

@section('content')
<div class="container-fluid" style="background-color: lightblue;margin-top: 75px; margin-bottom: 50px">
  <h2 style="margin-top: 25px;padding-left: 550px">Edit Homepage Banner</h2>
  <form method="post" style="margin-top: 25px" action="/bannerupdate/{{$banner->id}}/update">
                @csrf
              <div class="form-group">
                <label for="formGroupExampleInput">Link_banner1</label>
                <input type="text" class="form-control" name="link_banner1" id="link_banner1" value="{{$banner->link_banner1}}" >
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput2">Link_banner2</label>
                <input type="text" class="form-control" name="link_banner2" id="link_banner2" value="{{$banner->link_banner2}}" >
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput2">Link_banner3</label>
                <input type="text" class="form-control" name="link_banner3" id="link_banner3" value="{{$banner->link_banner3}}" >
              </div>
              <button type="submit" class="btn btn-warning" style="margin-left: 675px ">Update</button>
    </form>

</div>

@endsection