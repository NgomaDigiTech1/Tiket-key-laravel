<?php
declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'min:4'],
            'first_name' => ['required', 'string', 'min:4'],
            'picture' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
            'email' => ['required', 'min:4', 'unique:users', 'email'],
            'birthdays' => ['required', 'date:Y-m-d', 'before:'.now()->addYears(18)->toDateString()],
            'password' => ['required', 'min:6'],
            'phone_number' => ['required', 'min:9'],

            'role_id' => ['required'],
            'role_id.*' => ['integer', Rule::exists('roles', 'id')]
        ];
    }
}
