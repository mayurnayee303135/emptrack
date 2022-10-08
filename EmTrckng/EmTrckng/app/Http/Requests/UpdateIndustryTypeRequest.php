<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\IndustryType;

class UpdateIndustryTypeRequest extends FormRequest
{

    /**
     * Determine if the category is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = IndustryType::$rules;
        return $rules;
    }
}
