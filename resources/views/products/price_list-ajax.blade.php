  <div id="pricelist-output">
   
      
      <div class="col-md-12" style="padding:0 !important;overflow-y:hidden;overflow-x: auto;">
        @php 
        $packet_rowspan = 0;
        @endphp

        @if(count($pricelist->details))
        <table class="tb-pricelist table table-bordered" style="margin:30px 0 !important;"> 
          <colgroup>
            <col width="27.5%">
          </colgroup>
          <thead>
            <tr>
            <th class="text-left">{{$pricelist->details[0]->NAMA_PAKET}}</th><th>Duration</th><th>Category</th><th>Price</th>
          </tr>
          </thead>
          <tbody>
            @foreach($pricelist->details->groupBy('REF_LEVEL') as $key => $detail)
            <tr>
              <td rowspan="@if($detail->first()->REF_PAKET == 'TL.DOC') {{count($detail) + count($detail->where('REF_LEVEL',$key)->groupBy('JUMLAH_JAM')) + 1}} @else {{count($detail->groupBy('REF_KATEGORI')) * count($detail->where('REF_LEVEL',$key)->groupBy('JUMLAH_JAM')) + count($detail->where('REF_LEVEL',$key)->groupBy('JUMLAH_JAM')) + 1}} @endif"> <strong> {{$detail->first()->REF_PAKET}}{{$key}}</strong> {{$detail->first()->NAMA_PAKET}} - {{$detail->first()->NAMA_LEVEL}}</td>
           </tr>
            @foreach($detail->where('REF_LEVEL',$key)->groupBy('JUMLAH_JAM') as $key_jam => $data_jam)
             <td rowspan="{{count($data_jam)+1}}">{{round($data_jam->first()->JUMLAH_JAM,2)}} Jam</td>
            @foreach($data_jam->where('JUMLAH_JAM')->groupBy('REF_KATEGORI') as $kategori)
            @if($packet_rowspan == 0)
            @php
            $packet_rowspan = count($detail->where('REF_LEVEL',$key)->groupBy('JUMLAH_JAM')) * count($data_jam->where('JUMLAH_JAM')->groupBy('REF_KATEGORI')) + 1 ;
            
            @endphp
            @endif
            <tr>
             
              <td>{{$kategori->first()->NAMA_KATEGORI}}</td>
              <td>{{number_format($kategori->first()->HARGA_PAKET,2,',','.')}} IDR</td>
            </tr>
            @endforeach
            @endforeach
            @endforeach
                  
          </tbody>
        </table>
        @else
        <h1 style="padding-top:15px"> <strong>No Pricelist Yet...</strong></h1>
        @endif
      </div>
    </div> 
    ##
    @foreach($pricelist->packets as $key => $packet)
    <div class="tab {{$key == 0 ? 'active' : ''}}" onclick="change_product('{{$pricelist->KD}}','{{$packet->KD}}',this)"> {{ucwords(strtolower($packet->NAMA))}}</div>
    @endforeach