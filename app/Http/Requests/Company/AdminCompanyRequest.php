<?php
declare(strict_types=1);

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminCompanyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'min:4'],
            'first_name' => ['required', 'string', 'min:4'],
            'picture' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6'],
            'phone_number' => ['required', 'min:9'],
        ];
    }
}

