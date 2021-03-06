<?php

namespace App\Http\Requests\User;

use App\Models\API\AppUser;
use Illuminate\Foundation\Http\FormRequest;

class GetAllUserRequest extends FormRequest
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
            //
        ];
    }

    public function handle()
    {
        $user = AppUser::with('country');
        if(isset($this->user_id)){
            $user = $user->where('id', $this->user_id);
        }
        return $user->get();
    }
}
