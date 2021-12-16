<?php
declare(strict_types=1);

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BusCompanyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'code_bus' => ['required', 'min:4', 'string'],
            'place_number' => ['required', 'min:4', 'integer'],
            'colors' => ['required'],

            'driver_id' => ['required'],
            'driver_id.*' => ['integer', Rule::exists('drivers', 'id')]
        ];
    }
}
