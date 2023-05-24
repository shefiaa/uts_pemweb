@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.menu_restoran.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.menu_restorans.update", [$fmenu_restorans->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="foodname">{{ trans('cruds.menu_restoran.fields.foodname') }}</label>
                <input class="form-control {{ $errors->has('foodname') ? 'is-invalid' : '' }}" type="text" name="foodname" id="foodname" value="{{ old('foodname', $menu_restoran->foodname) }}" required>
                @if($errors->has('foodname'))
                    <div class="invalid-feedback">
                        {{ $errors->first('foodname') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.menu_restoran.fields.foodname_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="drinkname">{{ trans('cruds.menu_restoran.fields.drinkname') }}</label>
                <input class="form-control {{ $errors->has('drinkname') ? 'is-invalid' : '' }}" type="text" name="drinkname" id="drinkname" value="{{ old('drinkname', $menu_restoran->drinkname) }}" required>
                @if($errors->has('drinkname'))
                    <div class="invalid-feedback">
                        {{ $errors->first('drinkname') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.menu_restoran.fields.drinkname_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="price">{{ trans('cruds.drinkname.fields.price') }}</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="text" name="price" id="price" value="{{ old('price', $menu_restoran->price) }}" required>
                @if($errors->has('price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.menu_restoran.fields.price_helper') }}</span>

            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection