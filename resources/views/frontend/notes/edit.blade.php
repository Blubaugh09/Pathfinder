@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.note.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.notes.update", [$note->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="user_id">{{ trans('cruds.note.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id">
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $note->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                            <input class="form-control" type="text" name="node" id="node" value="{{ old('node', $note->node) }}">
                            @if($errors->has('node'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('node') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.note.fields.node_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="note">{{ trans('cruds.note.fields.note') }}</label>
                            <textarea class="form-control" name="note" id="note">{{ old('note', $note->note) }}</textarea>
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

        </div>
    </div>
</div>
@endsection