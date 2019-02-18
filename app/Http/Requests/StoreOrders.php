<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrders extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'prod_id'=>'required|unique|max:255',
            'sasia'=>'required'
        ];
    }


    public function messages() {
       return [
           'prod_id.required'=>'Nuk egziston produkt per kete order',
           'sasia.required'=>'Nuk ke vendos id'
        ];
    }
}
