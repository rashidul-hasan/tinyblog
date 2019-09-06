@extends(config('raindrops.crud.layout'))

@section('raindrops-header')
    @include('raindrops::styles.styles')
@stop

@section('raindrops')

    <div class="row" style="margin-bottom: 10px;">
        <div class="col-md-12">
            @if(config('raindrops.crud.show_title'))
                <span style="margin-top: 10px; font-size: 24px">{{$title ?? ''}}</span>
            @endif
            @isset($back_button)
                <a href="{{ $back_button['url'] }}" class="{{ $back_button['class'] }}">{{ $back_button['text'] }}</a>
            @endisset
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-body">
                    <form action="{{ $model->getShowUrl() }}" method="POST" class="form-horizontal">
                          {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group ">
                            <label for="" class="col-sm-3 control-label">Name</label>
                            <div class="col-sm-6">
                                <input class="form-control" name="name" type="text" value="{{ $model->name }}">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-6">
                                <input class="form-control" name="email" type="email" value="{{ $model->email }}">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="" class="col-sm-3 control-label">Role</label>
                            <div class="col-sm-6">
                                <select name="role" class="form-control" >
                                    <option value="2" {{ (2 == $model->role) ? 'selected' : ''}}>Subscriber</option>
                                    <option value="3" {{ (3 == $model->role) ? 'selected' : ''}}>Member</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-10">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" {{ ($model->verified) ? 'checked' : ''}} name="verified"> Verified
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-10">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" {{ ($model->is_enabled) ? 'checked' : ''}} name="is_enabled"> Account Enabled
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="" class="col-sm-3 control-label">Softwares</label>
                            <div class="col-sm-6">
                                <select name="softwares[]" class="form-control select2-multi" multiple>
                                    @foreach($softwares as $tag)
                                        <option value="{{ $tag->id }}" {{ in_array($tag->id, $user_softwares) ? 'selected' : ''}}>{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="tc"><button type="submit" class="btn btn-primary">Submit<i class="fa fa-save"></i></button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop

@section('raindrops-footer')
    @include('raindrops::scripts.php-to-js')
    @include('raindrops::scripts.dropdown')
    @include('raindrops::scripts.delete')
@stop

@if(isset($include_view))
    @includeIf($include_view)
@endif

@push('scripts')
    <script>
        $(document).ready(function () {
            $('.select2-multi').select2();
        });
    </script>
@endpush