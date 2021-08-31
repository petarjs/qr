<?php

namespace App\Users\Menus\Requests;

use Domain\Menus\Models\Menu;
use Illuminate\Foundation\Http\FormRequest;

class SaveMenuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (optional($this->menu)->id == null) {
            return $this->user()->can('create', Menu::class);
        } else {
            return $this->user()->can('update', $this->menu);
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
        ];
    }
}
