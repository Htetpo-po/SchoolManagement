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
     public function rules()
{
    return [
        'name' => 'required|min:3',
        'father' => 'required',
        'mother' => 'required',
        'classroom_id' => 'required',
        'phone_no' => 'required|digits:10',
        'address' => 'required'
    ];
}
public function messages()
{
    return [
        'name.required' =>'နာမည်အကွက်ကို ဖြည့်ရန် လိုအပ်ပါသည်။',
        'name.min' => 'နာမည်အကွက်ကို အနည်းဆုံး ၃ လုံးဖြည့်ရန် လိုအပ်ပါသည်။',
        'father.required' => 'ဖခင် အကွက်ကို ဖြည့်ရန် လိုအပ်ပါသည်။',
        'mother.required' => 'မိခင် အကွက်ကို ဖြည့်ရန် လိုအပ်ပါသည်။',
        'classroom_id.required' => 'အတန်း အကွက်ကို ဖြည့်ရန် လိုအပ်ပါသည်။',
        'phone_no.required' => 'ဖုန်းနံပါတ် အကွက်ကို ဖြည့်ရန် လိုအပ်ပါသည်။',
        'phone_no.digits' => 'ဖုန်းနံပါတ်ကို ၁၀ လုံးဖြည့်ရန် လိုအပ်ပါသည်။',
        'address.required' => 'လိပ်စာ အကွက်ကို ဖြည့်ရန် လိုအပ်ပါသည်။',
    ];
}
}