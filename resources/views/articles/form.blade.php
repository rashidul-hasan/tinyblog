@extends('layouts.master')

@section('raindrops-header')
    <script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
    <link rel="stylesheet" href="/codemirror/lib/codemirror.css">
    <link rel="stylesheet" href="/codemirror/lib/monokai.css">
@endsection

@section('content')
    <div class="container">
        <div class="col-md-12">
            <span style="margin-top: 10px; font-size: 24px">{{$title ?? ''}}</span>
            <div class="pull-right">
            <button type="submit" class="btn btn-primary" id="btn-submit"
                    data-loading-text="Please wait <i class='fa fa-spinner fa-spin '></i>">
                Save <i class="fa fa-fw fa-save"></i>
            </button>
            <a href="{{ url('admin/articles') }}" class="btn btn-default">All Articles</a>
            @if( isset($action) && $action == 'edit')
            <a href="{{ url('article', $item->slug) }}" target="_blank" class="btn btn-default">View On Site</a>
            <a href="{{ url('admin/articles/create') }}" class="btn btn-primary">New <i class="fa fa-plus"></i></a>
            @endif
            </div>
        </div>
    </div>


    <div class="my-3 my-md-5">
        <div class="container">
            <form action="{{ $form_action }}" method="POST" autocomplete="off" enctype="multipart/form-data" class="form-create-article">
                {{ csrf_field() }}
                @if( isset($action) && $action == 'edit')
                    <input type="hidden" name="_method" value="PUT">
                @endif
            <div class="row">
                <div class="col-lg-9">

                    <div class="form-group">
                        <label>Title (Short)</label>
                        <input type="text" name="title" class="form-control" value="{{ $item->title }}" required>
                    </div>
                    <div class="form-group">
                        <label>Title (Long)</label>
                        <input type="text" name="title_long" class="form-control" value="{{ $item->title_long }}">
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea class="article-editor" name="content"> {!! $item->content !!} </textarea>
                    </div>

                </div>
                <div class="col-lg-3">
                    <div class="">
                        <div class="form-group">
                            <label>Category</label>
                            <select name="category_id" class="form-control" >
                                <option value="" disabled selected>--Please Select--</option>
                                @foreach($cat_parents as $cat)
                                    <option value="{{ $cat->id }}" {{ ($cat->id == $item->category_id) ? 'selected' : ''}}>{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tags</label>
                            <select name="tags[]" class="form-control select2-multi" multiple>
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}" {{ in_array($tag->id, $article_tags) ? 'selected' : ''}}>{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Feature Image</label>
                            <div class="input-group">
                              <span class="input-group-btn">
                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                  <i class="fa fa-picture-o"></i> Choose
                                </a>
                              </span>
                                <input id="thumbnail" class="form-control" type="text" name="feature_image" value="{{ $item->feature_image }}">
                            </div>
                            <img id="holder" style="margin-top:15px;max-height:100px;max-width: 100%;" src="{{ $item->feature_image }}">
                        </div>

                        <div class="form-group">
                            <label>Visibility</label>
                            <select class="form-control" name="visibility">
                                <option value="subscriber" {{ ('subscriber' == $item->visibility) ? 'selected' : ''}}>Subscriber</option>
                                <option value="member" {{ ('member' == $item->visibility) ? 'selected' : ''}}>Member</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option value="published" {{ ('published' == $item->visibility) ? 'selected' : ''}}>Published</option>
                                <option value="unpublished" {{ ('unpublished' == $item->visibility) ? 'selected' : ''}}>Unpublished</option>
                            </select>
                        </div>


                    </div>


                </div>
            </div>
            </form>

        </div>
    </div>


    <div id="modal-success" class="modal fade" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="icon-box">
                        <i class="material-icons">&#xE876;</i>
                    </div>
                    <h4 class="modal-title">Success!</h4>
                </div>
                <div class="modal-body">
                    <p class="text-center message"></p>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-success edit-link" href="">Keep Editing</a>
                    <a href="{{ url('admin/articles/create') }}" class="btn btn-default">Add Another</a>
                    <a class="btn btn-default view-link" target="_blank">View On Site</a>
                    <a class="btn btn-default" href="{{ url('admin/articles') }}">All Articles</a>
                </div>
            </div>
        </div>
    </div>

    <div id="modal-error" class="modal fade" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="icon-box" style="background-color: red;">
                        <i class="fa fa-ban" aria-hidden="true"></i>
                    </div>
                    <h4 class="modal-title">Error!</h4>
                </div>
                <div class="modal-body">
                    <p class="text-center message"></p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" data-dismiss="modal">Close</button>
                    <a href="{{ url('admin/articles/create') }}" class="btn btn-default">Reload Page</a>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('scripts')
    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        window.hp_route_prefix = "{{ url(config('lfm.prefix')) }}";

        $(document).ready(function () {

            var items = $(".menu-item");

            $.each(items, function (i, v) {
                var $this = $(v);
                var link = $this.find('a');
//            var href = link.attr("href").split("/").splice(0, 5).join("/");
                var url = $this.data("url");
                if(window.location.href.indexOf(url) > -1) {
                    $this.addClass("active");

                    // if its a submneu item, expand the parent
                    $this.closest('.treeview').addClass('menu-open');
                    $this.closest('.treeview-menu').show();
                }

            });

        });

    </script>
    <script>
        {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/lfm.js')) !!}
    </script>

@include('articles.scripts')

@endpush