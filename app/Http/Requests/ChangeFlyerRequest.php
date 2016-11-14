<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Flyer;

class ChangeFlyerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
      return Flyer::where([
        'zip' => $this->zip,
        'street' => $this->street,
        'user_id' => \Auth::user()->id
      ])->exists();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'photo' => 'required|mimes:jpg,jpeg,png'
        ];
    }
}
