<?php

namespace App\Users\Stores\Requests;

use Domain\Stores\Models\Store;
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
        if ($this->store->id == null) {
            return $this->user()->can('create', Store::class);
        } else {
            return $this->user()->can('update', $this->store);
        }
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
