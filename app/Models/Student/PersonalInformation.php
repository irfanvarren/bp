<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Model;

class PersonalInformation extends Model
{
    protected $table = "student_personal_informations";

    protected $fillable = [
    	'student_id','client_id','visa_country','title','name','date_of_birth','status','phone_number','homecountry_country','homecountry_address','homecountry_suburb','homecountry_state','homecountry_postcode','primary_email','secondary_email','usi','tfn','current_address','current_country','current_suburb','current_state','current_postcode','ktp','gender','signature'
    ];

    public function student(){
    	return $this->belongsTo('App\Student','student_id');
    }
}
