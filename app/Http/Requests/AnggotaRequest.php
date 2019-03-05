<?php

namespace App\Http\Requests;
use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class AnggotaValReq extends FormRequest
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
            'nama'=>'required',
            'tempat'=>'required',
            'tgl_lahir'=>'required',
            'jk'=>'required',
            'alamat'=>'required',
            'telp'=>'required|numeric',
            'kota'=>'required',
            'email'=>'required|email',
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
