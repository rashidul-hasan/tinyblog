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
                    {!! $table->render() !!}
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

