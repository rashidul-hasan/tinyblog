@extends('layouts.master')

@section('content')
    <div class="row" style="margin: 0 0 15px 0;">
        <div class="col-md-12">
            <span style="margin-top: 10px; font-size: 24px">{{$title ?? ''}}</span>
            <div class="pull-right">
                <button type="submit" class="btn btn-primary" id="btn-submit"
                        data-loading-text="Please wait <i class='fa fa-spinner fa-spin '></i>">
                    Send <i class="fa fa-fw fa-send"></i>
                </button>
            </div>
        </div>
    </div>

    <form action="{{ url('admin/send-email') }}" method="POST" autocomplete="off"
          enctype="multipart/form-data" class="form-create-article">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab">Compose Email</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <div class="form-group">
                                <label>Subject</label>
                                <input type="text" name="subject" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Body</label>
                                <textarea class="article-editor" name="body"></textarea>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
            <div class="col-md-3">
                <div class="box box-solid">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Send To</label>
                            <select class="form-control" name="send_to">
                                <option value="users" selected>All Users</option>
                                <option value="subscriber">All Subscribers</option>
                                <option value="member">All Members</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>From Address</label>
                            <input class="form-control" type="email" name="from_andress">
                        </div>
                        <div class="form-group">
                            <label>From Name</label>
                            <input class="form-control" type="text" name="from_name">
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </form>


    <div id="modal-success" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-box">
                        <i class="material-icons">&#xE876;</i>
                    </div>
                    <h4 class="modal-title">Success!</h4>
                </div>
                <div class="modal-body">
                    <p class="text-center message"></p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" data-dismiss="modal">Close</button>
                    <a href="{{ url('admin/send-email') }}" class="btn btn-default">Send Again</a>
                </div>
            </div>
        </div>
    </div>

    <div id="modal-error" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header">
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
                    <a href="{{ url('admin/send-email') }}" class="btn btn-default">Reload Page</a>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('scripts')

    <script>

        function submitArticleForm() {

            var $this = $(this);
            $this.button('loading');
            var $form = $('.form-create-article');
            var data = $form.serializeArray();

            // ckeditor data
            var content = {};
            content.value = CKEDITOR.instances.body.getData();
            content.name = 'body';
            data.push(content);

            $.ajax({
                url: $form.attr('action'),
                method: "POST",
                data: data
            })
            .done(function(data) {
                $this.button('reset');
                if(data.success){
                    showSuccessModal(data);
                } else {
                    showErrorModal(data);
                }
            })
            .fail(function(xhr) {
                $this.button('reset');
                if(xhr.status == 422){
                    alert('Subject & Body is required');
                } else {
                    showErrorModal(xhr);
                }
            });

            return false;
        }

        function showSuccessModal(data) {
            $('#btn-submit').attr('disabled', true);
            $('.message').text(data.message);
            $('#modal-success').modal({backdrop: 'static', keyboard: false}, 'show');
        }

        function showErrorModal(data) {
            $('.message').text('Something went wrong! Please refresh the page & try again');
            $('#modal-error').modal({backdrop: 'static', keyboard: false}, 'show');
        }

        $(document).ready(function () {

            CKEDITOR.replace('body',{
                height: 400,
                filebrowserImageBrowseUrl: window.hp_route_prefix + '?type=Images',
                filebrowserImageUploadUrl: window.hp_route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
                filebrowserBrowseUrl: window.hp_route_prefix + '?type=Files',
                filebrowserUploadUrl: window.hp_route_prefix + '/upload?type=Files&_token={{csrf_token()}}',
                allowedContent: true, // to allow all tags
                removePlugins: 'easyimage'
            });

            $('#lfm').filemanager('image', {prefix: window.hp_route_prefix});

            // submit form
            $('#btn-submit').on('click', submitArticleForm);

        });
    </script>
@endpush