@extends('layouts.app-auth',['dashboard' => 'admin','activePage' => 'form','activeMenu' => 'content-management', 'titlePage' => __('form')])
@push('head-js')
<style type="text/css">
  .open-button {
    background-color: #555;
    color: white;
    padding: 16px 20px;
    border: none;
    cursor: pointer;
    opacity: 0.8;

    width: 500px;
  }

  /* The popup form - hidden by default */
  .form-popup {
    display: none;
    border: 3px solid #f1f1f1;
    z-index: 9;
  }

  /* Add styles to the form container */
  .form-container {
    max-width: 100%;
    padding: 10px;
    background-color: white;
  }

  /* Full-width input fields */
  .form-container input[type=text], .form-container select {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    border: none;
    background: #f1f1f1;
  }

  /* When the inputs get focus, do something */
  .form-container input[type=text]:focus, .form-container select:focus {
    background-color: #ddd;
    outline: none;
  }


</style>

@endpush

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Form Builder </h4>
            <p class="card-category"> {{ __('Here you can manage forms') }}</p>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="p-3 text-center mb-2">
                  <button class="open-button" onclick="openForm()">Buat Form</button><br>
                </div>
                <!-- TAMBAH SOAL -->


                <div class="form-popup col-md-12 mb-4 mx-auto" id="myForm" style="width:60%;display: none;">
                  <form action="{{url('admin/form/add')}}" method = "POST" class="form-container">
                    @csrf
                    <div class="row"> 
                      <h3 class="m-1 mb-2">Soal baru</h3>
                    </div>
                    <div class="row"> 
                      <label for="soal1"><b>Judul Soal</b></label>
                      <input type="text" name = "soal" id="soal" required>
                    </div>
                    <div class="row"> 
                      <label for="slug"><b>Slug / Link</b></label>
                      <input type="text" name="slug" id="slug">
                    </div>
                    <div class="row"> 
                      <label for="layout"><b>Layout</b></label>
                      <select name="layout" id="layout">
                        <option value=""> - Pilih Layout - </option>
                        <option value="1"> Default </option>
                        <option value="2"> Google Form </option>
                      </select>
                    </div>
                    <div class="row">
                      <label for="email_to"><b>Send Result To</b></label>
                      <input type="text" name="">
                    </div>
                    <div class="row"> 
                      <button type="submit" class="btn btn-primary"name="button" value="add">Tambah</button>
                      <button type="button" class="btn cancel" onclick="closeForm()">Tutup</button>
                    </div>
                  </form>
                </div>

                <table class="table table-bordered">
                  <colgroup>
                    <col>
                    <col>
                    <col>
                  </colgroup>
                  <tr>
                    <th>No</th> <th>Form</th> <th>Slug</th> <th>Action</th>
                  </tr>
                  @foreach($forms as $key => $form)
                  @php
                  $key += 1;
                  @endphp
                  <tr>
                    <td>{{$key}}</td>
                    <td> <a href="{{url('admin/form/add-question?id='.$form->idsoal)}}"><?php echo $form->soal;?></a></td>
                    <td><a href="{{url('form/'.$form->slug)}}">{{url('form/'.$form->slug)}}</a></td>
                    <td><button type="button" class="btn btn-primary" onclick='openForm1("<?php echo $form->idsoal; ?>","{{$form->soal}}","{{$form->slug}}")'>Ubah Judul</button></td>
                  </tr>

                  @endforeach
                </table>


              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('js')
<script type="text/javascript">
  function openForm() {
    $('#myForm').toggle();
  }

  function closeForm() {
    document.getElementById("myForm").style.display = "none";
  }
  function openForm1(id,soal,slug) {
    document.getElementById("myForm1").style.display = "block";
    document.getElementById("id").value=id;
    document.getElementById("soal").value=soal;
    document.getElementById("edit-slug").value = slug;
  }

  function closeForm1() {
    document.getElementById("myForm1").style.display = "none";
  }
</script>
@endpush
