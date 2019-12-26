// var modal = document.getElementById('modal');
// var triggers = document.getElementsByClassName("card");
//
// for(var i = 0; i < triggers.length; i++)
// {
//   triggers[i].addEventListener('click', function ()
//   {
//     document.querySelector('.bg-modal').style.display = 'flex';
//   });
// }
//
//
// // document.getElementsByClassName('card').addEventListener('click', function()
// // {
// //     document.querySelector('.bg-modal').style.display = 'flex';
// // });
//
// document.querySelector('.close').addEventListener('click', function() {
//   document.querySelector('.bg-modal').style.display = 'none';
// });

$(document).ready(function(){
  $('.view_data').click(function(){
    var username = $(this).attr("id");
    $.ajax ({
      url:"scripts/modal.php",
      method: "POST",
      data: {username:username},
      success:function(data){
        $('#user_detail').html(data);
        $('#dataModal').modal("show");
      }
    });
    console.log(username);
  });
});
