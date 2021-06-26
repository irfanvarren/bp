     <li class="list-group-item list-group-item-action text-center p-3"><h5 class="m-0">Exhibitors</h5></li>
     @foreach($exhibitors as $exhibitor)
     <li class="list-group-item list-group-item-action" onclick="toggle_exhibitors_detail(event,'{{$exhibitor->id}}')" >
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
      </li>
      @endforeach

      <li class="list-group-item list-group-item-action active" onclick="$('#exhibitors-panel').toggle()"><span> <i class="fa fa-plus mr-2"></i> Tambah Exhibitors</span></li>