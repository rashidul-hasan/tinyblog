@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row" style="margin: 0 0 15px 0;">
            <div class="col-md-12">
                <span style="margin-top: 10px; font-size: 24px">{{$title ?? ''}}</span>
                <div class="pull-right">
                    <a href="{{ url('admin/articles') }}" class="btn btn-default">All Categories</a>
                    @if( isset($action) && $action == 'edit')
                        <a href="{{ url('admin/articles/create') }}" class="btn btn-primary">New <i class="fa fa-plus"></i></a>
                    @endif
                </div>
            </div>
        </div>

        <div class="card">
            <form class="form-horizontal" action="{{ $form_action }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                @if( isset($action) && $action == 'edit')
                    <input type="hidden" name="_method" value="PUT">
                @endif
                <div class="card-body">

                    <div class="form-group">
                        <label for="name_en" class="col-sm-3 control-label">Name</label>
                        <div class="col-lg-12">
                            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name_en" value="{{ $item->name }}" name="name">
                            <span class="invalid-feedback">{{ $errors->first('name') }}</span>
                        </div>
                    </div>

                </div>

                <div class="card-footer" style="text-align: center;">
                    <button type="submit" class="btn btn-default">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save <i class="fa fa-save"></i></button>
                </div>

            </form>
        </div>
    </div>
@endsection
