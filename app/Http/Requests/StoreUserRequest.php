<?php

namespace App\Http\Requests;
//自分のファイル内に読み込む（インポートする）ための記述。
use Illuminate\Foundation\Http\FormRequest;
// FormRequestを継承して、StoreUserRequestという専用チェッククラスを定義
class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // このリクエストを実行する権限があるかを判定するメソッド
    //authorize フォームリクエストクラスの中に定義し、戻り値として true（許可）または false（拒否）を返す
    public function authorize()
    {
        return true;
    }
    //rulesメソッドでバリデーションルールを定義します。
    public function rules()
    {
        return [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users',
            //パスワードは必須、最小8文字、確認用と一致します。confirmedはpassword_confirmationフィールドとの一致をチェックします。
            'password' => 'required|min:8|confirmed',        
        ];
    }
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
   
    public function messages()//messagesメソッドでカスタムエラーメッセージを定義
    {
    return [
        'name.required' => '名前は必須です',
        'name.max' => '名前は50文字以内で入力してください',
        'email.required' => 'メールアドレスは必須です',
        'email.email' => 'メールアドレスの形式が正しくありません',
        'email.unique' => 'このメールアドレスは既に使用されています',
        'password.required' => 'パスワードは必須です',
        'password.min' => 'パスワードは8文字以上で入力してください',
        'password.confirmed' => 'パスワードが一致しません',
    ];
}
}
