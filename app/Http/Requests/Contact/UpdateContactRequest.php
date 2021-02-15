<?php

namespace App\Http\Requests\Contact;

use App\Models\API\Contact;
use Illuminate\Foundation\Http\FormRequest;

class UpdateContactRequest extends FormRequest
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
        $params = $this->all();

        // dd($this->id, $params['id']);
        $id = $params['id'];
        $contact = Contact::where('id', $id)->first();
        if (isset($params['status'])) {
            $contact->status = $params['status'];
        }
        $contact->save();

        return $contact;
    }
}
