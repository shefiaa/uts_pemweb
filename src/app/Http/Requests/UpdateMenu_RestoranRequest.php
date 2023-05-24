<?php

namespace App\Http\Requests;

use App\Models\Menu_Restoran;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMenu_RestoranRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('menu_restoran_edit');
    }

    public function rules()
    {
        return [
            'foodname' => [
                'string',
                'required',
            ],
            'drinkfood' => [
                'string',
                'required',
            ],
            'price' => [
                'string',
                'required',
        ];
    }
}
