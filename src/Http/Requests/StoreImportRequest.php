<?php

namespace Vcian\LaravelDataBringin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreImportRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'step' => 'integer|between:1,4|nullable'
        ];

        if($this->step == 1) {
            $rules['file'] = 'required|file|mimes:csv,txt';
        }

        return $rules;
    }
}
