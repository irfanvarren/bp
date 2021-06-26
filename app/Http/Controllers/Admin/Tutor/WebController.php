<?php

namespace App\Http\Controllers\Admin\Tutor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OnlineTest\OtModule;
use App\Models\OnlineTest\OtTest;
use App\Models\OnlineTest\OtPackage;
use App\Models\OnlineTest\OtSectionType;
use App\Models\OnlineTest\OtTestSection;
use App\Models\OnlineTest\OtSection;
use App\Models\OnlineTest\OtQuestion;
use App\Models\OnlineTest\OtOption;
use App\Models\OnlineTest\OtTestStructure;
use App\Models\OnlineTest\OtTestAnswer;
use App\Models\OnlineTest\OtCurrentTest;
use App\Models\OnlineTest\OtRegistration;
use App\Models\OnlineTest\OtScoreConversionTable;
use DataTables;

use Illuminate\Support\Facades\Storage;
class WebController extends Controller
{
    public function index(){
        $tests = OtTest::paginate(10);
        return view('admin.tutor.dashboard',['tests' => $tests]);
    }
    public function select_module($id){
        $modules = OtModule::where('test_id',$id)->paginate(10);
        return view('admin.tutor.select-modules',['modules' => $modules,'test_id' => $id]);
    }

    public function results(){
        $result = OtCurrentTest::join('ot_registrations','ot_registrations.id','ot_current_tests.registration_id')->get();
        return $result;
    }

    public function result($id){
        $result =  $this->finish_test($id);
        $current_test_id = $id;
        $test_result = OtCurrentTest::selectRaw('ot_current_tests.*,ot_registrations.NAMA,ot_registrations.KOTA_KELAHIRAN,ot_registrations.TGL_LAHIR,ot_registrations.REF_KTP,ot_registrations.ALAMAT,ot_registrations.EMAIL,ot_registrations.KONTAK,ot_registrations.ALASAN,ot_registrations.reseller_id')->leftJoin('ot_registrations','ot_registrations.id','ot_current_tests.registration_id')->find($id);
        $test_id = $test_result->test_id;
        $module_id = $test_result->module_id;
        $package_id = $test_result->package_id;

        $testAnswer = OtTestSection::selectRaw('ot_test_sections.*,ot_section_types.name as section_type_name')->where('ot_test_sections.test_id',$test_id)->where('ot_test_sections.module_id',$module_id)->where('ot_test_sections.package_id',$package_id)->orderBy('id','ASC')->join('ot_section_types','ot_test_sections.section_type_id','=','ot_section_types.id')->with(['sections' => function($query){
            $query->where('ot_sections.type','=','question')->with('structures.questions.answers');
        }])->get();

        $current_test = OtCurrentTest::find($current_test_id);
        $myAnswer = collect(json_decode($current_test->answers));
        return view('online-test.check-answer2',['myAnswer' => $myAnswer,'answer_structure' => $testAnswer,'test_id' => $test_id,'result' => $result,'registration_data' => $test_result]);


    }

    public function test_results(Request $request){
        $test_results = OtRegistration::selectRaw('ot_current_tests.*,ot_tests.name as test_name,ot_modules.name as module_name,ot_packages.name as package_name,ot_registrations.NAMA,ot_registrations.EMAIL')->leftJoin('ot_current_tests','ot_current_tests.registration_id','ot_registrations.id')->join('ot_tests','ot_tests.id','ot_current_tests.test_id')->leftJoin('ot_modules','ot_modules.id','ot_current_tests.module_id')->leftJoin('ot_packages','ot_packages.id','ot_current_tests.package_id')->orderBy('ot_registrations.id','desc')->paginate(10);

        return view('admin.tutor.test-results',['test_results' => $test_results]);
    }

    public function test_results_ajax(Request $request){
         $test_results = OtRegistration::selectRaw('ot_registrations.id,ot_current_tests.test_id,concat(ot_tests.name," - ",ot_modules.name," - ",ot_packages.name) as test_name,ot_registrations.NAMA as name,ot_registrations.EMAIL as email,ot_current_tests.score as score,ot_current_tests.start_time as start_time')->leftJoin('ot_current_tests','ot_current_tests.registration_id','ot_registrations.id')->join('ot_tests','ot_tests.id','ot_current_tests.test_id')->leftJoin('ot_modules','ot_modules.id','ot_current_tests.module_id')->leftJoin('ot_packages','ot_packages.id','ot_current_tests.package_id')->orderBy('ot_registrations.id','ASC')->get();
        return DataTables::of($test_results)->make();
    }

    public function monitoring($id,Request $request){
        $current_test = OtCurrentTest::find($id);
        $json = Storage::disk('public')->get('new-online-test/'.date("Y/m/d",$current_test->start_time).'/'.$id.'/current-test-data.json');
        $json = json_decode($json,true);
        return view('admin.tutor.monitoring',['current_test' => $json]);
    }

    public function select_package(Request $request){
        $test_id = $request->test_id;
        $module_id = $request->module_id;
        $packages = OtPackage::where('test_id',$test_id);
        if($module_id != ""){
            $packages = $packages->where('module_id',$module_id);
        }
        $packages = $packages->orderBy('name','ASC')->paginate(10);
        return view('admin.tutor.select-packages',['packages' => $packages,'test_id' => $test_id,'module_id' => $module_id]);
    }
    public function create_structure(Request $request){
        $test_id = $request->test_id;
        $module_id = $request->module_id;
        $package_id = $request->package_id;
        $test_name = OtTest::where('id',$test_id)->value('name');
        $module_name = null;
        $package_name = null;
        $section_types = OtSectionType::all();
        $test_sections = OtTestSection::where('test_id',$test_id);
        if($module_id != ""){
            $module_name = OtModule::where('id',$module_id)->value('name');
            $test_sections = $test_sections->where('module_id',$module_id);
        }
        if($package_id != ""){
            $package_name = OtPackage::where('id',$package_id)->value('name');   
            $test_sections = $test_sections->where('package_id',$package_id);
        }

        $test_sections = $test_sections->with('section_type:id,name')->with('sections')->with('sections.structures.questions')->get();


        return view('admin.tutor.create-structure',['package_id' => $package_id,'package_name' => $package_name,'module_name' => $module_name,'test_name' => $test_name,'test_id' => $test_id,'module_id' => $module_id,'section_types' => $section_types,'test_sections' => $test_sections]);
    }
    public function section_type_ajax(Request $request){
        $test_id = $request->test_id;
        $module_id = $request->module_id;
        $package_id = $request->package_id;
        $hours = $request->hours_duration;
        $minutes = $request->minutes_duration;
        $seconds = $request->seconds_duration; 
        $duration = ($hours * 3600) + ($minutes * 60) + $seconds;
        $request->merge(['duration' => $duration]);

        if($request->cmd == "add"){
            $section_type_id = $request->section_type; 
            $request->merge(['section_type_id' => $section_type_id]);
            $create_test_section = OtTestSection::create($request->all());
        }else if($request->cmd == "delete"){
            $test_section_id = $request->test_section_id;
            $delete_test_section = OtTestSection::find($test_section_id)->delete();
        }
        $test_sections = OtTestSection::where('test_id', $test_id);
        if($module_id != ""){
            $test_sections = $test_sections->where('module_id',$module_id);
        }
        if($package_id != ""){
            $test_sections = $test_sections->where('package_id',$package_id);

        }
        $test_sections = $test_sections->with('section_type:id,name')->get();

        return view('admin.tutor.section-type-ajax',['test_sections' => $test_sections,'test_id' => $test_id,'module_id' => $module_id,'package_id' => $package_id]);
    }
    public function section_ajax(Request $request){
        $test_section_id = $request->test_section_id;
        $test_id = $request->test_id;
        $module_id = $request->module_id;
        $package_id = $request->package_id;
        $section_index = $request->section_index;
        $test_section_id = $request->test_section_id;
        $type = $request->type;
        if($request->cmd == "add"){
            $create_section = OtSection::create($request->except('_token'));
        }else if($request->cmd == "delete"){
           $delete_section = OtSection::find($request->section_id)->delete();   
       }
       $sections = OtSection::where('test_section_id',$request->test_section_id)->get();
       return view('admin.tutor.section-ajax',['sections' => $sections,'test_section_id' => $test_section_id,'test_id' => $test_id,'module_id' => $module_id,'package_id' => $package_id,'test_section_id' => $test_section_id,'section_index' => $section_index]);
   }
   public function import_data(){
    $test_sections = OtTestSection::with('sections.structures.questions.answers')->where('test_id',1)->where('module_id',11)->where('package_id',27)->where('id',108)->get();
    foreach($test_sections as $test_section){


        foreach($test_section->sections as $section){
            $section->test_section_id = 116;
            $insert_section = OtSection::create(collect($section)->except(['id'])->toArray());
            $section_id = $insert_section->id;
            foreach($section->structures as $structure){
                $structure->package_id = 28;
                $structure->module_id = 12;
                $structure->section_id = $section_id;
                $insert_structure = OtTestStructure::create(collect($structure)->except(['id'])->toArray()); 
                $structure_id = $insert_structure->id;   
                foreach($structure->questions as $question){
                    $question->test_structure_id = $structure_id;
                    $question->package_id = 28;
                    $question->module_id = 12;
                    $question->section_id = $section_id;
                    $insert_question = OtQuestion::create(collect($question)->except(['id'])->toArray());
                    $question_id = $insert_question->id; 
                    foreach($question->answers as $answer){
                        $answer->package_id = 28;
                        $answer->module_id = 12;
                        $answer->test_section_id = 116;
                        $answer->section_id = $section_id;
                        $answer->question_id = $question_id;
                        $insert_answer = OtTestAnswer::create(collect($answer)->except(['id'])->toArray()); 
                    }
                }
            }
        }
    }


    $test_sections = OtTestSection::with('sections.structures.questions.answers')->where('test_id',1)->where('module_id',12)->where('package_id',30)->where('id',117)->get();
    foreach($test_sections as $test_section){


        foreach($test_section->sections as $section){
            $section->test_section_id = 122;
            $insert_section = OtSection::create(collect($section)->except(['id'])->toArray());
            $section_id = $insert_section->id;
            foreach($section->structures as $structure){
                $structure->package_id = 41;
                $structure->module_id = 11;
                $structure->section_id = $section_id;
                $insert_structure = OtTestStructure::create(collect($structure)->except(['id'])->toArray()); 
                $structure_id = $insert_structure->id;   
                foreach($structure->questions as $question){
                    $question->test_structure_id = $structure_id;
                    $question->package_id = 41;
                    $question->module_id = 11;
                    $question->section_id = $section_id;
                    $insert_question = OtQuestion::create(collect($question)->except(['id'])->toArray());
                    $question_id = $insert_question->id; 
                    foreach($question->answers as $answer){
                        $answer->package_id = 41;
                        $answer->module_id = 11;
                        $answer->test_section_id = 122;
                        $answer->section_id = $section_id;
                        $answer->question_id = $question_id;
                        $insert_answer = OtTestAnswer::create(collect($answer)->except(['id'])->toArray()); 
                    }
                }
            }
        }
    }
    #3
    $test_sections = OtTestSection::with('sections.structures.questions.answers')->where('test_id',1)->where('module_id',12)->where('package_id',34)->where('id',128)->get();
    foreach($test_sections as $test_section){

        foreach($test_section->sections as $section){
            $section->test_section_id = 124;
            $insert_section = OtSection::create(collect($section)->except(['id'])->toArray());
            $section_id = $insert_section->id;
            foreach($section->structures as $structure){
                $structure->package_id = 42;
                $structure->module_id = 11;
                $structure->section_id = $section_id;
                $insert_structure = OtTestStructure::create(collect($structure)->except(['id'])->toArray()); 
                $structure_id = $insert_structure->id;   
                foreach($structure->questions as $question){
                    $question->test_structure_id = $structure_id;
                    $question->package_id = 42;
                    $question->module_id = 11;
                    $question->section_id = $section_id;
                    $insert_question = OtQuestion::create(collect($question)->except(['id'])->toArray());
                    $question_id = $insert_question->id; 
                    foreach($question->answers as $answer){
                        $answer->package_id = 42;
                        $answer->module_id = 11;
                        $answer->test_section_id = 124;
                        $answer->section_id = $section_id;
                        $answer->question_id = $question_id;
                        $insert_answer = OtTestAnswer::create(collect($answer)->except(['id'])->toArray()); 
                    }
                }
            }
        }
    }
    #4
    $test_sections = OtTestSection::with('sections.structures.questions.answers')->where('test_id',1)->where('module_id',11)->where('package_id',43)->where('id',120)->get();
    foreach($test_sections as $test_section){


        foreach($test_section->sections as $section){
            $section->test_section_id = 129;
            $insert_section = OtSection::create(collect($section)->except(['id'])->toArray());
            $section_id = $insert_section->id;
            foreach($section->structures as $structure){
                $structure->package_id = 33;
                $structure->module_id = 12;
                $structure->section_id = $section_id;
                $insert_structure = OtTestStructure::create(collect($structure)->except(['id'])->toArray()); 
                $structure_id = $insert_structure->id;   
                foreach($structure->questions as $question){
                    $question->test_structure_id = $structure_id;
                    $question->package_id = 33;
                    $question->module_id = 12;
                    $question->section_id = $section_id;
                    $insert_question = OtQuestion::create(collect($question)->except(['id'])->toArray());
                    $question_id = $insert_question->id; 
                    foreach($question->answers as $answer){
                        $answer->package_id = 33;
                        $answer->module_id = 12;
                        $answer->test_section_id = 129;
                        $answer->section_id = $section_id;
                        $answer->question_id = $question_id;
                        $insert_answer = OtTestAnswer::create(collect($answer)->except(['id'])->toArray()); 
                    }
                }
            }
        }
    }

    #5


    $test_sections = OtTestSection::with('sections.structures.questions.answers')->where('test_id',1)->where('module_id',11)->where('package_id',44)->where('id',121)->get();
    foreach($test_sections as $test_section){


        foreach($test_section->sections as $section){
            $section->test_section_id = 130;
            $insert_section = OtSection::create(collect($section)->except(['id'])->toArray());
            $section_id = $insert_section->id;
            foreach($section->structures as $structure){
                $structure->package_id = 35;
                $structure->module_id = 12;
                $structure->section_id = $section_id;
                $insert_structure = OtTestStructure::create(collect($structure)->except(['id'])->toArray()); 
                $structure_id = $insert_structure->id;   
                foreach($structure->questions as $question){
                    $question->test_structure_id = $structure_id;
                    $question->package_id = 35;
                    $question->module_id = 12;
                    $question->section_id = $section_id;
                    $insert_question = OtQuestion::create(collect($question)->except(['id'])->toArray());
                    $question_id = $insert_question->id; 
                    foreach($question->answers as $answer){
                        $answer->package_id = 35;
                        $answer->module_id = 12;
                        $answer->test_section_id = 130;
                        $answer->section_id = $section_id;
                        $answer->question_id = $question_id;
                        $insert_answer = OtTestAnswer::create(collect($answer)->except(['id'])->toArray()); 
                    }
                }
            }
        }
    }

    echo 'done';
}
public function add_question(Request $request){
    $test_id = $request->test_id;
    $module_id = $request->module_id;
    $package_id = $request->package_id;
    $section_id = $request->section_id;
    $test_section_id = $request->test_section_id;
    $section_type_id = OtTestSection::find($test_section_id)->value('section_type_id');
    $structure = '';
    $test_name = OtTest::where('id',$test_id)->value('name');
    $module_name = OtModule::where('id',$module_id)->value('name');
    $package_name = OtPackage::where('id',$package_id)->value('name');
    $section_name = OtSection::where('id',$section_id)->value('name');
    $section_type_name = OtSectionType::where('id',$section_type_id)->value('name');
    $name = "";
    if($test_name != "" && $test_name != "-"){
        $name = '('.$test_name.')';
    }
    if($module_name != "" && $module_name != "-"){
        $name .= ' - ('.$module_name.')';
    }
    if($package_name != "" && $package_name != "-"){
        $name .= ' - ('.$package_name.')';
    }
    if($section_type_name != "" && $section_type_name != "-"){
        $name .= ' - ('.$section_type_name.')';
    }
    if($section_name != "" && $section_name != "-"){
        $name .= ' - ('.$section_name.')';
    }

    $structure = OtTestStructure::where('test_id',$test_id)->where('module_id',$module_id)->where('package_id',$package_id)->where('section_id',$section_id)->with('single_questions')->with('single_questions.options')->with('single_questions.answers')->orderByRaw('CAST(number as unsigned) ASC')->get();
    
    //$answers = OtTestAnswer::where('test_id',$test_id)->where('module_id',$module_id)->where('package_id',$package_id)->where('section_id',$section_id)->get();
    $test_structure_id = OtTestStructure::orderBy('id','DESC')->limit(1)->value('id');

    $test_structure_id++;

    return view('admin.tutor.add-question',['test_id' => $test_id,'module_id' => $module_id,'package_id' => $package_id,'section_id' => $section_id,'test_section_id' => $test_section_id,'section_type_id' => $section_type_id,'test_structure' => $structure,'test_structure_id' => $test_structure_id/*,'answers' => $answers*/,'name' => $name]);  
}
public function add_question_answers(Request $request){
    /*$answers = $request->answers;
    $clear_previous = OtTestAnswer::where('test_id',$request->test_id)->where('module_id',$request->module_id)->where('package_id',$request->package_id)->where('section_id',$request->section_id)->delete();
    $insert_answer = OtTestAnswer::insert($answers);
    if($insert_answer) {
       return 'true' ;
   }else{
   }  */
   if($request->cmd == "add"){
    if(count($request->input_answers)){
        if(count($request->input_answers) > 1){

        }else{
            $option_answer_id = $request->input_answers[0]['option_answer_id'];

            $request->merge(['option_answer_id' => $option_answer_id]);
            $request->merge(['answer_type' => 'single']);
            $clear_previous = OtTestAnswer::where('question_id',$request->question_id)->delete();
            $create_section = OtTestAnswer::create($request->except('input_answers'));
        }
    }else{


    }
}else if($request->cmd == "update"){

}else if($request->cmd == "delete"){
    $delete_section = OtTestAnswer::where('question_id',$request->question_id)->delete();   
}
$testOption = OtOption::where('question_id',$request->question_id)->get();
$testAnswer = OtTestAnswer::where('question_id',$request->question_id)->where('option_answer_id','!=','')->get();
return view('admin.tutor.add-answer-ajax',['options' => $testOption,'answers' => $testAnswer]);
}

public function add_question_ajax(Request $request){

    $test_id = $request->test_id;
    $package_id = $request->package_id;
    $module_id = $request->module_id;
    $section_id = $request->section_id;
    $question_id = $request->question_id;
    $option_type = $request->option_type;
    $module_name = "";
    $package_name = "";
    if ($request->cmd == "delete"){
        $test_structure_id = $request->test_structure_id;
        $delete_question = OtTestStructure::find($test_structure_id)->delete();
    }else{
     $test_name = OtTest::find($request->test_id)->value('name');
     if($request->module_id != ""){
         $module_name = OtModule::find($request->module_id)->value('name');
     }
     if($request->package_id != ""){
         $package_name = OtPackage::find($request->package_id)->value('name');
     }

     $section_type = OtSectionType::find($request->section_type_id);
     if($section_type){
        $section_type = $section_type->value('name');
    }


    $audio = $request->file_audio;
    $image = $request->file_gambar;
    $path = 'online-test/'.$request->test_id.'/'.$request->module_id.'/'.$request->package_id.'/'.$request->section_id;

    if(!empty($audio)){
        $ext_audio = $audio->getClientOriginalExtension();
        $nama_audio = $audio->getClientOriginalName();
        $path_audio = $audio->storeAs($path."/audio", time().$nama_audio,'public');
        $request->merge(['audio' => $path_audio]);
    }
    if(!empty($image)){
        $ext_image = $image->getClientOriginalExtension();
        $nama_image = $image->getClientOriginalName();
        $path_image = $image->storeAs($path."/image", time().$nama_image,'public');
        $request->merge(['image' => $path_image]);
    }

    $question=$request->question;
    if($question!== null){
        $dom = new \domdocument();
            $dom->loadHtml($question, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD |  LIBXML_NOERROR |        # Suppress any errors
                LIBXML_NOWARNING  );
            $question_images = $dom->getelementsbytagname('img');

            if($question_images !== ""){
                foreach($question_images as $k => $img){
                    $data = $img->getattribute('src');


                if(preg_match('/data:image/', $data)){ // check data apa bentuknya data:image
                    // get the mimetype
                    preg_match('/data:image\/(?<mime>.*?)\;/', $data, $groups); // pecah-pecah data
                    $mimetype = $groups['mime'];
                    
                    list($type, $data) = explode(';', $data);
                    list(, $data)      = explode(',', $data);
                    
                    $data = base64_decode($data);
                    $image_name= time().$k.$mimetype;
                    
                    $path2 = $path.'/'.'image/'.$image_name;
                    
                    Storage::disk('public')->put($path2, $data);
                    
                    $img->removeattribute('src');
                    $img->setattribute('src', Storage::disk('public')->url($path2));
                    $img->removeAttribute('class');
                    $img->setattribute('class','ot-question-img');
                }
            }
        }
        
        $question = $dom->savehtml();
        $request->merge(['question' => $question]);
    }

    $text=$request->text;
    if($text !== null){
        $dom2 = new \domdocument();
        $dom2->loadHtml($text, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD |  LIBXML_NOERROR |        # Suppress any errors
            LIBXML_NOWARNING  );
        $text_images = $dom2->getelementsbytagname('img');
        
        if($text_images !== ""){
            foreach($text_images as $j => $img2){
                $data2 = $img2->getattribute('src');
                
                
                if(preg_match('/data:image/', $data2)){ // check data apa bentuknya data:image
                    // get the mimetype
                    preg_match('/data:image\/(?<mime>.*?)\;/', $data2, $groups2); // pecah-pecah data
                    $mimetype2 = $groups2['mime'];
                    
                    list($type2, $data2) = explode(';', $data2);
                    list(, $data2)      = explode(',', $data2);
                    
                    $data2 = base64_decode($data2);
                    $image_name2= time().$j.$mimetype2;
                    
                    $path3 = $path.'/'.'image/'.$image_name;
                    
                    Storage::disk('public')->put($path3, $data2);
                    
                    $img2->removeattribute('src');
                    $img2->setattribute('src', Storage::disk('public')->url($path3));
                    $img2->removeAttribute('class');
                    $img2->setattribute('class','ot-text-img');
                }
            }
        }

        $text = $dom2->savehtml();
        $request->merge(['text' => $text]);
    }

    if($request->cmd == "add"){
        $test_structure = OtTestStructure::create($request->all());
        $test_structure_id = OtTestStructure::orderBy('id','DESC')->limit(1)->value('id');
        $request->merge(['test_structure_id' => $test_structure_id]);
        $create_question = OtQuestion::create($request->all());
        if($request->options != ""){
            $options = explode('|',$request->options); 
            $arr_options = array();
            foreach($options as $key => $option){
                $arr_options[$key] = ["option" => $option,'question_id' => $create_question->id,'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')];
            }
            $add_options = OtOption::insert($arr_options);
        }
    }else if($request->cmd == "update"){

        $test_structure_id = $request->test_structure_id;

        $update_test_structure = OtTestStructure::find($test_structure_id)->update($request->all());
        if($question_id !="" ){
            $update_question = OtQuestion::find($question_id)->update($request->all());
        }
        if($request->options != ""){
            $delete_options = OtOption::where('question_id',$question_id)->delete();
            $options = explode('|',$request->options);
            $arr_options = array();
            foreach($options as $key => $option){
                $arr_options[$key] = ["option" => $option,'question_id' => $question_id,'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')];
            }
            $add_options = OtOption::insert($arr_options);
        }
    }
}


$structure = OtTestStructure::where('test_id',$test_id)->where('module_id',$module_id)->where('package_id',$package_id)->where('section_id',$section_id)->with('single_questions')->with('single_questions.options')->get();
return view('admin.tutor.add-question-ajax',['test_structure' => $structure]);
}

public function temp_multiple_question_ajax(Request $request){

//$test_structure_id = OtTestStructure::orderBy('id','DESC')->first()->id;

    $test_structure_id = $request->test_structure_id;
    $test_id = $request->test_id;
    $package_id = $request->package_id;
    $module_id = $request->module_id;
    $test_section_id = $request->test_section_id;
    $section_id = $request->section_id;
    $section_type_id = $request->section_type_id;

    $request->merge(['test_structure_id' => $test_structure_id]);
    $path = 'online-test/'.$request->test_id.'/'.$request->module_id.'/'.$request->package_id.'/'.$request->section_id;
    $explanation=$request->explanation;
    if($explanation !== null){
        $dom2 = new \domdocument();
        $dom2->loadHtml($explanation, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD |  LIBXML_NOERROR |        # Suppress any errors
            LIBXML_NOWARNING  );
        $text_images = $dom2->getelementsbytagname('img');
        
        if($text_images !== ""){
            foreach($text_images as $j => $img2){
                $data2 = $img2->getattribute('src');
                
                
                if(preg_match('/data:image/', $data2)){ // check data apa bentuknya data:image
                    // get the mimetype
                    preg_match('/data:image\/(?<mime>.*?)\;/', $data2, $groups2); // pecah-pecah data
                    $mimetype2 = $groups2['mime'];
                    
                    list($type2, $data2) = explode(';', $data2);
                    list(, $data2)      = explode(',', $data2);
                    
                    $data2 = base64_decode($data2);
                    $image_name2= time().$j.$mimetype2;
                    
                    $path3 = $path.'/'.'image/'.$image_name2;
                    
                    Storage::disk('public')->put($path3, $data2);
                    
                    $img2->removeattribute('src');
                    $img2->setattribute('src', Storage::disk('public')->url($path3));
                    $img2->removeAttribute('class');
                    $img2->setattribute('class','ot-explanation-img');
                }
            }
        }
        $explanation = $dom2->savehtml();
        $request->merge(['explanation' => $explanation]);
    }

    if($request->cmd == "add"){

//    $multiple_answer_arr[$key] = ["test_id" => $test_id,"package_id" => $package_id,"module_id" => $module_id,"test_section_id" => $test_section_id, "section_id" => $section_id,"test_structure_id" => $test_structure_id,"question_id" => $multiple_question->id,"answer_type" => "text","explanation" => $multiple_question->explanation,"created_at" => date('Y-m-d H:i:s'),"updated_at" => date('Y-m-d H:i:s')];
        $multiple_answer_arr = [];
        $create_question = OtQuestion::create($request->all());
        $request->merge(['question_id' => $create_question->id]);
        $create_answer = OtTestAnswer::create($request->all());
    }else if($request->cmd == "update"){
        $update_question = OtQuestion::find($request->question_id)->update($request->all());
        $delete_previous_answer = OtTestAnswer::where('question_id',$request->question_id)->delete();
        $create_answer = OtTestAnswer::create($request->all());

    }else if($request->cmd == "delete"){
        $delete_question = OtQuestion::find($request->question_id)->delete();
    }

    $multiple_questions = OtQuestion::where('test_structure_id',$test_structure_id)->with('answers')->get();
    return view("admin.tutor.temp-multiple-question-ajax",["multiple_questions" => $multiple_questions]);
}

public function add_multiple_question_ajax(Request $request){
    $test_id = $request->test_id;
    $package_id = $request->package_id;
    $module_id = $request->module_id;
    $test_section_id = $request->test_section_id;
    $section_id = $request->section_id;
    $section_type_id = $request->section_type_id;
    $multiple_question_id = $request->input_multiple_question_id;
    $test_structure_id = $request->test_structure_id;

    if ($request->cmd == "delete"){
        $test_structure_id = $request->test_structure_id;
        $delete_question = OtTestStructure::find($test_structure_id)->delete();
    }else{
     $test_name = OtTest::find($request->test_id)->value('name');
     $module_name = OtModule::find($request->module_id)->value('name');
     $package_name = OtPackage::find($request->package_id)->value('name');
     $section_type_name = OtSectionType::find($request->section_type_id)->value('name');

     $audio = $request->multiple_file_audio;
     $image = $request->multiple_file_gambar;
     $path = 'online-test/'.$request->test_id.'/'.$request->module_id.'/'.$request->package_id.'/'.$request->section_id;
     if(!empty($audio)){
        $ext_audio = $audio->getClientOriginalExtension();
        $nama_audio = $audio->getClientOriginalName();
        $path_audio = $audio->storeAs($path."/audio", time().$nama_audio,'public');
        $request->merge(['audio' => $path_audio]);
    }
    if(!empty($image)){
        $ext_image = $image->getClientOriginalExtension();
        $nama_image = $image->getClientOriginalName();
        $path_image = $image->storeAs($path."/image", time().$nama_image,'public');
        $request->merge(['image' => $path_image]);
    }

    $multiple_questions = $request->multiple_questions;
    if($multiple_questions !== null){
        $dom = new \domdocument();
        $dom->loadHtml($multiple_questions, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD |  LIBXML_NOERROR |        # Suppress any errors
            LIBXML_NOWARNING  );
        $question_images = $dom->getelementsbytagname('img');
        
        if($question_images !== ""){
            foreach($question_images as $j => $img){
                $data = $img->getattribute('src');
                
                
                if(preg_match('/data:image/', $data)){ // check data apa bentuknya data:image
                    // get the mimetype
                    preg_match('/data:image\/(?<mime>.*?)\;/', $data, $groups); // pecah-pecah data
                    $mimetype = $groups['mime'];
                    
                    list($type, $data) = explode(';', $data);
                    list(, $data)      = explode(',', $data);
                    
                    $data = base64_decode($data);
                    $image_name= 'question'.time().$j.$mimetype;
                    
                    $path2 = $path.'/'.'image/'.$image_name;
                    
                    Storage::disk('public')->put($path2, $data);
                    
                    $img->removeattribute('src');
                    $img->setattribute('src', Storage::disk('public')->url($path2));
                    $img->removeAttribute('class');
                    $img->setattribute('class','ot-text-img');
                }
            }
        }

        $multiple_questions = $dom->savehtml();
        $request->merge(['multiple_questions' => $multiple_questions]);
    }

    $text=$request->text;
    if($text !== null){
        //  dd($body);
        $dom2 = new \domdocument();
        $dom2->loadHtml($text, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD |  LIBXML_NOERROR |        # Suppress any errors
            LIBXML_NOWARNING  );
        $text_images = $dom2->getelementsbytagname('img');
        
        if($text_images !== ""){
            foreach($text_images as $j => $img2){
                $data2 = $img2->getattribute('src');
                
                
                if(preg_match('/data:image/', $data2)){ // check data apa bentuknya data:image
                    // get the mimetype
                    preg_match('/data:image\/(?<mime>.*?)\;/', $data2, $groups2); // pecah-pecah data
                    $mimetype2 = $groups2['mime'];
                    
                    list($type2, $data2) = explode(';', $data2);
                    list(, $data2)      = explode(',', $data2);
                    
                    $data2 = base64_decode($data2);
                    $image_name2= 'text'.time().$j.$mimetype2;
                    
                    $path3 = $path.'/'.'image/'.$image_name2;
                    
                    Storage::disk('public')->put($path3, $data2);
                    
                    $img2->removeattribute('src');
                    $img2->setattribute('src', Storage::disk('public')->url($path3));
                    $img2->removeAttribute('class');
                    $img2->setattribute('class','ot-text-img');
                }
            }
        }

        $text = $dom2->savehtml();
        $request->merge(['text' => $text]);
    }
    if($request->cmd == "add"){
        $test_structure = OtTestStructure::create($request->all());
        $test_structure_id = OtTestStructure::orderBy('id','DESC')->limit(1)->value('id');
        $request->merge(['test_structure_id' => $test_structure_id]);
        if($request->option_type == "options"){
            if($request->options != null){
                $options = explode('|',$request->options); 
                $arr_options = array();
                foreach($options as $key => $option){
                    $arr_options[$key] = ["option" => $option,'question_id' => $create_question->id,'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')];
                }

                $add_options = OtOption::insert($arr_options);
            }
        }else{

        }
  //      $multiple_questions = json_decode($request->multiple_question);
//$multiple_question=explode('|',$request->multiple_question);
/*
        if($multiple_questions){
            $multiple_question_arr = array();
            $multiple_answer_arr = array();
            foreach($multiple_questions as $key => $multiple_question){

                $question = $multiple_question->question;
                if($question != ""){
                    $dom = new \domdocument();
            $dom->loadHtml($question, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD |  LIBXML_NOERROR |        # Suppress any errors
                LIBXML_NOWARNING  );
            $question_images = $dom->getelementsbytagname('img');

            if($question_images !== ""){
                foreach($question_images as $k => $img){
                    $data = $img->getattribute('src');


                if(preg_match('/data:image/', $data)){ // check data apa bentuknya data:image
                    // get the mimetype
                    preg_match('/data:image\/(?<mime>.*?)\;/', $data, $groups); // pecah-pecah data
                    $mimetype = $groups['mime'];
                    
                    list($type, $data) = explode(';', $data);
                    list(, $data)      = explode(',', $data);
                    
                    $data = base64_decode($data);
                    $image_name= time().$k.$mimetype;
                    
                    $path2 = $path.'/'.'image/'.$image_name;
                    
                    Storage::disk('public')->put($path2, $data);
                    
                    $img->removeattribute('src');
                    $img->setattribute('src', Storage::disk('public')->url($path2));
                    $img->removeAttribute('class');
                    $img->setattribute('class','ot-question-img');
                }
            }
        }
        
        $question = $dom->savehtml();
    }
    $multiple_question_arr[$key] = ["question" => $question,"test_structure_id" => $test_structure_id,"section_id" => $section_id,"test_id" => $test_id,"package_id" => $package_id,"module_id" => $module_id,"number" => $multiple_question->number,"created_at" => date('Y-m-d H:i:s'),"updated_at" => date('Y-m-d H:i:s') ];
   
    
    $multiple_answer_arr[$key] = ["test_id" => $test_id,"package_id" => $package_id,"module_id" => $module_id,"test_section_id" => $test_section_id, "section_id" => $section_id,"test_structure_id" => $test_structure_id,"question_id" => $multiple_question->id,"answer_type" => "text","explanation" => $multiple_question->explanation,"created_at" => date('Y-m-d H:i:s'),"updated_at" => date('Y-m-d H:i:s')];
}
$create_question = OtQuestion::insert($multiple_question_arr);
$create_question = OtTestAnswer::insert($multiple_answer_arr);
//dd($multiple_answer_arr);


}*/
}else if($request->cmd == "update"){

  $test_structure = OtTestStructure::find($request->test_structure_id)->update($request->all());
}
}


