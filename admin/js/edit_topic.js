// get current topic id
var url = window.location.href;
url = url.split('?');
url = url[1].split('=');
const topic = url[1];
$(document).ready(function(){
	getContents(topic);
})

function showContents(data){
	$("#contentTable").html("");
	var index = null;
	for(let i=0; i<data.length; i++){
		$("#contentTable").append(`
				<tr>
					<td>`+(i+1)+`</td>
					<td>`+data[i].c_title+`</td>
					<td>`+data[i].date_created+`</td>
					<td>
					<a href="create_content.php?topic_id=`+data[i].topic+`&content_index=`+data[i].c_index+`"class="btn btn-warning edit-btn" target="_blank"><i class="fas fa-pen"></i></a>
					<button type="button" class="btn btn-danger delete-btn" data-toggle="modal" data-target="#deleteModal" value="`+data[i].c_index+`"><i class="fas fa-trash"></i></button>
					</td>
				</tr>
		`);
		index = data[i].c_index;
	}
	setCookie('highestIndex', index, 1);
}


$('#submit').click(function(e){
	e.preventDefault();

	let title = $("#content-title").val();

	if(title != "")
	{
		setCookie('contentTitle', title, 1);
		setCookie('contentTopic', topic, 1);

		let index = parseInt(getCookie('highestIndex')) + 1;

		window.location.assign('create_content.php?topic_id='+topic+'&content_index='+index);

		
	}
	else
	{
		alert_failure('Content title is required');
	}

})

$(document).on('click', '.delete-btn', function(e){
	e.preventDefault();
	let id = $(this).val();
	$("#delete-confirm").val(id);
})

$("#delete-confirm").click(function(e){
	e.preventDefault();
	let id = $(this).val();
	deleteContent(id, topic);
})