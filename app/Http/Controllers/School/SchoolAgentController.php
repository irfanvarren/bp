<?php

namespace App\Http\Controllers\School;

use DateTime;
use App\SchoolAgent;
use App\School;
use App\SchoolContract;
use App\SchoolHasAgent;
use App\SchoolCommission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SchoolAgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $dashboard = 'sekolah';
    public function index()
    {
        $agents = SchoolAgent::paginate(10);
        $schools = School::selectRaw('schools.*,countries.name as country_name,regions.name as region_name,cities.name as city_name')->join('countries','schools.country_id','=','countries.id')->join('regions','schools.region_id','=','regions.id')->join('cities','schools.city_id','=','cities.id')->orderBy('schools.name')->get();

        return view('sekolah.admin.school-agents.index',[ 'agents' => $agents, 'dashboard' => $this->dashboard,'schools' => $schools]);
    }

    public function school_contract_ajax(SchoolContract $model,Request $request){

      if($request->cmd == "add"){
        $start_date =  DateTime::createFromFormat('d/m/Y',$request->start_date);
        $start_date->format('Y-m-d H:i:s');
        $end_date =  DateTime::createFromFormat('d/m/Y',$request->end_date);
        $end_date->format('Y-m-d H:i:s');
        $request->merge(['start_date' => $start_date]);
        $request->merge(['end_date' => $end_date]);
        $request->merge(['note' => htmlspecialchars($request->note)]);
        $input_school = SchoolHasAgent::create($request->all());
        $model->create($request->all());
    }else if($request->cmd == "update"){
        $start_date =  DateTime::createFromFormat('d/m/Y',$request->start_date);
        $start_date->format('Y-m-d H:i:s');
        $end_date =  DateTime::createFromFormat('d/m/Y',$request->end_date);
        $end_date->format('Y-m-d H:i:s');
        $request->merge(['start_date' => $start_date]);
        $request->merge(['end_date' => $end_date]);
        $request->merge(['note' => htmlspecialchars($request->note)]);

        if(SchoolHasAgent::find($request->school_agents_id)){
            $update_school = SchoolHasAgent::find($request->school_agents_id)->update($request->all());
        }else{
            $input_school = SchoolHasAgent::create($request->all());
        }
        $model->find($request->id)->update($request->all());
    }else if($request->cmd == "delete"){
        $delete_commission = SchoolCommission::where('agent_id',$request->agent_id)->where('school_id',$request->school_id)->delete();
        $delete_school = SchoolHasAgent::find($request->school_agents_id)->delete();
        $model->find($request->id)->delete();
    }

    $agent_id = $request->agent_id;

    $has_schools = SchoolHasAgent::selectRaw('school_has_agents.*,schools.name as school_name,schools.logo')->with(['agent_contracts' => function($query) use ($agent_id){
        return $query->selectRaw('school_contracts.*,school_agents.name as agent_name')->join('schools','school_contracts.school_id','schools.id')->join('school_agents','school_contracts.agent_id','school_agents.id')->with('parent_agent')->with(['agent_commission' =>function($query) use ($agent_id){
            return $query->selectRaw('school_commissions.*,schools.name as school_name,countries.currency_symbol as curr_symbol')->join('schools','schools.id','school_commissions.school_id')->join('countries','countries.id','schools.country_id')->where('school_commissions.agent_id',$agent_id);
        }])->with(['marketing_commission' => function($query) use ($agent_id){
              return $query->selectRaw('school_commissions.*,schools.name as school_name,countries.currency_symbol as curr_symbol')->join('schools','schools.id','school_commissions.school_id')->join('countries','countries.id','schools.country_id')->where('school_commissions.agent_id',$agent_id);
        }])->with(['subagent_commission' => function($query) use ($agent_id){
              return $query->selectRaw('school_commissions.*,schools.name as school_name,countries.currency_symbol as curr_symbol')->join('schools','schools.id','school_commissions.school_id')->join('countries','countries.id','schools.country_id')->where('school_commissions.agent_id',$agent_id);
        }])->where('school_contracts.agent_id',$agent_id);
    }])->where('school_has_agents.agent_id',$request->agent_id)->join('schools','school_has_agents.school_id','schools.id')->orderBy('school_name')->get();
      //$school_contracts = $model::selectRaw('school_contracts.*,schools.name as school_name,school_agents.name as agent_name')->join('schools','school_contracts.school_id','schools.id')->join('school_agents','school_contracts.agent_id','school_agents.id')->with('parent_agent')->where('school_contracts.agent_id',$request->agent_id)->get();


    return view("sekolah.admin.school-agents.contracts-ajax",["has_schools" => $has_schools]);
}

public function contract_schools_ajax(Request $request){
 $schools = School::selectRaw('schools.name,schools.id,schools.address,countries.name as country_name,regions.name as region_name,cities.name as city_name')->join('countries','schools.country_id','=','countries.id')->join('regions','schools.region_id','=','regions.id')->join('cities','schools.city_id','=','cities.id')->where('schools.name','like','%'.$request->q.'%')->orderBy('schools.name')->limit(15)->get();
 return response()->json($schools);
}

public function parent_agent_ajax(Request $request){
    $agents = SchoolAgent::where('id','!=',$request->agent_id)->limit(20)->get();
    return response()->json($agents);
}

public function school_commission_ajax(SchoolCommission $model,Request $request){
    if($request->cmd == "add"){
            $request->merge(['note' => htmlspecialchars($request->note)]);
            $model->create($request->all());
    
  }else if($request->cmd == "update"){
    $request->merge(['note' => htmlspecialchars($request->note)]);
    $model->find($request->id)->update($request->all());
}else if($request->cmd == "delete"){
    $model->find($request->id)->delete();
}

$school_commissions = "";
$school_commissions = SchoolCommission::selectRaw('school_commissions.*,schools.name as school_name')->where('school_id',$request->school_id)->join('schools','schools.id','school_commissions.school_id')->where('school_commissions.agent_id',$request->agent_id)->where('commission_for',$request->commission_for)->get();

$x = $request->commission_index;

return view("sekolah.admin.school-agents.commission-ajax",['school_commissions' => $school_commissions,'x' => $x,'commission_for' => $request->commission_for]);

// return view("sekolah.admin.school-agents.contracts-ajax",["has_schools" => $has_schools]);
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sekolah.admin.school-agents.create',['dashboard' => $this->dashboard]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = SchoolAgent::orderBy('id','DESC')->limit(1)->value('id');
        $id = $id+1;
        $path = "img/schools-agents/".$id;
        $gambar =$request->file('gambar');
        if(!empty($gambar)){
            $ext_gambar = $gambar->getClientOriginalExtension();
      //  $nama_gambar = $gambar->getClientOriginalName();
            $logo = time().$request->name.'.'.$ext_gambar;
            $path_gambar = $gambar->storeAs($path, $logo,'public');
            $request->merge(['logo' => $logo]);
        }
        $request->merge(['note' => htmlspecialchars($request->note)]);
        $agent = SchoolAgent::create($request->all());

        return redirect()->route('school-agent.index')->withStatus(__('School agent successfully created !'));
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
        $agent = SchoolAgent::find($id);
        return view('sekolah.admin.school-agents.edit',['agent' => $agent,'dashboard' => $this->dashboard]);
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

        $path = "img/schools-agents/".$id;
        $gambar =$request->file('gambar');
        if(!empty($gambar)){
            $ext_gambar = $gambar->getClientOriginalExtension();
      //  $nama_gambar = $gambar->getClientOriginalName();
            $logo = time().$request->name.'.'.$ext_gambar;
            $path_gambar = $gambar->storeAs($path, $logo,'public');
            $request->merge(['logo' => $logo]);
        }
        $request->merge(['note' => htmlspecialchars($request->note)]);
        $agent = SchoolAgent::find($id)->update($request->all());

        return redirect()->route('school-agent.index')->withStatus(__('School agent successfully updated !'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $agent = SchoolAgent::find($id)->delete();
       return redirect()->route('school-agent.index')->withStatus(__('School agent successfully deleted !'));
   }
}