$structure = OtTestStructure::where('test_id',$test_id)->where('module_id',$module_id)->where('package_id',$package_id)->where('section_id',$section_id)->with('single_questions')->with('single_questions.options')->get();


return view('admin.tutor.add-question-ajax',['test_structure' => $structure]);

}



public function finish_test($id){

    $count = 0;

    $test_result = OtCurrentTest::selectRaw('ot_current_tests.*,ot_registrations.NAMA,ot_registrations.KOTA_KELAHIRAN,ot_registrations.TGL_LAHIR,ot_registrations.REF_KTP,ot_registrations.ALAMAT,ot_registrations.EMAIL,ot_registrations.KONTAK,ot_registrations.ALASAN,ot_registrations.reseller_id')->leftJoin('ot_registrations','ot_registrations.id','ot_current_tests.registration_id')->find($id);
    $test_id = $test_result->test_id;
    $module_id = $test_result->module_id;
    $package_id = $test_result->package_id;

    $myAnswer = collect(json_decode($test_result->answers));
    $test_structure = OtTestSection::selectRaw('ot_test_sections.*,ot_section_types.name as section_type_name')->where('ot_test_sections.test_id',$test_id)->where('ot_test_sections.module_id',$module_id)->where('ot_test_sections.package_id',$package_id)->orderBy('id','ASC')->join('ot_section_types','ot_test_sections.section_type_id','=','ot_section_types.id')->with('sections.structures.questions.options')->get();
    $correct_answer = collect(['test_id' => $test_id,'module_id' => $module_id,'package_id' => $package_id]);
    $temp_correct_answer = collect();
    $nilai = collect();
    $total_score = 0;
    $count_question = 0;
    $current_test_id = $id;
    $current_test = OtCurrentTest::selectRaw('ot_current_tests.*,ot_registrations.NAMA,ot_registrations.KOTA_KELAHIRAN,ot_registrations.TGL_LAHIR,ot_registrations.REF_KTP,ot_registrations.ALAMAT,ot_registrations.EMAIL,ot_registrations.KONTAK,ot_registrations.ALASAN')->leftJoin('ot_registrations','ot_registrations.id','ot_current_tests.registration_id')->where('ot_current_tests.id',$current_test_id)->first();

    $nama = $current_test->nama;
    $test_name = OtTest::where('id',$test_id)->value('name');

    $no = 0;
    if(count($myAnswer)){
        foreach($test_structure as $keyTestSection => $test_section){ 

            foreach($test_section->sections->where('type','!=','introduction') as $keySection => $section){
                foreach($section->structures as $keyStructure => $structure){

                    $count_question += $structure->questions->count();


                    foreach($structure->questions as $keyQuestion => $question){
                        if($test_section->test_id == "2"){
                          if($myAnswer[$no]->answer_id != "" && $question->id != ""){ 
                            $check_answer = OtTestAnswer::where('question_id',$question->id)->where('option_answer_id',$myAnswer[$no]->answer_id)->count();
                            if($check_answer){
                                $count ++ ;

                            }


                        }
                        $answers = "";


                    }else{
                        if($structure->option_type != "essay"){
                            $multiple_answer = OtTestAnswer::where('question_id',$question->id)->first();
                            if($multiple_answer){
                                $multiple_answer = $multiple_answer->answers;
                            }else{
                                $multiple_answer = "";
                            }

                            $multiple_answer_arr = explode('|',$multiple_answer);
                            foreach($multiple_answer_arr as $answer){  
                                if($myAnswer[$no]->answers == $answer){
                                    $count++;
                                }
                                $answers = $question->answer;
                            }
                        }else{
                            $answers = $myAnswer[$no]->answers;

                        }

                    }

                    $myAnswer->push(['current_test_id'=> $current_test_id,'test_id' => $test_section->test_id,'module_id' => $test_section->module_id,'package_id' => $test_section->package_id,'test_section_id' => $test_section->id,'section_id' => $section->id,'question_id' => $question->id,'answer_id' => $structure->answer_id,'answers' => $answers,'option_type' => $question->option_type]);
                    $no ++;
                }

            }
        }
        if($test_section->test_id == "1"){
       // SELECT * FROM ot_score_conversion_tables WHERE (CASE WHEN  (score > 30) AND (section_type_id = 1) THEN score > 30 ELSE  score > 40 AND score <  50  END)  
            $score = OtScoreConversionTable::where('test_id',$test_section->test_id)->where('module_id',$test_section->module_id)->where('section_type_id',$test_section->section_type_id)->whereRaw('
                (CASE WHEN start_correct IS NOT NULL AND end_correct IS NOT NULL THEN '.$count.' between start_correct AND end_correct WHEN start_correct IS NOT NULL AND end_correct IS NULL THEN start_correct = '.$count.' ELSE id = "" END)')->value('score');  
            if(!$score){
                $score = 2;
            }
            $temp_correct_answer->push(['name' => $test_section->section_type_name,'correct_answer' => $count,'total_questions' => $count_question,'score' => $score]); 
            $total_score += $score;
            $count = 0;
            $count_question = 0;  
        }elseif($test_section->test_id == "2"){
            $score = OtScoreConversionTable::where('test_id', $test_section->test_id)->where('correct_answer',$count)->where('section_type_id',$test_section->section_type_id)->value('score');
            $temp_correct_answer->push(['name' => $test_section->section_type_name,'correct_answer' => $count,'total_questions' => $count_question,'score' => $score]);       
            $total_score += $score;
            $count = 0;
            $count_question = 0;  

        }else{
            $temp_correct_answer->push(['name' => $test_section->section_type_name,'correct_answer' => $count,'total_questions' => $count_question,'score' => $count]);
            $total_score += $count;
            $count = 0;
            $count_question = 0;
        }
    }   
}

$correct_answer->put('score_result',$temp_correct_answer);
$correct_answer->put('total_score',$total_score);   
session()->put('test-result',$correct_answer);

return $correct_answer;
}


}
