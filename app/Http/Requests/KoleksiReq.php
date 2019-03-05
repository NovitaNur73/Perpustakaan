<?php

namespace App\Http\Requests;
use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class KoleksiReq extends FormRequest
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
            
            'tgl_pengadaan'=>'required',
            'akses'=>'required',
            'kd_rak'=>'required',
            'sumber'=>'required',
            'status'=>'required',
            
        ];
    }
    public function messages()
    {
        return[
            'required'=>':attribute wajib diisi!!!',
            'numeric'=>':attribute harus diisi angka!!',
            'email'=>'attribute harus diisi!!!',
        ];
    }
}
