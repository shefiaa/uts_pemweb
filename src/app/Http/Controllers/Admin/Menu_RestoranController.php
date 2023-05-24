<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMenu_RestoranRequest;
use App\Http\Requests\StoreMenu_RestoranRequest;
use App\Http\Requests\UpdateMenu_RestoranRequest;
use App\Models\Menu_Restoran;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class Menu_RestoranController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('menu_restoran_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Menu_Restoran::query()->select(sprintf('%s.*', (new Menu_Restoran)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'menu_restoran_show';
                $editGate      = 'menu_restoran_edit';
                $deleteGate    = 'menu_restoran_delete';
                $crudRoutePart = 'menu_restorans';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('foodname', function ($row) {
                return $row->foodname? $row->foodname : '';
            });
            $table->editColumn('drinkname', function ($row) {
                return $row->drinkname ? $row->drinkname : '';
            });
            $table->editColumn('price', function ($row) {
                return $row->price ? $row->price : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.menu_restorans.index');
    }

    public function create()
    {
        abort_if(Gate::denies('menu_restoran_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.menu_restorans.create');
    }

    public function store(StoreMenu_RestoranRequest $request)
    {
        $menu_restoran = Menu_Restoran::create($request->all());

        return redirect()->route('admin.menu_restorans.index');
    }

    public function edit(Menu_Restoran $menu_restoran)
    {
        abort_if(Gate::denies('menu_restoran_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.menu_restorans.edit', compact('menu_restoran'));
    }

    public function update(UpdateMenu_RestoranRequest $request, Menu_Restoran $menu_restoran)
    {
        $menu_restoran->update($request->all());

        return redirect()->route('admin.menu_restorans.index');
    }

    public function show(Menu_Restoran $menu_restoran)
    {
        abort_if(Gate::denies('menu_restoran_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.menu_restorans.show', compact('menu_restoran'));
    }

    public function destroy(Menu_Restoran $menu_restoran)
    {
        abort_if(Gate::denies('menu_restoran_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $menu_restoran->delete();

        return back();
    }

    public function massDestroy(MassDestroyMenu_RestoranRequest $request)
    {
        $menu_restorans = Menu_Restoran ::find(request('ids'));

        foreach ($menu_restorans as $menu_restoran) {
            $menu_restoran->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}