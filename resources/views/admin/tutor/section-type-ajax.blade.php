@if(isset($test_sections))
                                    @foreach($test_sections as $key => $value)
                                    <tr>                                   
                                        <td style="vertical-align:middle;text-align:center;font-size:18px;">
                                            {{$value->section_type->name}}
                                        </td>
                                        <td style="vertical-align:middle;">
                                           <div class="col-md-12">
                                               <div class="row">
                                               <div class="col-md-12" style="border-bottom:2px solid rgba(0,0,0,0.1);margin-bottom:10px;padding:10px;" id="section-{{$key}}-output">
                                                @if($value->sections->isEmpty())
                                                No Section
                                                @else
                                                @foreach($value->sections as $key2 => $section)
                                                @php
                                                $key2 += 1;
                                                @endphp
                                                               <div class="col-md-12 section-list">
                                                    <div class="col-md-12">
                                                      {{$key2}}. {{$section->name}} <br>
                                                     Total Question : {{$section->questions->count()}}
                                                  
                                                    </div>
                                                    <div class="col-md-12">
                                                    <div class="row">
                                                    <div class="col-md-4"> 
                                                    <input type="button" class="col-md-12 btn-primary btn" onclick="add_question('{{$test_id}}','{{$module_id}}','{{$package_id}}','{{$section->id}}','{{$value->section_type_id}}','{{$value->id}}')" value="Questions">
                                                    </div>
                                                    <div class="col-md-4">
                                                    <input type="button" class="col-md-12 btn-info btn" value="Details">
                                                    </div>
                                                    <div class="col-md-4">
                                                    <input type="button" class="col-md-12 btn-danger btn" onclick="delete_section('{{$value->id}}','{{$section->id}}','{{$key}}')" value="Delete">                                                        
                                                    </div>

                                                </div>
                                                </div>
                                                </div>
                                                
                                                @endforeach
                                                @endif                                                
                                            </div>
                                               <div class="col-md-9"><input type="text" name="section-{{$key}}" class="form-control"></div>
                                                <div class="col-md-3" style="padding:0 15px 0 0!important"> 
                                                <input type="button" class="btn" onclick="add_section('{{$key}}','{{$value->id}}','{{$value->section_type_id}}')" style="width:100%;" value="Add">
                                                </div>
                                               </div>
                                           </div>
                                        </td>     
                                        <td>
                                              @php
                              $hours = floor($value->duration / 3600);
                              $minutes = floor(($value->duration % 3600) / 60);
                              $seconds = $value->duration - ($hours*3600) - ($minutes*60);   
                            @endphp
                             @if($hours != 0)
                             {{$hours}} @if($hours > 1 ) {{'hours'}} @else {{'hour'}} @endif
                             @endif
                             @if($minutes != 0)
                             {{$minutes}} @if($minutes > 1 ) {{'minutes'}} @else {{'minute'}} @endif
                             @endif
                             @if($seconds != 0)
                             {{$seconds}} @if($seconds > 1 ) {{'seconds'}} @else {{'second'}} @endif
                             @endif
                                        </td> 
                                        <td>
                                            
                                            <button type="button" class="btn btn-success btn-link" value-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this test?") }}') ? this.parentElement.submit() : ''">
                                                <i class="material-icons">close</i>
                                                <div class="ripple-container"></div>
                                                edit
                                            </button>
                                        <button type="button" class="btn btn-danger btn-link" value-original-title="" title="" onclick="delete_section_type('{{$value->id}}')">
                                                <i class="material-icons">close</i>
                                                <div class="ripple-container"></div>
                                                delete
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif