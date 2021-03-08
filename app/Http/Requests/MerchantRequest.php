<?php

namespace App\Http\Requests;

use App\MerchantProductsModel;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class MerchantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
      return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
    public function getValidatorInstance()
    {
    $this->check_status();
    return  parent::getValidatorInstance();
  }
    protected function check_status(){
      if($this->status == 'on'){
        $cek = 1;
      }else{
          $cek = 0;
      }
      $this->merge(['status' => $cek]);

      
    }
}
