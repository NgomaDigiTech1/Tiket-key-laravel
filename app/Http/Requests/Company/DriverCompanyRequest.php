<?php
declare(strict_types=1);

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DriverCompanyRequest extends FormRequest
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
            'phone_number' => ['required', 'min:9', 'unique:drivers'],
            'picture' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
            'address' => ['required', 'min:5'],
        ];
    }
}
