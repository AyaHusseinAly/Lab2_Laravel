<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\User;


class UpdatePostRequest extends FormRequest
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
        $users=User::all();
        $users_str="";
        foreach($users as $user){
            $users_str.=$user->id;
            $users_str.=',';
        }
   
        return [
             'title' => ['required', Rule::unique('posts','title')->ignore($this->post)],
             'description' => ['required','min:10'],
             'user_id'=>"required|in:$users_str"
         ];
    }
}
