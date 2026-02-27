<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
        'role' => 'required',
        'classroom_id' => 'required',
        'subject' => 'required',
        'salary' => 'required|numeric',
        'phone_no' => 'required|digits:10',
        'address' => 'required'
    ];
}
public function messages()
{
    return [
        'name.required' =>'နာမည်အကွက်ကို ဖြည့်ရန် လိုအပ်ပါသည်။',
        'name.min' => 'နာမည်အကွက်ကို အနည်းဆုံး ၃ လုံးဖြည့်ရန် လိုအပ်ပါသည်။',
        'role.required' => 'ရာထူး အကွက်ကို ဖြည့်ရန် လိုအပ်ပါသည်။',
        'classroom_id.required' => 'အတန်း အကွက်ကို ဖြည့်ရန် လိုအပ်ပါသည်။',
        'subject.required' => 'ဘာသာရပ် အကွက်ကို ဖြည့်ရန် လိုအပ်ပါသည်။',
        'salary.required' => 'လစာ အကွက်ကို ဖြည့်ရန် လိုအပ်ပါသည်။',
        'salary.numeric' => 'လစာ အကွက်ကို ဂဏန်းဖြင့် ဖြည့်ရန် လိုအပ်ပါသည်။',
        'phone_no.required' => 'ဖုန်းနံပါတ် အကွက်ကို ဖြည့်ရန် လိုအပ်ပါသည်။',
        'phone_no.digits' => 'ဖုန်းနံပါတ်ကို ၁၀ လုံးဖြည့်ရန် လိုအပ်ပါသည်။',
    ];
}
}
