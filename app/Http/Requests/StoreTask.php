<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTask extends FormRequest
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
            "name" => "required",
            "due_date" => "required",
            "assignee" => "required",
            "project_id" => "required",
        ];
    }

    /**
     * override to have a customized message
     * 
     * @return array
     */
    public function messages()
    {
        return [
            "name.required" => __('task.name_required'),
            "due_date.required" => __('task.due_date_required'),
            "assignee" => __('task.assignee_required')
        ];
    }
}
