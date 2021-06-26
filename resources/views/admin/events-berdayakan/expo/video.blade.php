<table class="table table-bordered">
  <colgroup>
    <col>
    <col>
  </colgroup>
  <tr>
    <td>Title</td>
    <td>Description</td>
    <td>Video</td>
    <td>Action</td>
  </tr>
  @foreach($videos as $video)
  <tr>
    <td>{{$video->title}}</td>
    <td>{{$video->description}}</td>
    <td>
      <iframe class="d-block mx-auto" src="//www.youtube.com/embed/{{$video->vid}}" width="400" height="200" frameborder="0" allowfullscreen></iframe>
    </td>

    <td>  
      <button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm" onclick="edit_video(`{{$video}}`)" data-original-title="Ubah">
        <i class="material-icons">edit</i>
        Edit
      </button>
      <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" onclick="delete_video('{{$video->id}}')" data-original-title="Hapus">
        <i class="material-icons">close</i>
        Delete
      </button>
    </td>
  </tr>
  @endforeach
</table>