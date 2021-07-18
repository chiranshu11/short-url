<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
// use Illuminate\Validation\Rules\Password;
use App\Rules\Password;

class RegistrationRequest extends FormRequest
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
        if($this->isMethod('post')){
            return [
                'name' => 'required|min:3',
                'email' => [
                    'required',
                    Rule::unique('users', 'email')
                ],
                'password' => [
                    'required',
                    (new Password())->min(6)
                        ->numbers()
                        ->symbols()
                ]
            ];
        }
        return [];
    }

    /**
     * Format the errors from the given Validator instance.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     */
    // protected function formatErrors(Validator $validator)
    // {
    //     if($this->isMethod('post')){
    //         if ($validator->fails()) {
    //             return redirect('register')
    //             ->withErrors($validator)
    //             ->with(['message'=>'Please Correct below givern Errors!']);
    //         }
    //     }
    // }
}
