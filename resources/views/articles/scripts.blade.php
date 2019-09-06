
<script>

    function submitArticleForm() {

        var $this = $(this);
        $this.button('loading');
        var $form = $('.form-create-article');
        var data = $form.serializeArray();

        // ckeditor data
        var content = {};
        content.value = CKEDITOR.instances.content.getData();
        content.name = 'content';
        data.push(content);

        console.log({data});
        $.ajax({
            url: $form.attr('action'),
            method: "POST",
            data: data
        })
            .done(function(data) {
                $this.button('reset');
                if(data.success){
                    toastr.success("Article saved!", 'Success');
                    window.location = data.edit_url;
                } else {
                    toastr.error("Something went wrong!", 'Error');
                }
            })
            .fail(function(xhr) {
                $this.button('reset');
                if(xhr.status == 422){
                    alert('Title (Short) field is required');
                } else {
                    toastr.error("Something went wrong!", 'Error');
                }
            });

        return false;
    }

    function showSuccessModal(data) {
        $('#btn-submit').attr('disabled', true);
        $('.message').text(data.message);
        $('.view-link').attr('href', data.view_url);
        $('.edit-link').attr('href', data.edit_url);
        $('.form-create-article').attr('action', data.edit_url);
        $('#modal-success').modal({backdrop: true, keyboard: true}, 'show');
    }

    function showErrorModal(data) {
        $('.message').text('Something went wrong! Please refresh the page & try again');
        $('#modal-error').modal({backdrop: true, keyboard: true}, 'show');
    }

    $(document).ready(function () {
        $('.select2-multi').select2();

        CKEDITOR.replace('content',{
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