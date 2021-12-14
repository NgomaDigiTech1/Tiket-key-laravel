<?php
declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DriverRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => ['required', 'min:4', 'string'],
            'name' => ['required', 'min:4', 'string'],
            'age' => ['required', 'integer'],
            'phone_number' => ['required', 'min:9'],
            'picture' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg'],

            'company_id' => ['required'],
            'company_id.*' => ['integer', Rule::exists('companies', 'id')]
        ];
    }
}
