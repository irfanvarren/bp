@extends('layouts.bp_wo_sidenav')
@push('head-script')
<style media="screen">
.add-skills{
  background:none;
  border-radius:50%;
  font-size:16px;
  width:25px;
  color:white;
  border:none;
  font-weight:lighter;
  height:25px;
  margin-right:30px;
  padding:5px;
  float:right;
  background-color:#1f62bf;
}

.content-wrapper{
  padding:20px 60px !important;
}

.form-tab{
  display: none;
}
#career-tab{
  border: 0;
}
#career-tab .nav-item{
  padding: 0;
}
#career-tab .nav-link{
  border: none;
  color: black;
  padding: 0.5rem 15px;
}

#career-tab .nav-link.active, #career-tab .nav-item.show .nav-link{
  background: none !important;
  color: #0077B6;
  font-weight: bold;
}

.recruitment-form-wrapper{
  overflow: hidden;padding:0px 270px 0px 30px;min-height: 500px;
}
.career-add-btn:hover{
  cursor: pointer;
}
.career-btn{
  border-radius: 10px;
  padding: 6px 30px;
}
@media screen and (max-width:480px){
  .language-list input,.language-list textarea ,.other-skills-list input,.other-skills-list textarea{
    width:92% !important;
  }
  .add-skills{
    margin-right:5px;
  }

}
@media screen and (max-width: 768px) {
  .recruitment-form-wrapper{
    margin-top: 30px;
    padding-right:30px;
  }
  .career-img{
    display: none;
  }
}
</style>
@endpush
@section('content')

<div class="col-md-12" style="background:#0077B6;color:white;padding:15px;">
  <h4 class="m-0">Form Karir</h4>
</div>


<div class="col-md-12">
  @if(session()->has('message'))

  <div class="alert alert-success" style="text-align:center;margin-top:15px;">
    {!! session()->get('message') !!} <br>

    <button type="button" class="btn btn-primary" onclick="$('.alert').hide()" name="button">Ok</button>
  </div>
  @endif
</div>


<div class="col-md-12"  style="padding:65px 15px 125px 15px;background: #F5F9FF;color:black;font-size:20px;">

  @php
  $show = true;
  @endphp
  @if($recruitment != "")
  @if($recruitment->status != 0)
  @php
  $show = false;
  @endphp
  @endif
  @endif
  @if($show)
  <div class="row">
    <div class="col-md-3" style="border-right:1px solid #bebebe">
      <ul class="nav nav-tabs" id="career-tab" role="tablist">

        <li class="nav-item col-md-12">
          <a  class="nav-link active" id="category-tab"> Kategori Lowongan</a>
        </li>
        <li class="nav-item col-md-12">
          <a class="nav-link" id="biodata-tab">  Data Diri</a>
        </li>
        <li class="nav-item col-md-12">
          <a class="nav-link" id="experience-tab"> Pengalaman Bekerja</a>
        </li>

        <li class="nav-item col-md-12">
          <a class="nav-link" id="education-tab"> Pendidikan</a>
        </li>
        <li class="nav-item col-md-12">
          <a class="nav-link" id="skills-tab"> Kemampuan</a>
        </li>
        <li class="nav-item col-md-12">
          <a class="nav-link" id="document-tab"> Unggah Dokumen</a>
        </li>
      </ul>

    </div>
    <div class="recruitment-form-wrapper col-sm-12 col-md-9 "> 

      <div class="tab-content" id="myTabContent" style="position: relative;z-index: 2;">
        <div class="tab-pane fade show active" id="category" role="tabpanel" aria-labelledby="category-tab">

          <form enctype="multipart/form-data" id="form-category" action="#" onsubmit="submit_category(event)" method="post">
            @csrf
            <input type="hidden" name="id_user" value="{{auth()->user()->id}}">
            <input type="hidden" name="ref" value="{{$ref}}">
            <div class="row mb-3">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-12">
                    Pilih Kantor Cabang
                  </div>
                  <div class="col-md-12">
                   <select class="form-control" name="id_perusahaan" required>
                    <option value=""> - Pilih Kantor Cabang -</option>
                    @foreach($companies as $company)
                    <option value="{{$company->KD}}" @if($recruitment != "") {{$recruitment->id_perusahaan == $company->KD ? 'selected' : ''}} @endif>{{$company->NAMA}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-12 col-lg-6">
              <div class="row">
                <div class="col-md-12">
                  Pilih Kategori Lowongan
                </div>
                <div class="col-md-12">
                
                 <select class="form-control" name="id_kategori" onchange="select_category(this,'{{$recruitment->id_lowongan!= "" ? $recruitment->id_lowongan : ""}}')" required>

                  <option value=""> - Pilih Kategori -</option>

                  @foreach($job_categories as $category)
                  <option value="{{$category->id}}" @if($recruitment != "") {{$recruitment->id_kategori == $category->id ? 'selected' : ''}} @endif>{{$category->name}}</option>

                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-12 col-lg-6">
            <div class="row">
              <div class="col-md-12">
                Lowongan
              </div>
              <div class="col-md-12">
               <select class="form-control" name="id_lowongan" id="id_lowongan" required>
                <option value=""> - Pilih Lowongan -</option>
               
              </select>
            </div>
          </div>
        </div>
        <div class="col-md-12 text-right mt-3">
          <button type="submit" class="btn btn-primary" style="background:#0077B6;border-radius:30px;padding: 6px 30px;">Selanjutnya</button>
        </div>

      </div>
    </form>
  </div>
  <div class="tab-pane fade" id="biodata" role="tabpanel" aria-labelledby="biodata-tab">
    <form enctype="multipart/form-data" id="form-biodata" action="#" onsubmit="submit_biodata(event)" method="post">
      @csrf
      <input type="hidden" name="id_user" value="{{auth()->user()->id}}">
      <input type="hidden" name="ref" value="{{$ref}}">
      <div class="row mb-3">
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-12">Nama Lengkap</div>
            <div class="col-md-12">
              <input type="text" class="form-control" name="nama" placeholder="Nama" required value="@if($recruitment != ""){{$recruitment->nama}}@else{{auth()->user()->name}}@endif">
            </div>
          </div>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-12">Jenis Kelamin</div>
            <div class="col-md-12">
              <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                <option value=""> - Pilih Jenis Kelamin -</option>
                <option value="Laki - laki" @if($recruitment != "") {{$recruitment->jenis_kelamin == "Laki - laki" ? 'selected' : ''}} @endif> Laki - laki</option>
                <option value="Perempuan" @if($recruitment != "") {{$recruitment->jenis_kelamin == "Perempuan" ? 'selected' : ''}} @endif> Perempuan 
                </option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-12">Tempat Lahir</div>
            <div class="col-md-12">
              <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" value="@if($recruitment != ""){{$recruitment->tempat_lahir}}@endif" required>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="row">
            <div class="col-md-12">Tanggal Lahir</div>
            <div class="col-md-12">
              <input type="date" class="form-control" name="tanggal_lahir" placeholder="Tanggal Lahir" value="@if($recruitment != ""){{$recruitment->tanggal_lahir}}@endif" required>
            </div>
          </div>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-12">Email</div>
            <div class="col-md-12">
              <input type="email" name="email" class="form-control" placeholder="Email" value="@if($recruitment != ""){{$recruitment->email}}@else{{auth()->user()->email}}@endif" required>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="row">
            <div class="col-md-12">No. HP</div>
            <div class="col-md-12">
             <input type="no_telepon" name="no_telepon" class="form-control" placeholder="No Telepon" pattern="[0-9]{10,13}" value="@if($recruitment != ""){{$recruitment->no_telepon}}@endif" required>
           </div>
         </div>
       </div>
     </div>
     <div class="row mb-3">
      <div class="col-md-6">
        <div class="row">
          <div class="col-md-12">Alamat</div>
          <div class="col-md-12">
           <input type="text" name="alamat" class="form-control" placeholder="Alamat" value="@if($recruitment != ""){{$recruitment->alamat}}@endif" required>
         </div>
       </div>
     </div>
     <div class="col-md-6">
      <div class="row">
        <div class="col-md-12">Kota</div>
        <div class="col-md-12">
          <input type="text" name="kota" class="form-control" placeholder="Kota" value="@if($recruitment != ""){{$recruitment->kota}}@endif" required>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 text-right mt-3">
      <button type="button" onclick="prevTab('category')" class="btn btn-secondary" style="border-radius:30px;padding: 6px 30px;">Kembali</button>
      <button type="submit" class="btn btn-primary" style="background:#0077B6;border-radius:30px;padding: 6px 30px;">Selanjutnya</button>
    </div>
  </div>
</form>
</div>
<div class="tab-pane fade" id="experience" role="tabpanel" aria-labelledby="experience-tab">
  <div class="row mb-3">
    <div class="col-md-3">
      Status Pengalaman Bekerja
    </div>
    <div class="col-md-9">
      <select class="form-control" name="status_pengalaman_bekerja" id="status_pengalaman_bekerja" onchange="select_working_status(this)" required>
        <option value=""> - Pilih Status Pengalaman Bekerja</option>
        <option value="Fresh Graduate" @if($recruitment != "") {{$recruitment->status_pengalaman_bekerja == "Fresh Graduate" ? 'selected' : ''}} @endif>Fresh Graduate</option>
        <option value="Belum pernah bekerja sama sekali" @if($recruitment != "") {{$recruitment->status_pengalaman_bekerja == "Belum pernah bekerja sama sekali" ? 'selected' : ''}} @endif>Belum pernah bekerja sama sekali</option>
        <option value="Memiliki pengalaman bekerja" @if($recruitment != "") {{$recruitment->status_pengalaman_bekerja == "Memiliki pengalaman bekerja" ? 'selected' : ''}} @endif>Memiliki pengalaman bekerja</option>
      </select>
    </div>
  </div>
  <div id="working-experience-wrapper" style="display: none;">
    <div class="row mb-3">
      @if(count($experiences))
      @foreach($experiences as $key => $experience)
      <div class="col-md-12 working-experience-input p-3">
        <div class="row mb-3">
          <div class="col-md-12"><h5>Pengalaman Bekerja {{$key + 1 }}</h5></div>
        </div>
        <div class="row mb-3">
          <div class="col-md-3">Posisi</div>
          <div class="col-md-9">
            <input type="hidden" name="exp_id[]" value="{{$experience->id}}">
            <input type="text" class="form-control" name="posisi[]" placeholder="Cth. Administrasi Gudang" value="{{$experience->posisi}}">
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-3">Nama Perusahaan</div>
          <div class="col-md-9">
            <input type="text" class="form-control" name="nama_perusahaan[]" placeholder="Cth. PT Satu Dua Tiga" value="{{$experience->nama_perusahaan}}">
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-3">Bidang Usaha</div>
          <div class="col-md-9">
            <input type="text" class="form-control" name="bidang_usaha[]" placeholder="Cth. Distributor Minuman" value="{{$experience->bidang_usaha}}">
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-3">Tahun Bergabung</div>
          <div class="col-md-9">
            <input type="text" class="form-control" name="tahun_bergabung[]" pattern="[0-9]{4}" placeholder="Cth. 2016" value="{{$experience->tahun_bergabung}}">
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-3">Tahun Selesai</div>
          <div class="col-md-9 d-flex">
            <input type="text" class="form-control" name="tahun_selesai[]" pattern="[0-9]{4}" placeholder="Cth. 2020" value="{{$experience->tahun_selesai}}"> <div class="form-check-inline"> <input type="checkbox" class="form-check-input ml-2" name="aktif[]" value="1" {{$experience->aktif == 1 ? 'checked' : ''}}> Aktif</div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-3">Gaji</div>
          <div class="col-md-9">
            <input type="text" class="form-control" name="gaji[]" placeholder="Cth. Rp 2100000 (tanpa tanda baca)" value="{{$experience->gaji}}">
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-3">Deskripsi Pekerjaan</div>
          <div class="col-md-9">
            <textarea class="form-control" name="deskripsi_pekerjaan[]" placeholder="Cth. Mengawasi, mencatat stok masuk dan keluar Melaporkan pekerjaan kepada kepala gudang Membantu administrasi perkantoran inti perusahaan">{{$experience->deskripsi_pekerjaan}}</textarea>
            <input type="hidden" name="cmd[]" value="update">
          </div>
        </div>
        <div class="row mb-3">

          <div class="col-md-12">
           <button class="btn btn-secondary" onclick="save_experience('{{$key}}')" type="button">Simpan</button><button class="btn btn-secondary ml-2" type="button" onclick="cancel_experience('{{$key}}')">Batal</button>
         </div>
       </div>
     </div>
     @endforeach
     @else
     <div class="col-md-12 working-experience-input p-3">
      <div class="row mb-3">
        <div class="col-md-12"><h5>Pengalaman Bekerja 1</h5></div>
      </div>
      <div class="row mb-3">
        <div class="col-md-3">Posisi</div>
        <div class="col-md-9">
          <input type="hidden" name="exp_id[]">
          <input type="text" class="form-control" name="posisi[]" placeholder="Cth. Administrasi Gudang">
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-3">Nama Perusahaan</div>
        <div class="col-md-9">
          <input type="text" class="form-control" name="nama_perusahaan[]" placeholder="Cth. PT Satu Dua Tiga">
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-3">Bidang Usaha</div>
        <div class="col-md-9">
          <input type="text" class="form-control" name="bidang_usaha[]" placeholder="Cth. Distributor Minuman">
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-3">Tahun Bergabung</div>
        <div class="col-md-9">
          <input type="text" class="form-control" name="tahun_bergabung[]" pattern="[0-9]{4}" placeholder="Cth. 2016">
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-3">Tahun Selesai</div>
        <div class="col-md-9 d-flex">
          <input type="text" class="form-control" name="tahun_selesai[]" pattern="[0-9]{4}" placeholder="Cth. 2020"> <div class="form-check-inline"> <input type="checkbox" class="form-check-input ml-2" name="aktif[]" value="1"> Aktif</div>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-3">Gaji</div>
        <div class="col-md-9">
          <input type="text" class="form-control" name="gaji[]" placeholder="Cth. Rp 2100000 (tanpa tanda baca)">
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-3">Deskripsi Pekerjaan</div>
        <div class="col-md-9">
          <textarea class="form-control" name="deskripsi_pekerjaan[]" placeholder="Cth. Mengawasi, mencatat stok masuk dan keluar Melaporkan pekerjaan kepada kepala gudang Membantu administrasi perkantoran inti perusahaan"></textarea>
          <input type="hidden" name="cmd[]" value="add">
        </div>
      </div>
      <div class="row mb-3">

        <div class="col-md-12">
         <button class="btn btn-secondary" onclick="save_experience('0')" type="button">Simpan</button><button class="btn btn-secondary ml-2" type="button" onclick="cancel_experience('0')">Batal</button>
       </div>
     </div>
   </div>
   @endif
   <div class="col-md-12" id="experience-add-input">
   </div>
   <div class="col-md-12 p-3 text-center career-add-btn" style="color:#188F8F" onclick="add_working_exp()">
    + Tambah Pengalaman Bekerja
  </div>
</div>

</div>
<div class="row">
  <div class="col-md-12 text-right mt-3">
    <button type="button" onclick="prevTab('biodata')" class="btn btn-secondary" style="border-radius:30px;padding: 6px 30px;">Kembali</button>
    <button type="button" onclick="experience_next()" class="btn btn-primary" style="background:#0077B6;border-radius:30px;padding: 6px 30px;">Selanjutnya</button>
  </div>
</div>
</div>
<div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="education-tab">
  <div class="col-md-12 pb-3">Silahkan isi dua pendidikan terakhir anda disini</div>

  <form enctype="multipart/form-data" id="form-education" action="#" onsubmit="submit_education(event)" method="post">
    @csrf
    <input type="hidden" name="ref" value="{{$ref}}">
    @if(count($educations))
    @foreach($educations as $key => $education)
    <div class="col-md-12 p-3">
      <div class="row mb-3">
        <div class="col-md-12"><h5>Riwayat Pendidikan {{$key +1}}</h5></div>
      </div>
      <div class="row mb-3">
        <div class="col-md-3">Nama Institusi</div>
        <div class="col-md-9">
          <input type="hidden" name="data[{{$key}}][ref]" value="{{$ref}}">
          <input type="text" class="form-control" name="data[{{$key}}][nama_institusi]" placeholder="Cth. Universitas Terbuka" value="{{$education->nama_institusi}}">
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-3">Tahun Lulus</div>
        <div class="col-md-9">
          <input type="text" class="form-control" name="data[{{$key}}][tahun_lulus]" pattern="[0-9]{4}" placeholder="Cth. 2020" value="{{$education->tahun_lulus}}">
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-3">Gelar Akademik</div>
        <div class="col-md-9">
          <input type="text" class="form-control" name="data[{{$key}}][gelar_akademik]" placeholder="Cth. Sarjana Ekonomi / Sarjana Manajemen" value="{{$education->gelar_akademik}}">
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-3">Jurusan / Kualifikasi</div>
        <div class="col-md-9">
          <input type="text" class="form-control" name="data[{{$key}}][jurusan_kualifikasi]" placeholder="Cth. akutansi/bisnis/bahasa inggris" value="{{$education->jurusan_kualifikasi}}">
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-3">Nilai Akhir / IPK</div>
        <div class="col-md-9">
          <input type="text" class="form-control" name="data[{{$key}}][nilai_akhir_ipk]" placeholder="Cth. 88 / 3.75" value="{{$education->nilai_akhir_ipk}}">
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-3">Informasi Tambahan</div>
        <div class="col-md-9">
         <textarea class="form-control" name="data[{{$key}}][informasi_tambahan]" placeholder="Saya merupakan lulusan terbaik pada prodi bahasa di angkatan 2020">{{$education->informasi_tambahan}}</textarea>
       </div>
     </div>
   </div>
   @endforeach
   <div class="col-md-12 text-right mt-3">
    <button type="button" onclick="prevTab('experience')" class="btn btn-secondary" style="border-radius:30px;padding: 6px 30px;">Kembali</button>
    <button type="submit" class="btn btn-primary" style="background:#0077B6;border-radius:30px;padding: 6px 30px;">Selanjutnya</button>
  </div>

  @else
  <div class="col-md-12 p-3">
    <div class="row mb-3">
      <div class="col-md-12"><h5>Riwayat Pendidikan 1</h5></div>
    </div>
    <div class="row mb-3">
      <div class="col-md-3">Nama Institusi</div>
      <div class="col-md-9">
        <input type="hidden" name="data[0][ref]" value="{{$ref}}">
        <input type="text" class="form-control" name="data[0][nama_institusi]" placeholder="Cth. Universitas Terbuka">
      </div>
    </div>
    <div class="row mb-3">
      <div class="col-md-3">Tahun Lulus</div>
      <div class="col-md-9">
        <input type="text" class="form-control" name="data[0][tahun_lulus]" pattern="[0-9]{4}" placeholder="Cth. 2020">
      </div>
    </div>
    <div class="row mb-3">
      <div class="col-md-3">Gelar Akademik</div>
      <div class="col-md-9">
        <input type="text" class="form-control" name="data[0][gelar_akademik]" placeholder="Cth. Sarjana Ekonomi / Sarjana Manajemen">
      </div>
    </div>
    <div class="row mb-3">
      <div class="col-md-3">Jurusan / Kualifikasi</div>
      <div class="col-md-9">
        <input type="text" class="form-control" name="data[0][jurusan_kualifikasi]" placeholder="Cth. akutansi/bisnis/bahasa inggris">
      </div>
    </div>
    <div class="row mb-3">
      <div class="col-md-3">Nilai Akhir / IPK</div>
      <div class="col-md-9">
        <input type="text" class="form-control" name="data[0][nilai_akhir_ipk]" placeholder="Cth. 88 / 3.75">
      </div>
    </div>
    <div class="row mb-3">
      <div class="col-md-3">Informasi Tambahan</div>
      <div class="col-md-9">
       <textarea class="form-control" name="data[0][informasi_tambahan]" placeholder="Saya merupakan lulusan terbaik pada prodi bahasa di angkatan 2020"></textarea>
     </div>
   </div>
 </div>
 <div class="col-md-12 p-3">
  <div class="row mb-3">
    <div class="col-md-12"><h5>Riwayat Pendidikan 2</h5></div>
  </div>
  <div class="row mb-3">
    <div class="col-md-3">Nama Institusi</div>
    <div class="col-md-9">
      <input type="hidden" name="data[1][ref]" value="{{$ref}}">
      <input type="text" class="form-control" name="data[1][nama_institusi]" placeholder="Cth. Universitas Terbuka">
    </div>
  </div>
  <div class="row mb-3">
    <div class="col-md-3">Tahun Lulus</div>
    <div class="col-md-9">
      <input type="text" class="form-control" name="data[1][tahun_lulus]" pattern="[0-9]{4}" placeholder="Cth. 2020">
    </div>
  </div>
  <div class="row mb-3">
    <div class="col-md-3">Gelar Akademik</div>
    <div class="col-md-9">
      <input type="text" class="form-control" name="data[1][gelar_akademik]" placeholder="Cth. Sarjana Ekonomi / Sarjana Manajemen">
    </div>
  </div>
  <div class="row mb-3">
    <div class="col-md-3">Jurusan / Kualifikasi</div>
    <div class="col-md-9">
      <input type="text" class="form-control" name="data[1][jurusan_kualifikasi]" placeholder="Cth. akutansi/bisnis/bahasa inggris">
    </div>
  </div>
  <div class="row mb-3">
    <div class="col-md-3">Nilai Akhir / IPK</div>
    <div class="col-md-9">
      <input type="text" class="form-control" name="data[1][nilai_akhir_ipk]" placeholder="Cth. 88 / 3.75">
    </div>
  </div>
  <div class="row mb-3">
    <div class="col-md-3">Informasi Tambahan</div>
    <div class="col-md-9">
     <textarea class="form-control" name="data[1][informasi_tambahan]" placeholder="Saya merupakan lulusan terbaik pada prodi bahasa di angkatan 2020"></textarea>
   </div>
 </div>
</div>
<div class="col-md-12 text-right mt-3">
  <button type="button" onclick="prevTab('experience')" class="btn btn-secondary" style="border-radius:30px;padding: 6px 30px;">Kembali</button>
  <button type="submit" class="btn btn-primary" style="background:#0077B6;border-radius:30px;padding: 6px 30px;">Selanjutnya</button>
</div>
@endif
</form>
</div>
<div class="tab-pane fade" id="skills" role="tabpanel" aria-labelledby="skills-tab">
  <form enctype="multipart/form-data" id="form-skills" action="#" onsubmit="submit_skills(event)" method="post">
    @csrf
    <input type="hidden" name="ref" value="{{$ref}}">
    <div class="col-md-12 mb-2">
      Silahkan isi kemampuan Anda sebanyak mungkin dan sebenar-benarnya
    </div>
    <div class="col-md-9 ">
      @if($recruitment !="")
      @if($recruitment->keahlian_lainnya != "")

      @php
      $skills = explode('|',$recruitment->keahlian_lainnya);
      @endphp

      @foreach($skills as $skill)
      <input type="text" class="form-control mb-2" name="keahlian_lainnya[]" placeholder="Cth. Microsoft Office" value="{{$skill}}">

      @endforeach
      @else
      <input type="text" class="form-control mb-2" name="keahlian_lainnya[]" placeholder="Cth. Microsoft Office">
      @endif
      @else
      <input type="text" class="form-control mb-2" name="keahlian_lainnya[]" placeholder="Cth. Microsoft Office">
      @endif
    </div>
    <div class="col-md-9 other-skills-list">

    </div>
    <div class="col-md-9">
     <div class="career-add-btn" style="background:none;border:none;color:#08a7c4" onclick="add_other_skills()">+ Tambah</div>
   </div>
   <div class="col-md-12 text-right mt-3">
    <button type="button" onclick="prevTab('education')" class="btn btn-secondary" style="border-radius:30px;padding: 6px 30px;">Kembali</button>
    <button type="submit" class="btn btn-primary" style="background:#0077B6;border-radius:30px;padding: 6px 30px;">Selanjutnya</button>
  </div>
</form>
</div>
<div class="tab-pane fade" id="document" role="tabpanel" aria-labelledby="document-tab">
  <form action="{{url('careers/application')}}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="ref" value="{{$ref}}">
    @csrf
    <div class="row mb-2">
      <div class="col-md-12">
        Unggah semua dokumen wajib yang diperlukan dibawah ini
      </div>
    </div>
    <div class="row mb-3">
      <div class="col-md-3">KTP</div>
      <div class="col-md-9"><input type="file" class="" name="file_ktp"></div>
    </div>
    <div class="row mb-3">
      <div class="col-md-3">SIM</div>
      <div class="col-md-9"><input type="file" class="" name="file_sim"></div>
    </div>
    <div class="row mb-3">
      <div class="col-md-3">Ijazah Terkahir</div>
      <div class="col-md-9"><input type="file" class="" name="file_ijazah"></div>
    </div>
    <div class="row mb-3">
      <div class="col-md-3">Transkrip Nilai</div>
      <div class="col-md-9"><input type="file" class="" name="file_transkrip_nilai[]"></div>
    </div>
    <div class="row mb-3">
      <div class="col-md-3">Pas Foto</div>
      <div class="col-md-9"><input type="file" class="" name="file_pas_foto"></div>
    </div>
    <div class="row mb-2">
      <div class="col-md-12">
        Unggah dokumen pendukung lainnya bila diperlukan
      </div>
    </div>
    <div class="row mb-3">
      <div class="col-md-3">
        Dokumen Tambahan
      </div>
      <div class="col-md-9">
        <input type="file" name="file_dokumen_tambahan[]">
      </div>
    </div>
    <div class="row mb-3">
      <div class="col-md-3">
        Dokumen Tambahan
      </div>
      <div class="col-md-9">
        <input type="file" name="file_dokumen_tambahan[]">
      </div>
    </div>
    <div class="row mb-3">
      <div class="col-md-3">
        Dokumen Tambahan
      </div>
      <div class="col-md-9">
        <input type="file" name="file_dokumen_tambahan[]">
      </div>
    </div>
    <div class="row mb-3">
      <div class="col-md-12 text-right">
        <button type="button" onclick="prevTab('skills')" class="btn btn-secondary" style="border-radius:30px;padding: 6px 30px;">Kembali</button>
        <button type="submit" class="btn btn-primary career-btn">Submit</button>
      </div>
    </div>
  </form>
</div>
</div>
<img class="career-img" src="{{asset('img/career/application.png')}}" style="width:500px;position: absolute;right:-230px;top:50%;transform:translateY(-50%) ;z-index: 1;">
</div>
</div>
@endif
@if($recruitment!="")
@if($recruitment->status == "1")
<div class="row">
  <div class="col-md-6 d-flex align-items-center">
    <div>
      Terima kasih {{$recruitment->nama}}, <br> <br>

      Anda akan mendapatkan email berisikan informasi penerimaan maupun penolakan dalam kurun waktu <strong>14 hari kerja.</strong> <br> <br>

      <form action="{{url('careers/application')}}" class="d-inline" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="ref" value="{{$ref}}">
        <input type="hidden" name="status" value="0">
        <button type="submit" class="btn btn-danger career-btn mr-3">Kehalaman Edit</button>
      </form>
      <form action="{{url('careers/application')}}" class="d-inline" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="ref" value="{{$ref}}">
        <input type="hidden" name="status" value="2">
        <button type="submit" class="btn btn-primary career-btn">Selesai</button>
      </form>
    </div>
  </div>
  <div class="col-md-6">
    <img src="{{asset('img/career/finish.png')}}" style="width: 100%;max-width:600px;display: block;margin:0 auto;">
  </div>
</div>
@endif
@endif



</div>
@endsection
@push('more-script')
<script type="text/javascript">
  var ref = "{{$ref}}";
  var token =  $("input[name='_token']").val();
  var currentTab = 0; // Current tab is set to be the first tab (0)


  $(document).ready(function() {
    if($('#status_pengalaman_bekerja').val() == "Memiliki pengalaman bekerja" ){
      $('#working-experience-wrapper').show();
    }else{
      $('#working-experience-wrapper').hide();
    }
  });

showTab(currentTab); // Display the current tab
function submit_form(){
  alert('Data sudah tersimpan')
  location.href = "{{url('careers/application')}}";
}
function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("form-tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").style.display = "none";
    document.getElementById("submit").style.display ="inline";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
    document.getElementById("nextBtn").style.display = "inline";
    document.getElementById("submit").style.display ="none";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}
function prevTab(wrapper){
 $('#career-tab .nav-link').removeClass('active');
 $('#career-tab #'+wrapper+'-tab').addClass('active');
 $('.tab-pane').removeClass('active');
 $('#'+wrapper).addClass('active show');
}
function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("form-tab");
  // Exit the function if any field in the current tab is invalid:
  // /if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
function add_skills(){
  $('.language-list').append(
    "<li> </li><input type='text' class='form-control' name='keahlian_bahasa[]' value=''>"
    );
}

function add_working_exp(){
  var working_experiences = $('.working-experience-input');
  var output = `<div class="col-md-12 working-experience-input p-3">
  <div class="row mb-3">
  <div class="col-md-12"><h5>Pengalaman Bekerja `+(working_experiences.length + 1)+`</h5></div>
  </div>
  <div class="row mb-3">
  <div class="col-md-3">Posisi</div>
  <div class="col-md-9">
  <input type="hidden" name="exp_id[]">
  <input type="text" class="form-control" name="posisi[]" placeholder="Cth. Administrasi Gudang">
  </div>
  </div>
  <div class="row mb-3">
  <div class="col-md-3">Nama Perusahaan</div>
  <div class="col-md-9">
  <input type="text" class="form-control" name="nama_perusahaan[]" placeholder="Cth. PT Satu Dua Tiga">
  </div>
  </div>
  <div class="row mb-3">
  <div class="col-md-3">Bidang Usaha</div>
  <div class="col-md-9">
  <input type="text" class="form-control" name="bidang_usaha[]" placeholder="Cth. Distributor Minuman">
  </div>
  </div>
  <div class="row mb-3">
  <div class="col-md-3">Tahun Bergabung</div>
  <div class="col-md-9">
  <input type="text" class="form-control" name="tahun_bergabung[]" pattern="[0-9]{4}" placeholder="Cth. 2016">
  </div>
  </div>
  <div class="row mb-3">
  <div class="col-md-3">Tahun Selesai</div>
  <div class="col-md-9 d-flex">
  <input type="text" class="form-control" name="tahun_selesai[]" pattern="[0-9]{4}" placeholder="Cth. 2020"> <div class="form-check-inline"> <input type="checkbox" class="form-check-input ml-2" name="aktif[]" value="1"> Aktif</div>
  </div>
  </div>
  <div class="row mb-3">
  <div class="col-md-3">Gaji</div>
  <div class="col-md-9">
  <input type="text" class="form-control" name="gaji[]" placeholder="Cth. Rp 2100000 (tanpa tanda baca)">
  </div>
  </div>
  <div class="row mb-3">
  <div class="col-md-3">Deskripsi Pekerjaan</div>
  <div class="col-md-9">
  <textarea class="form-control" name="deskripsi_pekerjaan[]" placeholder="Cth. Mengawasi, mencatat stok masuk dan keluar Melaporkan pekerjaan kepada kepala gudang Membantu administrasi perkantoran inti perusahaan"></textarea>
  <input type="hidden" name="cmd[]" value="add">
  </div>
  </div>
  <div class="row mb-3">

  <div class="col-md-12">
  <button class="btn btn-secondary" onclick="save_experience('`+working_experiences.length+`')" type="button">Simpan</button><button class="btn btn-secondary ml-2" type="button" onclick="cancel_experience('`+working_experiences.length+`')">Batal</button>
  </div>
  </div>
  </div>`;
  $('#experience-add-input').append(output);
}
function add_other_skills(){
  $('.other-skills-list').append(
    '<input type="text" class="form-control mb-2" rows="2" name="keahlian_lainnya[]" value="">'
    );
}


function select_working_status(e){
 $.ajax({
  url: "{{route('recruitments-biodata')}}",
  method: "POST",
  data:{
    '_token':token,
    'ref':ref,
    'status_pengalaman_bekerja' : e.value
  },
  success: function(data) {
    if(e.value == "Memiliki pengalaman bekerja"){
      $('#working-experience-wrapper').show();
    }else{
      $('#working-experience-wrapper').hide();
    }
  },
  error: function(request, status, error) {
    alert(request.responseText);
  }
}); 
}

function submit_category(e){
  e.preventDefault();

  var formData = new FormData(document.getElementById('form-category'));
  $.ajax({
    url: "{{route('recruitments-category')}}",
    method: "POST",
    data: formData,
    processData:false,
    contentType:false,
    success: function(data) {
      $('#career-tab .nav-link').removeClass('active');
      $('#career-tab #biodata-tab').addClass('active');
      $('.tab-pane').removeClass('active');
      $('#biodata').addClass('active show');
    },
    error: function(request, status, error) {
      alert(request.responseText);
    }
  });
}

function submit_biodata(e){
 e.preventDefault();

 var formData = new FormData(document.getElementById('form-biodata'));
 $.ajax({
  url: "{{route('recruitments-biodata')}}",
  method: "POST",
  data: formData,
  processData:false,
  contentType:false,
  success: function(data) {
    $('#career-tab .nav-link').removeClass('active');
    $('#career-tab #experience-tab').addClass('active');
    $('.tab-pane').removeClass('active');
    $('#experience').addClass('active show');
  },
  error: function(request, status, error) {
    alert(request.responseText);
  }
}); 
}

function experience_next(){
 $('#career-tab .nav-link').removeClass('active');
 $('#career-tab #education-tab').addClass('active');
 $('.tab-pane').removeClass('active');
 $('#education').addClass('active show');
}
function submit_education(e){
 e.preventDefault();
 var formData = new FormData(document.getElementById('form-education'));
 $.ajax({
  url: "{{route('recruitments-education')}}",
  method: "POST",
  data: formData,
  processData:false,
  contentType:false,
  success: function(data) {
   $('#career-tab .nav-link').removeClass('active');
   $('#career-tab #skills-tab').addClass('active');
   $('.tab-pane').removeClass('active');
   $('#skills').addClass('active show');
 },
 error: function(request, status, error) {
  alert(request.responseText);
}
});

}

function submit_skills(e){
 e.preventDefault();
 var formData = new FormData(document.getElementById('form-skills'));
 $.ajax({
  url: "{{route('recruitments-biodata')}}",
  method: "POST",
  data: formData,
  processData:false,
  contentType:false,
  success: function(data) {
    $('#career-tab .nav-link').removeClass('active');
    $('#career-tab #document-tab').addClass('active');
    $('.tab-pane').removeClass('active');
    $('#document').addClass('active show');
  },
  error: function(request, status, error) {
    alert(request.responseText);
  }
});

}

