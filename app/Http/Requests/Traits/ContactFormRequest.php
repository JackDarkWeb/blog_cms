<?php


namespace App\Http\Requests\Traits;


use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

trait ContactFormRequest
{
    /**
     * @param $request
     * @return MessageBag|null
     */
    public function contactValidate($request){

        $validate = Validator::make($request->all(), $this->rules());

        if($validate->fails())

            return $validate->errors();

        return null;
    }

    /**
     * @return \string[][]
     */
    private function rules(){

        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'email:rfc,dns,filter', 'max:255'],
            'message' => ['required', 'string'],
        ];
    }
}
