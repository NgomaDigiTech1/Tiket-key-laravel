<?php
declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BusRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'code_bus' => ['required', 'min:4', 'string'],
            'place_number' => ['required', 'min:4', 'integer'],
            'colors' => ['required'],

            'company_id' => ['required'],
            'company_id.*' => ['integer', Rule::exists('companies', 'id')],

            'driver_id' => ['required'],
            'driver_id.*' => ['integer', Rule::exists('drivers', 'id')]
        ];
    }
}
