@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.nodeImage.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.node-images.update", [$nodeImage->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="image_url">{{ trans('cruds.nodeImage.fields.image_url') }}</label>
                            <input class="form-control" type="text" name="image_url" id="image_url" value="{{ old('image_url', $nodeImage->image_url) }}">
                            @if($errors->has('image_url'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('image_url') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.nodeImage.fields.image_url_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="node">{{ trans('cruds.nodeImage.fields.node') }}</label>
                            <input class="form-control" type="text" name="node" id="node" value="{{ old('node', $nodeImage->node) }}">
                            @if($errors->has('node'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('node') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.nodeImage.fields.node_helper') }}</span>
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