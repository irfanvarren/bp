<?php

namespace App\Models\Admin\StudentData;

use Illuminate\Database\Eloquent\Model;

class StudentRegistrationDetail extends Model
{
	protected $table = "tb_siswa_dtlregis";
	protected $fillable = [
		"KD",
		"JENIS_TINGGAL",
		"ALAT_TRANSPORTASI",
		"KEWARGANEGARAAN",
		"TITLE",
		"TINGKAT_PEKERJAAN",
		"SEKTOR_PEKERJAAN",
		"TINGKAT_PENDIDIKAN",
		"UNIVERSITAS_TERAKHIR",
		"JURUSAN",
		"LAMA_BELAJAR_INGGRIS",
		"TGL_BERLAKU_PASPOR",
		"BAHASA_SEHARI_HARI",
		"KEBUTUHAN_KHUSUS",
		"PENERIMA_KPS",
		"LAYAK_PIP",
		"PENERIMA_KIP",
		"PATH_KTP",
		"PATH_PASPOR",
		"PATH_PAYMENT",
		"PATH_KK",
		"PATH_IJAZAH",
		"PATH_AKTA_LAHIR",
		"PATH_KKS",
		"created_at",
		"updated_at"
	];


	/*
	SISWA HDR

	"AMBIL_JURUSAN",
"TEST_MODULE",
"ALASAN",
"TGL_TEST",
"TGL_SIMULASI",
"AMBIL_GELAR",
"REF_SALES",
"REF_UNIVERSITAS",
"REF_PERUSAHAAN",
"NEGARA_TUJUAN",
"reseller_id",
"users_id",
"PATH_PAYMENT"
	*/
}
