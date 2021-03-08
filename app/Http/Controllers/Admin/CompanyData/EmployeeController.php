<?php

namespace App\Http\Controllers\Admin\CompanyData;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Karyawan;
use App\Sales;
use App\JobDescription;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($role = null)
    {
        $marketing = Sales::get();
        $employees = Karyawan::selectRaw('tb_karyawan.*,tb_jabatan.NAMA as NAMA_JABATAN,tb_deskripsi_pekerjaan.deskripsi as deskripsi_pekerjaan')->leftJoin('tb_jabatan','tb_karyawan.REF_JABATAN','tb_jabatan.KD')->leftJoin('tb_deskripsi_pekerjaan','tb_karyawan.ID_KARYAWAN','tb_deskripsi_pekerjaan.id_karyawan')->get();
        return view('admin.company-data.employee.index',['employees' => $employees]);
    }
        

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Karyawan::leftJoin('tb_deskripsi_pekerjaan','tb_karyawan.ID_KARYAWAN','tb_deskripsi_pekerjaan.id_karyawan')->find($id);
        return view('admin.company-data.employee.edit',['employee' => $employee]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cek_exist = JobDescription::find($id);
        if($cek_exist){
        $update = JobDescription::find($id)->update($request->all());
    }else{
        $request->merge(['id_karyawan' => $id]);
        $create = JobDescription::create($request->all());
    }
        return redirect()->route('admin-employee.index')->withStatus('Job description has been successfully updated');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = JobDescription::find($id)->delete();
        return redirect()->route('admin.company-data.employee.index')->withStatus('Job description has been successfully deleted');
    }
}
