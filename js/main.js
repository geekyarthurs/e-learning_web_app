
var myEditor;




// <div class="loader" id="loader"></div>


 $(document).ready(function(){

  

  $('.slider').bxSlider();


   $(".tagline").letterfx({ fx:'swirl fade' , timing:'300' });  

   $("#hello").letterfx({ fx:'swirl fade' , timing:'300' });    


  $(".login-card").click(function() {

    alert('clicked');
  })

   

  $('input[type=file]').change(function(){

    $(this).simpleUpload("includes/upload.php", {

      /*
       * Each of these callbacks are executed for each file.
       * To add callbacks that are executed only once, see init() and finish().
       *
       * "this" is an object that can carry data between callbacks for each file.
       * Data related to the upload is stored in this.upload.
       */

      start: function(file){
        //upload started
        this.block = $('<div class="block"></div>');
        this.progressBar = $('<div class="progressBar"></div>');
        this.block.append(this.progressBar);
        $('#uploads').append(this.block);
      },

       data: {subject : $("#subject").val()},

      allowedExts : ['jpg','png','jpeg'],

      progress: function(progress){
        //received progress
        this.progressBar.width(progress + "%");
      },

      success: function(data){
        //upload successful

        this.progressBar.remove();

        /*
         * Just because the success callback is called doesn't mean your
         * application logic was successful, so check application success.
         *
         * Data as returned by the server on...
         * success: {"success":true,"format":"..."}
         * error: {"success":false,"error":{"code":1,"message":"..."}}
         */

        if (data.success) {
          //now fill the block with the format of the uploaded file
          var format = "Done";
          var formatDiv = $('<div class="format"></div>').text(format);
          this.block.append(formatDiv);
        } else {
          //our application returned an error
          var error = data.error.message;
          var errorDiv = $('<div class="error"></div>').text(error);
          this.block.append(errorDiv);
        }

      },

      error: function(error){
        //upload failed
        this.progressBar.remove();
        var error = error.message;
        var errorDiv = $('<div class="error"></div>').text(error);
        this.block.append(errorDiv);
      }

    });

  });





  var href = document.location.href;
var lastPathSegment = href.substr(href.lastIndexOf('/') + 1);

if (lastPathSegment == "notes.php"){
  
  DecoupledEditor
    .create( document.querySelector( '#editor' ) )
    .then( editor => {
        const toolbarContainer = document.querySelector( '#toolbar-container' );
        myEditor = editor;

        toolbarContainer.appendChild( editor.ui.view.toolbar.element );
    } )
    .catch( error => {
        console.error( error );
    } );

    $(".edit-homework").click(function () {



var a = "Unavailable";

var defaultHTML = $(".hw-container").html();

if ( defaultHTML.includes(a) ){

  myEditor.setData(`<div class="table-responsive">
  <table class="table">
    <tr>
        <th>Period</th>
        <th>Homework</th>
    </tr>

    <tr>
        <td></td>
        <td></td>
    </tr>

    <tr>
        <td></td>
        <td></td>
    </tr>

    <tr>
        <td></td>
        <td></td>
    </tr>

    <tr>
        <td></td>
        <td></td>
    </tr>

    <tr>
        <td></td>
        <td></td>
    </tr>

    <tr>
        <td></td>
        <td></td>
    </tr>

    <tr>
        <td></td>
        <td></td>
    </tr>

    <tr>
        <td></td>
        <td></td>
    </tr>


  </table>
</div>`);
}else{
  myEditor.setData(defaultHTML);
}




});
}

  let searchParams = new URLSearchParams(window.location.search);

if(searchParams.has('page')){
let param = parseInt(searchParams.get('page'));
let newParam = param + 1;






let initialParam  = $(".next-link").attr('href').slice(0,-1);
var finalLink = initialParam + newParam;

$(".next-link").attr("href", finalLink);


};



  








var yesterday = new Date();
var today = new Date();
var befYesterday = new Date();
yesterday.setDate(today.getDate()-1);
befYesterday.setDate(yesterday.getDate()-1);


function dateFormatter(date){

  var dd = date.getDate();
var mm = date.getMonth()+1; //January is 0!
var yyyy = date.getFullYear();

    if(dd<10) {
    dd = '0'+dd
} 

    if(mm<10) {
    mm = '0'+mm
} 

todayy = yyyy + '-' + mm + '-' + dd;


return todayy;
}

function getDay(i){
var weekday = new Array(7);
weekday[0] =  "sunday";
weekday[1] = "monday";
weekday[2] = "tuesday";
weekday[3] = "wednesday";
weekday[4] = "thursday";
weekday[5] = "friday";
weekday[6] = "saturday";

return weekday[i];
}

//----------------------------------------------- DATE FORMATTER ENDS-----------------------------------------------



$("button").click(function() {

  var className = this.className;

  if(className.includes("submit-ans"))


  {

            var id = this.id;
            var answer = $("#" + this.id +  ".answer-input").val();
            $.get("../../../../student/includes/a-submitter.php?id=" + id + "&answer=" + answer, function(data){

              
              location.reload();
            });

  }







  


else if (className.includes("question-button"))

{

              if($(".ask-question").is(":hidden")){
              $(".ask-question").slideDown("medium", function() {

                  $(".q-box").focus();
                  });
              }else{
                $(".ask-question").slideUp("medium");
              }


}

else if (className.includes("answer"))



{


}







});

// -----------------------------BUTTON RESPONSES---------------------------------------------------




$(".answer").click(function() {
  
  

          if(this.id){

            if ($(this).text() == "CLOSE"){
              $(this).text("Answer");
            }else{
            $(this).text("CLOSE");
          }

           $("#" + this.id +  ".answer-box").slideToggle("medium");
           $("#" + this.id +  ".answer-input").focus();
          }

});



$(".delete-question").click(function() {
  $.post("../../../student/includes/q-submitter.php" , { del : this.id } , function( data ) {
   location.reload();

   // del=" + this.id
   });
});



if (lastPathSegment == "routine.php"){
  getRoutine();
}




function getRoutine(){


  $( ".routine-loading" ).empty();

  for (i = 0 ; i < 7 ; i++) {
  $.get("../../../student/includes/routine-api.php?day=" + getDay(i) , function( data ) {
    $( ".routine-loading" ).append(data);
   });

}
}


function homeworkLoader(formattedDate){
$( ".hw-container" ).empty();
$.get("../../../student/includes/notes-api.php?date=" + dateFormatter(formattedDate) , function( data ) {
    $( ".hw-container" ).append(data);
   });

}

homeworkLoader(today);



  $("#befYesterday").click(function() {
    
    homeworkLoader(befYesterday);

});

  $("#yesterday").click(function() {
    
    homeworkLoader(yesterday);

});

  $("#today").click(function() {
    
    homeworkLoader(today);

});

  $('#date-picker').change(function() {
    var dates = $("#date-picker").val();
    $( ".hw-container" ).empty();
    $.get("../../../student/includes/notes-api.php?date=" + dates , function( data ) {
    $( ".hw-container" ).append(data);
   });
});


    $(".v-answer").click(function() {



if(this.id){



  

  if ($(this).text() == "CLOSE"){
    $(this).text("View Answers");
  }else{
  $(this).text("CLOSE");
}

  
  $("#" + this.id +  ".ans").slideToggle("medium");
}
  
 
});


// ---------------------------------------------SIDEBAR TOGGLE ---------------------------------------------------------------------
   var width = $(window).width();
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                if ( width < 678) {

                    $('.main-texts').toggle();
                    $('.main-routine').toggle();
                    $('.notes-container').toggle();
                    $('.q-container').toggle();
                     $('.chat-main').toggle();
                }
            });



$(".save-button").click(function() {

  var data = myEditor.getData();
  var date = $("#date").attr('class');
  var type = $("#date").attr('type');

  $.post("../../../student/includes/notes-api.php" , { homework : data , dateSubmit : date , type : type } , function( data ) {
   
   
   


   // del=" + this.id
   });
  

});






});