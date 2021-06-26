@foreach($exhibitors as $exhibitor)
<div class="list-group-item list-group-item-action" onclick="toggle_exhibitors_detail(event,'{{$exhibitor->id}}')" >
  <div class="col-lg-12">
    <div class="row">
      <div class="d-flex" style="flex:1;overflow: hidden;text-overflow: ellipsis;">{{$exhibitor->name}}</div>  
      <div class="d-flex exhibitors-nav" style="width:80px;">
        <button class="exhibitors-nav btn btn-link btn-danger float-right p-0 my-0 mx-1" onclick="delete_exhibitor('{{$exhibitor->id}}')" style="line-height: 25px;padding:0 12px;"><i class="material-icons exhibitors-nav">delete</i></button>
        <button class="exhibitors-nav btn btn-link btn-primary float-right p-0 my-0 mx-1" onclick="edit_exhibitor('{{$exhibitor->id}}','{{$exhibitor->school_id}}','{{$exhibitor->country_id}}','{{$exhibitor->name}}','{{addslashes($exhibitor->about)}}','{{$exhibitor->logo}}','{{$exhibitor->booth}}','{{$exhibitor->course}}')" style="line-height: 25px;padding:0 12px;">
          <i class="material-icons exhibitors-nav">edit</i></button> 
          <i class="fa fa-caret-right float-right"></i>
        </div>
      </div>
    </div>
  </div>
  @endforeach
  ###{!!$lobby != "" ? $lobby : ""!!}