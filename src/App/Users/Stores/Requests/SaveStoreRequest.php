<?php

namespace App\Users\Stores\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = $this->user();

        if ($this->store && $this->store->company_id !== $user->company->id) {
            return false;
        }

        return $user->can('manage stores');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'address' => 'required',
        ];
    }
}
