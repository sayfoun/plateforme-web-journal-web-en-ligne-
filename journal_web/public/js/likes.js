$(".like").on('click',function()
{
var like_s=$(this).attr('data_like');
var post_id = $(this).attr('data_postid'); 
var token = $(this).attr('data_cref');
$.ajax ({
	type: "POST",
	url: "/likes",
    data: {
	post_id: post_id, 
    like_s :like_s,
    '_token': token, 
          }, 

 success: function (data) 
 { alert(data);
 	if(data.is_like)

 $(".like").toggleClass("like btn success");
// $(".dislike").toggleClass("like btn success");

 }
})
});