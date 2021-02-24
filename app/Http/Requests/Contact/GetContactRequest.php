<?php

namespace App\Http\Requests\Contact;

use App\Models\API\Contact;
use Illuminate\Foundation\Http\FormRequest;

class GetContactRequest extends FormRequest
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
        $contact = Contact::find($this->id);
        return $contact;
    }
}
