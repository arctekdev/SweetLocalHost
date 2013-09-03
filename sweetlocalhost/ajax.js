$(document).ready(function(){
	//okay first let's get that news and display it
	//the news data is displayed in the news php script the functionallity is in the sweetlocalhost.class.php file
	var i = 0;
	$.ajax({
			type: "POST",
			url: "sweetlocalhost/news.php",
			data: {num : i},
			success: function(data){
				$("#news_section").html(data);
				i++;
			}
		});
	setInterval(function(){
		if(i > 9){
			i = 0;
		}
		$.ajax({
			type: "POST",
			url: "sweetlocalhost/news.php",
			data: {num : i},
			success: function(data){
				$("#news_section").hide();
				$("#news_section").html(data);
				$("#news_section").fadeIn(500);
			}
		});
		console.log(i);
		i++;
	},8000);
	//make dir snippet
	$("#cf_btn").click(function(){
		var mkdir = $("#dir_name").val();
		$.ajax({
			type: "POST",
			url: "sweetlocalhost/dir.php",
			data: {dir : mkdir},
			success: function(data){
				console.log(data);
				location.reload(true);
			}
		});
	});
});
