/** testing wether javascript is working or not  */
// $(document).ready(function() {
//  alert('hellos');
// });

// activate id = "summernote"
$(document).ready(function() {
    $('#summernote').summernote({
      height: '250',
    });
  });

//some function cannot be run using php alone, so javascript still needs to achieved objects

// remember that javascript is reacting to id and type, not to form name in this case, they response to
$(document).ready(function() {
  // id > <input type="checkbox" id="selectAllBoxes">
$('#selectAllBoxes').click(function() {
  if(this.checked){
    $('.checkbox').each(function(){
      this.checked = true;
    });
  } else{
    $('.checkbox').each(function(){
      this.checked = false;
    });
  }
});
  
var div_box = " <div id='load-screen'><div id='loading'></div></div>";

$ ("body").prepend(div_box);
$('#load-screen').delay(150).fadeOut(150,function(){
  $(this).remove();
});

});

//loader automatic
function loadUsersOnline() {
  $.get("functions.php?onlineusers=result",function(data){
    $(".usersonline").text(data);
  });
}
setInterval(function(){
loadUsersOnline();
},500);
