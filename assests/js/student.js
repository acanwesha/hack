var notes;
$(document).ready(function(){

  $.ajax({
    type:"GET",
    url: "http://localhost:80/hackathon/student/get_notes",

    success: function(html){
      notes = JSON.parse(html);
      create_dom(notes);
      
    } 
  });
});

var newNotesArray = [];
var sub;
$('#subject').change(function(){
  sub = $('#subject').val();
  notes.forEach((note)=>{
    if(note.subject_id == sub)
    {
      newNotesArray.push(note);
    }
  });

  create_dom(newNotesArray);  
});

function create_dom(notes)
{

  var hm = "";
  if(notes.length>0)
  {
    notes.forEach((note)=>{
     hm += `
     <div class="card mb-3">

     <div class="card-body">
     <embed src="../assests/`+note.url+`" width="80%" height="200px" />
     <a href="../assests/`+note.url+`" target="_blank">Download</a>
     <h5 class="card-title">`+note.title+`</h5>
     <small>`+note.subject_name+`</small>
     <p class="card-text">`+note.description+`</p>
     <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>

     <div>
     <i class="fa fa-star" aria-hidden="true" ></i>Rating: <span>`+note.rating+`</span>
     <span style="float:right"><i class="fa fa-download" aria-hidden="true"></i>Downloads <span>`+note.downloads+`</span></span>

     </div>
     </div>
     </div>

     `;
   });

    $('.notes-wrapper').html(hm);  
  }
  else{
    $('.notes-wrapper').html('<h4>No notes available</h4>'); 
  }
}



jQuery(function ($) {

  $(".sidebar-dropdown > a").click(function() {
    $(".sidebar-submenu").slideUp(200);
    if (
      $(this)
      .parent()
      .hasClass("active")
      ) {
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
    $(".page-wrapper").removeClass("toggled");
  });
  $("#show-sidebar").click(function() {
    $(".page-wrapper").addClass("toggled");
  });
  
  
  
});
