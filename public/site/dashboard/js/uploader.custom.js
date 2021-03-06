 // Custom Selects
        if ($('[data-toggle="select"]').length) {
            $('[data-toggle="select"]').select2();
        }
        $('[data-toggle="checkbox"]').radiocheck();

        var e_thumbnail = new PureUploader(
            {
                //Events
                html5Error: html5ErrorFunc,
                progress: uploaderProgress,
                success: uploaderSuccess,
                error: uploaderError,
                //Properties
                name: "e_thumbnail",
                drop: true,
                imageHolder: document.getElementById("imageHolder1"),
                dragHoverClass: "drop_hover",
                dropPlace: document.getElementById("dropPlace1"),
                form: document.getElementById("dropper1"),
                file_input: document.getElementById("fileInput1"),
                file_class: "col-md-6 list-i",
                file_filter: "",
                file_size: 3000 * 1024 * 1024,
                template:
                    '<div class="form-group text-center">' +
                        '<a href="javascript:void(0)" class="btn btn-danger close" onclick="{uploader}.remove(\'{id}\')">x</a>' +
                        '{image}' +
                    '</div>' +
                    '<div class="form-group text-center">' +
                        '<div class="form-group col-md-6">' +
                            '<a href="javascript:void(0)" class="btn btn-info" onclick="{uploader}.start(\'{id}\')">Start</a>' +
                        '</div>' +
                        '<div class="form-group col-md-6">' +
                            '<a href="javascript:void(0)" class="btn btn-info" onclick="{uploader}.pause(\'{id}\')">Pause</a>' +
                        '</div>' +
                        '<p>{file.name} - {file.size}</p>' +
                    '</div>',
                image: {
                    thumb: true,
                    thumb_width: 200,
                    thumb_height: 200,
                    resize_width: 0,
                    resize_height: 0,
                    keep_aspect_ratio: true,
                    preparing: '/Scripts/build/preparing.png'
                },
                icon: {
                    icon: true,
                    path: "/images/icons",
                    _default: "/images/icons/_blank.png",
                    width: 128,
                    height: 128,
                    extension:'.png'
                },
                ajax: {
                    url: '/Home/Receive',
                    //url: 'http://lyzerk.koding.io/handler.php',

                    ///url:'https://demo-project-lyzerk.c9.io/handler.php',
                    clearAfterUpload: true,
                    beforeSend: function (xhr) {

                    }
                },
                chunk: {
                    active: true,
                    size: 1 * 1024 * 1024
                },
                watermark: {
                    watermark: false
                },

            });

        var e_resize = new PureUploader(
            {
                //Events
                html5Error: html5ErrorFunc,
                progress: uploaderProgress,
                success: uploaderSuccess,
                error: uploaderError,
                //Properties
                name: "e_resize",
                drop: true,
                imageHolder: document.getElementById("imageHolder2"),
                dragHoverClass: "drop_hover",
                dropPlace: document.getElementById("dropPlace2"),
                form: document.getElementById("dropper2"),
                file_input: document.getElementById("fileInput2"),
                file_class: "col-md-3 list-i",
                file_filter: "jpeg|jpg|png|bmp",
                image: {
                    thumb: true,
                    thumb_width: 200,
                    thumb_height: 200,
                    resize_width: 800,
                    resize_height: 600,
                    keep_aspect_ratio: true,
                    preparing: '/Scripts/build/preparing.png'
                },
                ajax: {
                    url: '/Home/Receive',
                    clearAfterUpload: true
                },
                watermark: {
                    watermark: false
                },
                chunk: {
                    active: true,
                    size: 1 * 1024 * 1024
                },

            });

        var e_watermark1 = new PureUploader(
            {
                //Events
                html5Error: html5ErrorFunc,
                progress: uploaderProgress,
                success: uploaderSuccess,
                error: uploaderError,
                //Properties
                name: "e_watermark1",
                drop: true,
                imageHolder: document.getElementById("imageHolder3"),
                dragHoverClass: "drop_hover",
                dropPlace: document.getElementById("dropPlace3"),
                form: document.getElementById("dropper3"),
                file_input: document.getElementById("fileInput3"),
                file_class: "col-md-3 list-i",
                file_filter: "jpeg|jpg|png|bmp",
                image: {
                    thumb: true,
                    thumb_width: 200,
                    thumb_height: 200,
                    resize_width: 0,
                    resize_height: 0,
                    preparing: '/Scripts/build/preparing.png'
                },
                ajax: {
                    url: '/Home/Receive',
                    clearAfterUpload: true
                },
                watermark: {
                    watermark: true,
                    image: "",
                    image_aspect_ratio: true,
                    text: "www.yourweb.com",
                    color: "grey",
                    alpha: 1,
                    font_size: "55px",
                    font: "bold sans-serif",
                    position: "top mid"
                },
                chunk: {
                    active: true,
                    size: 1 * 1024 * 1024
                },
            });

        var e_watermark2 = new PureUploader(
            {
                //Events
                html5Error: html5ErrorFunc,
                progress: uploaderProgress,
                success: uploaderSuccess,
                error: uploaderError,
                //Properties
                name: "e_watermark2",
                drop: true,
                imageHolder: document.getElementById("imageHolder4"),
                dragHoverClass: "drop_hover",
                dropPlace: document.getElementById("dropPlace4"),
                form: document.getElementById("dropper4"),
                file_input: document.getElementById("fileInput4"),
                file_class: "col-md-3 list-i",
                file_filter: "jpeg|jpg|png|bmp",
                image: {
                    thumb: true,
                    thumb_width: 200,
                    thumb_height: 200,
                    resize_width: 0,
                    resize_height: 0,
                    preparing: '/Scripts/build/preparing.png'
                },
                ajax: {
                    url: '/Home/Receive',
                    clearAfterUpload: true
                },
                watermark: {
                    watermark: true,
                    image: "images/watermark.png",
                    image_aspect_ratio: true,
                    alpha: 0.5,
                    position: "top mid"
                },
                chunk: {
                    active: true,
                    size: 1 * 1024 * 1024
                },
            });

        var autoUp = new PureUploader(
            {
                //Events
                html5Error: html5ErrorFunc,
                progress: uploaderProgress,
                success: uploaderSuccess,
                error: uploaderError,
                //Properties
                name: "autoUp",
                drop: true,
                imageHolder: document.getElementById("imageHolder5"),
                dragHoverClass: "drop_hover",
                dropPlace: document.getElementById("dropPlace5"),
                form: document.getElementById("dropper5"),
                file_input: document.getElementById("fileInput5"),
                file_class: "col-md-3 list-i",
                file_filter: "",
                image: {
                    thumb: true,
                    thumb_width: 200,
                    thumb_height: 200,
                    resize_width: 0,
                    resize_height: 0,
                    preparing: '/Scripts/build/preparing.png'
                },
                ajax: {
                    url: '/Home/Receive',
                    clearAfterUpload: true
                },
                chunk: {
                    active: true,
                    size: 1 * 1024 * 1024
                },
                auto_upload: true

            });

        $(function () {

            //e_thumbnail
            $('#g-Thumb').change(function () {
                e_thumbnail.settings.image.thumb = $(this).is(":checked");
            });

            $('#g-Icon').change(function () {
                e_thumbnail.settings.icon.icon = $(this).is(":checked");
            });


            //e_resize
            $('#resize_width').change(function () {
                e_resize.settings.image.resize_width = $(this).val();
            });

            $('#resize_height').change(function () {
                e_resize.settings.image.resize_height = $(this).val();
            });

            $('#g-Aspect').change(function () {
                e_thumbnail.settings.image.keep_aspect_ratio = $('#g-Aspect').is(":checked");
            });


            $('#watermarkText').change(function () {
                e_watermark1.settings.watermark.text = $(this).val();
            });
            $('#watermarkColor').change(function () {
                e_watermark1.settings.watermark.color = $(this).val();
            });
            $('#watermarkFont').change(function () {
                e_watermark1.settings.watermark.font = $(this).val();
            });
            $('#watermarkFontSize').change(function () {
                e_watermark1.settings.watermark.font_size = $(this).val();
            });
            $('#watermarkTextAlpha').change(function () {
                e_watermark1.settings.watermark.alpha = $(this).val();
            });
            $('#watermarkTextPosition').change(function () {
                e_watermark1.settings.watermark.position = $(this).val();
            });

            $('#watermarkImageAlpha').change(function () {
                e_watermark2.settings.watermark.alpha = $(this).val();
            });
            $('#watermarkImagePosition').change(function () {
                e_watermark2.settings.watermark.position = $(this).val();
            });
            $('#g-Image-Aspect').change(function () {
                e_watermark2.settings.watermark.image_aspect_ratio = $(this).is(":checked");
            });


        });


        function uploaderProgress(data) {
            var template = document.getElementById(data.template);

            if (template) {
                var progress = document.getElementById("progress_" + data.template);

                if (progress) {
                    progress.style.width = data.percent + "%";
                }
                else {
                    var div = document.createElement("div");
                    div.className = "progress";

                    progress = document.createElement("div");
                    progress.id = "progress_" + data.template;
                    progress.className = "progress-bar";
                    progress.style.width = data.percent + "%";
                    div.appendChild(progress);

                    template.appendChild(div);
                }
            }

        }

        function uploaderSuccess(event) {
            
            $.gritter.add({
                title: 'File Uploaded!',
            });
        }

        function uploaderError(uploader, message, event) {
            if (message == uploader.settings.errors.NETWORK) {
                if (event.target.upload.template_id) {
                    var temp = document.getElementById(event.target.upload.template_id);
                    if (temp != null) {
                        var p = temp.getElementsByTagName("p")[0];
                        p.className = p.className + "file_error";
                    }
                }
            }
            else {
                $.gritter.add({
                    title: uploader.name,
                    text: message
                });
            }
        }

        function html5ErrorFunc(uploader) {
            uploader.settings.imageHolder.style.display = "none";
            //document.getElementById("dropper").removeChild(imageholder);

            uploader.settings.dropPlace.style.display = "none";
            var error = document.createElement("p");
            error.className = "text-center";
            error.appendChild(document.createTextNode("Your browser doesn't support HTML5, we can offer you a new browser from here !"));
            uploader.settings.form.appendChild(error);
        }

        var confirmOnPageExit = function (e) {
            // If we haven't been passed the event get the window.event
            e = e || window.event;
            var uploading = e_thumbnail.isworking() | e_resize.isworking() | e_watermark1.isworking() | e_watermark2.isworking() | autoUp.isworking();

            if (uploading == 1) {
                var message = 'Any text will block the navigation and display a prompt';

                // For IE6-8 and Firefox prior to version 4
                if (e) {
                    e.returnValue = message;
                }

                // For Chrome, Safari, IE8+ and Opera 12+
                return message;
            }
            else {
                return null;
            }
        };

        window.onbeforeunload = confirmOnPageExit;
