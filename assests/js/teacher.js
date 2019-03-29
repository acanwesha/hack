$(document).ready(function(){


  $(".sidebar-dropdown > a").click(function() {
    $(".sidebar-submenu").slideUp(200);
    if (
      $(this)
      .parent()
      .hasClass("active")
      )
    {
      $(".sidebar-dropdown").removeClass("active");
      $(this)
      .parent()
      .removeClass("active");
    } else {
      $(".sidebar-dropdown").removeClass("active");
      $(this)
      .next(".sidebar-submenu")
      .slideDown(200);
      $(this)
      .parent()
      .addClass("active");
    }
  });

  $("#close-sidebar").click(function() {
    $(".page-wrapper").toggleClass("toggled");
  });
  $("#show-sidebar").click(function() {
    $(".page-wrapper").toggleClass("toggled");
  });


  
  

});
var hidden_html='';
var val;
$('#answer_button').click(function(){
  
 val = this.id;
 hidden_html='<input type="hidden" name="q_id" value="'+val+'">'
  $('#hidden_field').html(hidden_html);
});

function button_clicked(v){
   val = v;
 hidden_html='<input type="hidden" name="q_id" value="'+val+'">'
  $('#hidden_field').html(hidden_html);
}