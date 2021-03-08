@extends('layouts.app-auth', ['activePage' => 'events','activeMenu' => 'data-management', 'titlePage' => __('Events')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('admin-events.update',$id)}}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('put')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Add Events') }}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <a href="{{route('admin-events.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Nama Events') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('nama') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" id="input-nama" type="text" placeholder="{{ __('Nama') }}" value="{{$events->nama}}" required />
                                        @if ($errors->has('nama'))
                                        <span id="harga-error" class="error text-danger" for="input-title">{{ $errors->first('nama') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Tanggal Mulai') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('tgl_mulai') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('tgl_mulai') ? ' is-invalid' : '' }}" name="tgl_mulai" id="input-tgl_mulai" value="{{date("Y-m-d",strtotime($events->tgl_mulai))}}" type="date"/>
                                        @if ($errors->has('nama'))
                                        <span id="tgl_mulai-error" class="error text-danger" for="input-tgl_mulai">{{ $errors->first('tgl_mulai') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Tanggal Selesai') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('tgl_selesai') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('tgl_selesai') ? ' is-invalid' : '' }}" name="tgl_selesai" id="input-tgl_selesai" value="{{date("Y-m-d",strtotime($events->tgl_selesai))}}" type="date"/>
                                        @if ($errors->has('tgl_selesai'))
                                        <span id="tgl_selesai-error" class="error text-danger" for="input-tgl_selesai">{{ $errors->first('tgl_selesai') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Jam Mulai') }}  </label>

                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('jam_mulai') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('jam_mulai') ? ' is-invalid' : '' }}" name="jam_mulai" id="input-jam_mulai" value="{{date("H:i",strtotime($events->jam_mulai))}}" type="time" />
                                        @if ($errors->has('jam_mulai'))
                                        <span id="jam_mulai-error" class="error text-danger" for="input-jam_mulai">{{ $errors->first('jam_mulai') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Jam Selesai') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('jam_selesai') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('jam_selesai') ? ' is-invalid' : '' }}" name="jam_selesai" id="input-jam_selesai" value="{{date("H:i",strtotime($events->jam_mulai))}}"value="{{date("H:i",strtotime($events->jam_selesai))}}" type="time" />
                                        @if ($errors->has('jam_selesai'))
                                        <span id="jam_selesai-error" class="error text-danger" for="input-jam_selesai">{{ $errors->first('jam_selesai') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary">{{ __('Edit Events') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')

</script>
@endpush
