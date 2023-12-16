@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.note.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.notes.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.note.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.note.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="node">{{ trans('cruds.note.fields.node') }}</label>
                <input class="form-control {{ $errors->has('node') ? 'is-invalid' : '' }}" type="text" name="node" id="node" value="{{ old('node', '') }}">
                @if($errors->has('node'))
                    <div class="invalid-feedback">
                        {{ $errors->first('node') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.note.fields.node_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="note">{{ trans('cruds.note.fields.note') }}</label>
                <textarea class="form-control {{ $errors->has('note') ? 'is-invalid' : '' }}" name="note" id="note">{{ old('note') }}</textarea>
                @if($errors->has('note'))
                    <div class="invalid-feedback">
                        {{ $errors->first('note') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.note.fields.note_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection