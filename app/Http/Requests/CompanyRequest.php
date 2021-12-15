<?php
declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CompanyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'name_company' => ['required', 'min:4', 'string'],
            'picture' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
            'address' => ['required', 'string'],
            'phone_number' => ['required', 'min:9'],
            'email' => ['required', 'email'],

            'user_id' => ['required'],
            'user_id.*' => ['integer', Rule::exists('users', 'id')]
        ];
    }
}
