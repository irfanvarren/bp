
    @php
      $x = 0;

    @endphp
    @foreach($merchants as $merchant)
      <tr>
        <td>
          {{ $merchant->nama_merchant }}
        </td>
        <td>
          {{ $merchant->email }}
        </td>
        <td>
          {{$merchant->no_telepon}}
        </td>
        <td>
          {{$merchant->alamat}}
          </td>

        <td>
          {{$merchant->created_at->format('Y-m-d')}}
        </td>
        <td>

              <div class="togglebutton" >
                <label id="status-ajax">
            <input type="checkbox" id="status" class="status_input" no="{{$x}}"value="{{$merchant->id}}" {{ ($merchant->status == '1') ? 'checked' : '' }} name="status">
            <span class="toggle"></span>
              </label>

              <span id="status-label" class="status-label" for="status">{{ ($merchant->status == '1') ? 'Active' : 'Non Active' }}</span>
            </div>

        </td>
      </tr>
      @php
        $x++;
      @endphp
    @endforeach
