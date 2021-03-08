  <div id="pricelist-output">
   
      
      <div class="col-md-12" style="padding:0 !important;overflow-y:hidden;overflow-x: auto;">
        @if(count($pricelist->details))
        <table class="tb-pricelist table table-bordered" style="margin:30px 0 !important;"> 
          <colgroup>
            <col width="35%">
          </colgroup>
          <thead>
            <tr>
            <th class="text-left">{{$pricelist->details[0]->NAMA_PAKET}}</th><th>Duration</th><th>Category</th><th>Price</th>
          </tr>
          </thead>
          <tbody>
            @foreach($pricelist->details->groupBy('REF_LEVEL') as $key => $detail)
            <tr>
              <td rowspan="{{count($detail->groupBy('REF_KATEGORI'))}}"> <strong> {{$detail->first()->REF_PAKET}}{{$key}}</strong> {{$detail->first()->NAMA_PAKET}} - {{$detail->first()->NAMA_LEVEL}}</td>
              <td>{{round($detail->where('REF_LEVEL',$key)->groupBy('REF_KATEGORI')->first()[0]->JUMLAH_JAM,2)}} Jam</td>
              <td>{{$detail->where('REF_LEVEL',$key)->groupBy('REF_KATEGORI')->first()[0]->NAMA_KATEGORI}}</td>
              <td>{{number_format($detail->where('REF_LEVEL',$key)->groupBy('REF_KATEGORI')->first()[0]->HARGA_PAKET,2,',','.')}} IDR</td>
            </tr>
            @foreach($detail->where('REF_LEVEL',$key)->groupBy('REF_KATEGORI')->splice(1) as $kategori)
            <tr>
              <td>{{round($kategori->first()->JUMLAH_JAM,2)}} Jam</td>
              <td>{{$kategori->first()->NAMA_KATEGORI}}</td>
              <td>{{number_format($kategori->first()->HARGA_PAKET,2,',','.')}} IDR</td>
            </tr>
            @endforeach
            @endforeach
                  
          </tbody>
        </table>
        @endif
      </div>
    </div> 
    ##
    @foreach($pricelist->packets as $key => $packet)
    <div class="tab {{$key == 0 ? 'active' : ''}}" onclick="change_product('{{$pricelist->KD}}','{{$packet->KD}}',this)"> {{ucwords(strtolower($packet->NAMA))}}</div>
    @endforeach