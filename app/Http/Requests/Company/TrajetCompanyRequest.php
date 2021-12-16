<?php
declare(strict_types=1);

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TrajetCompanyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'starting_city' => ['required', Rule::exists('towns', 'name_town')],
            'arrival_city' => ['required', Rule::exists('towns', 'name_town')],
            'prices' => ['required', 'integer', 'min:3'],
            'start_time' => ['required', 'date_format:H:i'],
            'arrival_time' => ['required', 'date_format:H:i'],
        ];
    }
}
