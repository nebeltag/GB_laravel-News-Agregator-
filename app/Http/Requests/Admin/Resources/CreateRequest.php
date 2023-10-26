<?php

namespace App\Http\Requests\Admin\Resources;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'resource_title' => ['required', 'string', 'unique:resources', 'min:3', 'max:150'],
            'resource_url' => ['required', 'url', 'unique:resources','max:200'],
        ];
    }

    public function attributes(): array
    {
        return [
            'resource_title' => 'Наименование ресурса',
            'resource_url' => 'URL ресурса',
        ];
    }
}
