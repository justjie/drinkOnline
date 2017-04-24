$(document).ready(function(){
	var getData=function(){
    $.get("http://localhost/INFS7202-A2/php/comments.php",function(data){
		$("#commentSection").empty();
		console.log(JSON.parse(data));
		var json = JSON.parse(data);
		console.log(json);
		for(var i=0; i<json.length; i++){
			var obj = json[i];
			$("#commentSection").append(
				"<div class='media'>" +
					"<div class='media-left'>" +
						"<img src='http://localhost/INFS7202-A2/images/avatar.png' class='img-circle'  style='width:60px'>" +
					"</div>" +
					"<div class='media-body'>" +
						"<div id='cid-"+obj.cid+"' class='comments'>" +
							"<p>" + obj.uid + "</p>" +
							"<p>" + obj.date + "</p>" +
							"<p id='message-"+obj.cid+"'>" + obj.message + "</p>" +
							"<div class='buttonSet'>" +
								"<button id='edit-"+obj.cid+"' class='edit'>Edit</button>" +
								"<button id='delete-"+obj.cid+"' class='delete'>Delete</button>" +
							"</div>" +
							"<div id='confirmButtonBoxID-"+obj.cid+"' class='confirmButtonBoxClass'>"+
							"</div>" + 
						"</div>" + 
					"</div>" +
				"</div>"
			);
		}
	});
	}
	
	getData();

	$("#send").click(function(){
		console.log("Hey Clicked");
		var comment=$("#comment").val();
		var UID = "send";
		console.log(comment);
		$.ajax({
			url: "http://localhost/INFS7202-A2/php/comments.php",
			data: {uniqueID: JSON.stringify(UID), dataSent: JSON.stringify(comment)},
			method: 'POST',
			dataType:'json',
			success: function(result){
				getData();
			},
            complete:function(data,status){
				console.log(status);
				if(status=="error"){
					 console.error(data.responseJSON.message);
                }
			}
		});
	});
	
	$(document).on('click',".delete",function(){
		console.log("Delete Clicked");
		var UID = "delete";
		var id=this.id.split("-");
		var obj = {"id":id[1]};
		$.ajax({
			url: "http://localhost/INFS7202-A2/php/comments.php",
			data: {uniqueID: JSON.stringify(UID), deleteData: JSON.stringify(obj)},
            dataType:'json',
            method:'POST',
			success:function(data){
				getData();
            },
            complete:function(data,status){
				if(status=="error"){
					console.error(data.responseJSON.message);
                }
            }
		})
	});
	
	$(document).on('click',".edit",function(){
		console.log("Edit Clicked");
		var id=this.id.split("-");
		$("#confirmButtonBoxID-"+id[1]).empty();
		$("#message-"+id[1]).html("<textarea id='updateText-"+id[1]+"' name='message' class='form-control' rows='4' cols='70'></textarea>");
		$("#confirmButtonBoxID-"+id[1]).append("<button id='confirm-"+id[1]+"' class='confirmButton'>Confirm</button>");
	});
	
	$(document).on('click',".confirmButton",function(){
		console.log("Confirm Clicked");
		var UID = "edit";
		var id=this.id.split("-");
		var message = $("#updateText-"+id[1]).val();
		if (message == "") {
			alert("Please enter something in the comment!");
		}else{
			$("#message-"+id[1]).html($("#updateText-"+id[1]).val());
			$("#confirmButtonBoxID-"+id[1]).empty();
		}
		var obj = {"id":id[1], "message":message};
		$.ajax({
			url: "http://localhost/INFS7202-A2/php/comments.php",
			data: {uniqueID: JSON.stringify(UID), editData: JSON.stringify(obj)},
            dataType:'json',
            method:'POST',
			success:function(data){
				getData();
            },
            complete:function(data,status){
				if(status=="error"){
					console.error(data.responseJSON.message);
				}
			}
		})
	});
});