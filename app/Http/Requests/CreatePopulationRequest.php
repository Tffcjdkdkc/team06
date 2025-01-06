<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePopulationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
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
        return [
            'ExecutingUnit' => 'required|string|max:255',
            'DateTime' => 'required|date',
            'ActualPopulationServed' => 'required|numeric|min:0|lte:PopulationInServedArea', // Ensure it doesn't exceed the served area
            'PercentageOfPopulationServed' => 'required|numeric|max:100',
            'PopulationInServedArea' => 'required|numeric|min:1', // Ensure population is at least 1 (greater than zero)
            'Remarks' => 'nullable|string|max:500',
        ];
    }

    public function messages()
    {
        return [
            'ExecutingUnit.required' => '請選擇執行單位。',
            'DateTime.required' => '請選擇日期和時間。',
            'ActualPopulationServed.required' => '請輸入實際供水人口。',
            'ActualPopulationServed.numeric' => '實際供水人口必須是數字。',
            'ActualPopulationServed.min' => '實際供水人口不能為負數。',
            'ActualPopulationServed.lte' => '實際供水人口不能超過供水區域人口。',
            'PercentageOfPopulationServed.required' => '供水人口比例自動計算(請輸入實際供水人口和供水區域人口)。',
            'PercentageOfPopulationServed.numeric' => '供水人口比例必須為數字。',
            'PercentageOfPopulationServed.max' => '供水人口比例不能超過 100%。',
            'PopulationInServedArea.required' => '請輸入供水區域人口。',
            'PopulationInServedArea.numeric' => '供水區域人口必須是數字。',
            'PopulationInServedArea.min' => '供水區域人口必須大於 0。',
            'Remarks.max' => '備註內容不能超過 500 字。',
        ];
    }
}
