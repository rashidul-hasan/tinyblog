
$("#changeThumbnail").click(function(evt){
	var thumbnail = prompt("Please enter the thumbnail image URL"); 
	if(null != thumbnail && '' != thumbnail){
		$("#thumbnailsPreview").attr('src', thumbnail);
		$("#thumbnails").val(thumbnail);
	}
});

$("form#loginForm").submit(function(event){
	event.preventDefault(); 
	$.post($(this).attr('action'), $(this).serialize(), function(data){
        if(true == JSON.parse(data).response_data){
			location.href = "/admin/dashboard/";
		}else{
			alert("Login failed");
		}
    });
});