<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
     return [
        "name"=> "required",
        "active"=> "required",
        "phone"=> "required",
        "nationalID"=> "required",
        ];
    }
    public function messages(): array{
        return [
            "name.required"=> "اسم الكورس مطلوب",
            "active.required"=>"حالة التفعيل مطلوبة",
            "phone.required"=>"رقم الهاتف مطلوب",
            "nationalID.required"=>"رقم الهوية مطلوب",
        ];
    }
}
