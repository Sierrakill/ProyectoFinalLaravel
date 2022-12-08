<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'lastname'=>'required',
            'rol'=>'required|integer|min:0|max:2',
            'avatar'=>'required|image|mimes:png,jpeg,svg,jpg|max:2048',
            'phone_number'=>'required|min:8|max:14',
            'email'=>'required',
            'password'=>'required|min:8'
        ];
    }
}
