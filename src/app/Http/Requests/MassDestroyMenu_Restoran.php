<?php

namespace App\Http\Requests;

use App\Models\Menu_Restoran;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMenu_RestoranRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('menu_restoran_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:menu_restorans,id',
        ];
    }
}
