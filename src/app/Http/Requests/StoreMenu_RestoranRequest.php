<?php

namespace App\Http\Requests;

use App\Models\Menu_Restoran;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMenu_RestoranRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('menu_restoran_create');
    }

    public function rules()
    {
        return [
            'foodname' => [
                'string',
                'required',
            ],
            'drinkname' => [
                'string',
                'required',
            ],
            'price' => [
                'string',
                'required',
            ],
        ];
    }
}