function save_experience(key){
  var working_experiences = $('.working-experience-input');
  var id = $(working_experiences[key]).find('input[name="exp_id[]"]').val();
  var posisi = $(working_experiences[key]).find('input[name="posisi[]"]').val();
  var nama_perusahaan = $(working_experiences[key]).find('input[name="nama_perusahaan[]"]').val();
  var bidang_usaha = $(working_experiences[key]).find('input[name="bidang_usaha[]"]').val();
  var tahun_bergabung = $(working_experiences[key]).find('input[name="tahun_bergabung[]"]').val();
  var tahun_selesai = $(working_experiences[key]).find('input[name="tahun_selesai[]"]').val();
  if(tahun_bergabung.length != 4){
    alert('tahun harus 4 digit angka !')
    return false;
  }
  if(tahun_selesai.length != 4){
    alert('tahun harus 4 digit angka !')
    return false;
  }
  var aktif = $(working_experiences[key]).find('input[name="aktif[]"]')[0];
  if(aktif.checked){
    aktif = 1;
  }else{
    aktif = 0;
  }
  var gaji = $(working_experiences[key]).find('input[name="gaji[]"]').val();
  var deskripsi_pekerjaan = $(working_experiences[key]).find('textarea[name="deskripsi_pekerjaan[]"]').val();
  var cmd = $(working_experiences[key]).find('input[name="cmd[]"]').val();
  $.ajax({
    url: "{{route('recruitments-experience')}}",
    method: "POST",
    data:{
      _token: token,
      id : id,
      ref: ref,
      posisi: posisi,
      nama_perusahaan : nama_perusahaan,
      bidang_usaha : bidang_usaha,
      tahun_bergabung : tahun_bergabung,
      tahun_selesai : tahun_selesai,
      aktif :aktif,
      gaji : gaji,
      deskripsi_pekerjaan : deskripsi_pekerjaan,
      cmd : cmd
    },
    success: function(data) {
      $(working_experiences[key]).find('input[name="cmd[]"]').val("update");
      $(working_experiences[key]).find('input[name="exp_id[]"]')[0].value = data.data.id;
      alert('Pengalaman Bekerja Berhasil Disimpan');
    },
    error: function(request, status, error) {
      alert(request.responseText);
    }
  });
}


function cancel_experience(key){
   var working_experiences = $('.working-experience-input');
  $(working_experiences[key]).find('input').val("");
  $(working_experiences[key]).find('textarea').val("");
}

function select_category(e,id_lowongan = null){
  var category_id = e.value;
  $.ajax({
    url: "{{route('job-vacancies-ajax')}}",
    method: "GET",
    data:{
      _token: token,
    category_id: category_id,
    id_lowongan:id_lowongan
    },
    success: function(data) {
     $('#id_lowongan').html("");
     $("#id_lowongan").append('<option value=""> - Pilih Lowongan -</option>');
     $.each(data,function(k,v){
      var append = '<option value="'+v.id+'" ';
      if(v.selected == 1){
        append+= 'selected';
      }
      append+='>'+v.name+' </option>';
      $("#id_lowongan").append(append);
     });
    },
    error: function(request, status, error) {
      alert(request.responseText);
    }
  });
}
</script>
@endpush