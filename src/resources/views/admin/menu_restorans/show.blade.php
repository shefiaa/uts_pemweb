@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.menu_restoran.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.menu_restorans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.menu_restoran.fields.id') }}
                        </th>
                        <td>
                            {{ $menu_restoran->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.menu_restoran.fields.foodname') }}
                        </th>
                        <td>
                            {{ $menu_restoran->foodname }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.menu_restoran.fields.drinkname') }}
                        </th>
                        <td>
                            {{ $menu_restoran->drinkname }}
                        </td>
                    </tr>
                    <th>
                        {{ trans('cruds.menu_restoran.fields.price') }}
                    </th>
                    <td>
                        {{ $menu_restoran->price }}
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.menu_restorans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection