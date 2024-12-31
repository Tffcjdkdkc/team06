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
            'actual_population_served' => 'required|numeric|min:0|lte:population_in_served_area',
            'date_time' => 'required|date',
            'executing_unit' => 'required|string|max:255',
            'percentage_of_population_served' => 'required|numeric|min:0|max:100',
            'population_in_served_area' => 'required|numeric|min:0',
            'remarks' => 'nullable|string|max:500',
        ];
    }

    public function messages()
    {
        return [
            'actual_population_served.required' => '請輸入實際供水人口。',
            'actual_population_served.numeric' => '實際供水人口必須是數字。',
            'actual_population_served.min' => '實際供水人口不能為負數。',
            'actual_population_served.lte' => '實際供水人口不能超過供水區域人口。',
            
            'date_time.required' => '請選擇日期和時間。',
            'date_time.date' => '請輸入有效的日期格式。',
    
            'executing_unit.required' => '請選擇執行單位。',
            'executing_unit.max' => '執行單位名稱不能符超過 255 個字。',
    
            'percentage_of_population_served.required' => '供水人口比例自動計算(請輸入實際供水人口和輸入供水區域人口)。',
            'percentage_of_population_served.numeric' => '供水人口比例必須為數字。',
            'percentage_of_population_served.min' => '供水人口比例不能小於 0%。',
            'percentage_of_population_served.max' => '供水人口比例不能超過 100%。',
    
            'population_in_served_area.required' => '請輸入供水區域人口。',
            'population_in_served_area.numeric' => '供水區域人口必須是數字。',
            'population_in_served_area.min' => '供水區域人口不能為負數。',
    
            'remarks.max' => '備註內容不能超過 500 字。'

            
        ];
    }
}
