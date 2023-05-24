<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMenu_RestoranRequest;
use App\Http\Requests\UpdateMenu_RestoranRequest;
use App\Http\Resources\Admin\Menu_RestoranResource;
use App\Models\Menu_Restoran;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Menu_RestoranApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('menu_restoran_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new Menu_RestoranResource(Menu_Restoran::all());
    }

    public function store(StoreMenu_RestoranRequest $request)
    {
        $menu_restoran = Menu_Restoran::create($request->all());

        return (new Menu_RestoranResource($menu_restoran))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Menu_Restoran $menu_restoran)
    {
        abort_if(Gate::denies('menu_restoran_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new Menu_RestoranResource($menu_restoran);
    }

    public function update(UpdateMenu_RestoranRequest $request, Menu_Restoran $menu_restoran)
    {
        $menu_restoran->update($request->all());

        return (new Menu_RestoranResource($menu_restoran))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Menu_Restoran $menu_restoran)
    {
        abort_if(Gate::denies('menu_restoran_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $menu_restoran->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}