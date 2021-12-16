<?php
declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TownRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name_town' => ['required', 'min:3', 'string'],

            'company_id' => ['required'],
            'company_id.*' => ['integer', Rule::exists('companies', 'id')]
        ];
    }
}
