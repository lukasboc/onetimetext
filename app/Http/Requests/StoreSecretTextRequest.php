<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSecretTextRequest extends FormRequest
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
    public function messages(): array
    {
        return [
            'expires_in_days.required_if' => 'Bitte gib eine Anzahl Tage an.',
            'expires_in_days.min'         => 'Mindestens 1 Tag.',
            'expires_in_days.max'         => 'Maximal 365 Tage.',
        ];
    }

    public function rules()
    {
        $max = $this->user()?->subscribed() ? 10000 : 2000;

        return [
            //Key cant be checked here, because its set after
            //'key' => 'required|max:255|min:4|unique:texts',
            'value'           => "required|min:1|max:{$max}",
            'notify_on_read'  => 'sometimes|boolean',
            'expires_in'      => 'nullable|string|in:72,168,336,720,custom',
            'expires_in_days' => 'nullable|integer|min:1|max:365|required_if:expires_in,custom',
        ];
    }
}
