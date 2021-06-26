@extends('layouts.app-auth',)
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">{{ __('Search Students') }}</h4>
            <p class="card-category"> {{ __('Here you can manage students') }}</p>
          </div>
          <div class="card-body">
            @if (session('status'))
            <div class="row">
              <div class="col-sm-12">
                <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="material-icons">close</i>
                  </button>
                  <span>{{ session('status') }}</span>
                </div>
              </div>
            </div>
            @endif
            <div class="row">
              <div class="col-12" style="border-bottom:1px solid black;padding-bottom:15px;margin-bottom:15px;">
                <div class="text-center"> <h2> Countries </h2> </div>
                @foreach($countries as $country)
                <button class="btn">{{$country->name}}</button>
                @endforeach
              </div>
              <div class="col-12">
                <button class="btn">Approved</button>
                <button class="btn">Cancelled</button>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-striped table-no-bordered table-hover datatable mdl-data-table dataTable dtr-inline collapsed">
                <thead class=" text-primary">
                  <th>
                    {{ __('Name') }}
                  </th>
                  <th>
                    {{ __('Email') }}
                  </th>
                  <th>{{__('Client Id')}}</th>
                  <th>{{__('Marketing Id / Code')}}</th>
                  <th>
                    {{__('Visa Country')}}
                  </th>
                  <th>
                    {{__('Status')}}
                  </th>
                  <th class="text-right">
                    {{ __('Actions') }}
                  </th>
                </thead>
                <tbody>
                  @foreach($students as $student)

                  <tr>
                    <td>
                      {{ $student->name }}
                    </td>
                    <td>
                      {{$student->email}}
                    </td>
                    <td>{{$student->client_id}}</td>
                    <td>{{$student->marketing_id}}</td>
                    <td>
                      {{$student->visa_country_name}}
                    </td>
                    <td>
                      <button class="btn btn-primary">Active</button>
                      <button class="btn">In Active</button>
                    </td>
                    <td class="td-actions text-right">
                      <form action="{{ route('school-students.destroy', $student) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="button" class="btn btn-primary btn-link" onclick="open_modal('{{$student->id}}')">
                          <i class="material-icons">menu</i>
                          <div class="ripple-container"></div>
                          <div class="">
                            More
                          </div>
                        </button>
                        <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('school-students.edit', $student) }}" data-original-title="" title="">
                          <i class="material-icons">edit</i>
                          <div class="ripple-container"></div>
                        </a>
                        <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this data?") }}') ? this.parentElement.submit() : ''">
                          <i class="material-icons">close</i>
                          <div class="ripple-container"></div>
                        </button>
                      </form>

                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>

            </div>
            <div class="row">
              {{ $students->links() }}
            </div>
          </div>
        </div>
      </div>