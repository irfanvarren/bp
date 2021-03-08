<table class="table table-bordered">
                <colgroup>
                  <col>
                  <col>
                </colgroup>
                <tr>
                  <td>Name</td>
                  <td>File</td>
                  <td>File Type</td>
                  <td>Action</td>
                </tr>
                @foreach($brochures as $brochure)
                <tr>
                  <td>{{$brochure->name}}</td>
                  <td><a href="{{asset('events/'.$brochure->path.'/preview')}}" target="_blank">{{asset($brochure->path)}}</a>
                  
                  </td>
                  <td>{{$brochure->mime_type}}</td>

                  <td>  
                    <button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm" onclick="edit_brochure(`{{$brochure}}`)" data-original-title="Ubah">
                      <i class="material-icons">edit</i>
                      Edit
                    </button>
                    <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" onclick="delete_brochure('{{$brochure->id}}')" data-original-title="Hapus">
                      <i class="material-icons">close</i>
                      Delete
                    </button>
                  </td>
                </tr>
                @endforeach
              </table>