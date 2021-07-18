<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;


class LoginRequest extends FormRequest
{

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
            'email' => 'required|email',
            'password' => 'required'
        ];
    }

    // /**
    //  * Format the errors from the given Validator instance.
    //  *
    //  * @param  \Illuminate\Contracts\Validation\Validator  $validator
    //  */
    // protected function formatErrors(Validator $validator)
    // {
    //     if ($validator->fails()) {
    //         return redirect('login')
    //         ->withErrors($validator)
    //         ->with(['message'=>'Please Correct below givern Errors!']);
    //     }
    // }

}
