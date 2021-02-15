<?php

namespace App\Http\Requests\Notification;

use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class CreateNotificationRequest extends FormRequest
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
            'message_title' => ['required'],
            'message_body'  =>  ['required'],
            'url'   =>  ['required'],
            'image' =>  ['required']
        ];
    }

    public function handle()
    {
        $params = $this->all();
        $notification = new Notification();
        $notification->title = $params['message_title'];
        $notification->description = $params['message_body'];
        $notification->url = $params['url'];
        if($this->hasFile('image'))
        {
            $image_path = $this->file('image')->store('uploads/images');
            $notification->image = $image_path;
        }
        $notification->date = Carbon::now();
        $notification->save();
        return $notification;
        
    }
}
