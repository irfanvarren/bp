<table class="table">
    <colgroup>
        <col width="17.5%">
        <col>
        <col>
        <col width="25%">
        <col>
    </colgroup>
    <thead class=" text-primary">
         <th>
                                        {{ __('Nama') }}
                                    </th>
                                    <th>
                                        {{ __('Jenis Event')}}
                                    </th>
                                    <th>
                                        {{ __('Preview Link') }}
                                    </th>
                                    <th>Jumlah Terdaftar</th>
                                    <th>
                                        {{__('Durasi')}}
                                    </th>
                                    <th class="text-center">
                                        {{ __('Actions') }}
                                    </th>
    </thead>
    <tbody>
        @foreach($events as $data)
         <td>
                                            {{ $data->nama }}
                                        </td>
                                        <td>{{ $data->nama_jenis_event}}</td>
                                        <td>
                                            @if($data->event_type_id != 6)
                                        <a href=" {{url("/events/".$data->kd."/guest-book")}}">
                                          Form
                                        </a>
                                         |
                                        <a href=" {{url("admin/events/data-guestbook/".$data->kd)}}">
                                          Data
                                        </a>
                                        @endif
                                        </td>

                                        <td>{{$data->jlh}}</td>
                                        <td>
                                            {{$data->tgl_mulai.' '.$data->jam_mulai}}
                                          @if ($data->tgl_selesai || $data->jam_selesai)
                                            <br> to <br>
                                              {{$data->tgl_selesai.' '.$data->jam_selesai}}
                                          @endif
</div>
</td>
<td class="text-center">
<form action="{{ route('admin-events-berdayakan.destroy', $data) }}" method="post">
    @csrf
    @method('delete')

    <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('admin-events-berdayakan.edit', $data) }}" data-original-title="" title="">
        <i class="material-icons">edit</i>
        <div class="ripple-container"></div>
    </a>
    <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this events?") }}') ? this.parentElement.submit() : ''">
        <i class="material-icons">close</i>
        <div class="ripple-container"></div>
    </button>
</form>
</td>
<!--   <td class="td-actions text-right">
  <form action="{{ route('mp.destroy', $data) }}" method="post">
      @csrf
      @method('delete')

      <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('mp.edit', $data) }}" data-original-title="" title="">
        <i class="material-icons">edit</i>
        <div class="ripple-container"></div>
      </a>
      <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this events?") }}') ? this.parentElement.submit() : ''">
          <i class="material-icons">close</i>
          <div class="ripple-container"></div>
      </button>
  </form>
<a rel="tooltip" class="btn btn-success btn-link" href="{{ url('admin'.'/profile') }}" data-original-title="" title="">
    <i class="material-icons">edit</i>
    <div class="ripple-container"></div>
  </a>
</td>-->
</tr>
@endforeach
</tbody>
</table>