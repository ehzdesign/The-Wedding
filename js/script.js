$(function(){

// Smooth scroll on nav links
// ==========================================
$('#mainNav a, #countdown a').smoothScroll();





// Countdown clock function
//==========================================


$('.clock').countdown('2015/09/14', function(event) {

   //display clock in : w/d/hr/min/sec format
   var $this = $(this).html(event.strftime(''
     + '<span>%w</span> weeks '
     + '<span>%d</span> days '
     + '<span>%H</span> hr '
     + '<span>%M</span> min '
     + '<span>%S</span> sec'));

   // display message when countdown is complete
   $this.on('finish.countdown', function(){
    $('.clock').html('Yay! Today is the day!');
  });
 });



// Waypoint for sticky nav
// =======================================

var waypoint = new Waypoint({
  element: document.getElementById('instagram'),
  handler: function(direction) {

   if(direction === 'down') {
    $('.main-nav').css({
      display: '-webkit-flex',
      display: 'flex'
    })
    .hide()
    .fadeIn('fast');
  } else if (direction === 'up'){
    $('.main-nav').fadeOut('fast');
  }


},
offset: '10%'
})


// Instagram feed script
// ===================================

//  var feed = new Instafeed({
//         get: 'tagged',
//         tagName: 'MyCuteNieceOlivia', 

//         clientId: '698a1ba199a648ceacf26e00e835f81a',
//         limit:'14'
//     });
//     feed.run();

// setInterval(function(){
//   $('#instafeed').fadeOut('fast', function() {
//     $(this).html(' ');
//   feed.run();
//   $('#instafeed').fadeIn('slow');
//     console.log('fade in');
//   });
// }, 80000);  

$.ajax({
  type: 'GET',
  url: "https://api.instagram.com/v1/tags/LisaChrisBff/media/recent?client_id=698a1ba199a648ceacf26e00e835f81a&count=14?callback=myCallBack",
  contentType: "application/json",
  dataType: "jsonp"
}).done(function(data){
    //console.log(data);
    $.each(data.data, function (i, item) 
    {
      // var $newImage = $('<img src="'+item.images.low_resolution.url+'">');      
      var $newImage = $('<a href="'+item.link+'"><img src="'+item.images.low_resolution.url+'"></a>');
      var $newImageSecondary = $('<a href="'+item.link+'"><img src="'+item.images.low_resolution.url+'"></a>');    
      $('#instafeed').append($newImage);
      $('#instafeed-secondary').append($newImageSecondary);
    });
  });;







// Display inputs pertaining to proper radio button selected
// =============================================================
$('input[type=radio]').on('click', function(event) {

  var $notAttendingBtn = $('#not-attending'),
  $attendingBtn = $('#attending'),
  $rsvpFormInfo = $('.rsvp__form__info'),
  $plus1Input = $('#plus1__text-input'),
  $plusFamilyInput = $('#family-member__input-section'),
  $notesMessageAttending = 'Please let us know of any dietary restrictions or leave us a heartwarming message.',
  $notesMessageNotAttending = 'Aww, that’s too bad but we still love you. Want to leave us a heartwarming message?';

  // reveal rsvp notes section if either attending or not attending radio button selected
  if(($attendingBtn).prop('checked') || ($notAttendingBtn).prop('checked')){
    console.log('attendancechoice made');
    $rsvpFormInfo.fadeIn('300');
     $('body').animate({
        scrollTop: $(".rsvp__form__info").offset().top
    }, 500);
  }

  // actions when plus1 radio is selected
  if($('#plus1-radio').prop('checked')) {
   $plus1Input.show(300, function(){
     console.log('plus1 radio button selected');
   });
 } else{
  $plus1Input.hide(300);
}

  // actions when plus family radio is selected
  if($('#plusfamily-radio').prop('checked')) {
   $plusFamilyInput.hide().show(300, function(){
     console.log('plus-family radio button selected'); 
   });
 } else{
  $plusFamilyInput.hide(300,function(){
    $('.family-member__input').slice(1).remove();
  });
}


  // actions when 'will be there in spirit' (same as not attending) radio is selected
  if($notAttendingBtn.prop('checked')) {
    console.log('will be there in spirit is checked');
    $('.whos-attending').fadeOut(300);
    $plusFamilyInput.add($plus1Input).hide();
    $('.rsvp__form__info__notes__message').text($notesMessageNotAttending)
    .hide()
    .fadeIn(300);
  }else{
    $('.whos-attending')
    .css({
      display: '-webkit-flex',
      display: 'flex'
    })
    .hide()
    .fadeIn(300);
    $('.rsvp__form__info__notes__message').text($notesMessageAttending)
    .hide().fadeIn(300);

  }



});




var countFamily =0;
// add family member inputs
// ======================================
function addFamilyMember(){
  countFamily++;
  var x = $('.family-member__input:first').clone(true);
  x.hide()
  .find("input:text").val("").end()
  .appendTo('#family-member__input-section')
  .fadeIn(300);

  x.find('input').attr('name','family-member[]');

}

$('.add-family-member-btn').on('click', function(event) {
  addFamilyMember();
});


// form submission (ajax request)
// ======================================

var $form = $('#rsvp__form');
console.log($form.attr('action'));

var $formMessages = $('#formMessages');
var $formMessagesText = $('.formMessagesText');

function successMessage(){

  $formMessagesText.text('Whatever you did it was a success!')
  $formMessagesText.addClass('successIcon');
  $formMessages.addClass('success')
  .css({
   display: 'flex',
   display: '-webkit-flex'
 })
  .hide()
  .fadeIn('200')
  .delay('2500')
  .fadeOut('200');
}


function errorMessage(){
  $formMessagesText.addClass('errorIcon');
  $formMessages.addClass('error')
  .css({
   display: 'flex',
   display: '-webkit-flex'
 })
  .hide()
  .fadeIn('200')
  .delay('2500')
  .fadeOut('200');
}


var $form = $('#rsvp__form'); //get form


$form.submit(function(event){


  event.preventDefault();
  var formData = $form.serialize();

  $.ajax({
    url: $form.attr('action'),
    type: 'POST',
    data: formData
  })
  .done(function(response) {  //what fires when submission is complete
   var $submitFormBtn = $('#submitFormBtn');
   console.log(response);

   $submitFormBtn.prop('disabled', true);
   
   $form.trigger('reset'); //clear form fields after form submission
   
   $submitFormBtn.val('Thank You') //change submit button appearance
   .removeClass('sendBtn')
   .addClass('success');

   successMessage();
   

   console.log("form submission success");
    // make a formMessages div
    // $(formMessages).removeClass('error');
    // $(formMessages).removeClass('success');
    // $(formMessages).text('response');

    //clear all form inputs
  })
  .fail(function(data) {
    console.log("error");
    // $(formMessages).removeClass('success');
    // $(formMessages).removeClass('error');
    if(data.responseText !== ''){
      console.log(data.status);
      errorMessage();
      if(data.status === 404){
        $formMessagesText.text('Sorry but requested page cannot be found');
      }else if(data.status === 500){
        $formMessagesText.text('Server error please try again later');
      }
    }else{
      errorMessage();
      $formMessages.text('Oops! An error occured and your message could not be sent.');
    }
  })
  .always(function() {
    console.log("form submission complete");
  });
  
  


});

 




});
// function connectLiveFeed() {
//       conn = new ab.Session('ws://ramirez-portfolio.com:8080',
//               function () {
//                 conn.subscribe('tag_dog', function (topic, data) {

//                   data.title.data.forEach(function (element, index, array) {
//                     //JSON IMAGE INFORMATION
//                     console.log(element);
//                     console.log(element.id);
//                     console.log(element.images);
//                     }
//                   );
//                 });
//               },
//               function () {
//                 console.warn('WebSocket connection closed');
//               },
//               {'skipSubprotocolCheck': true}
//       );

//     }

// connectLiveFeed();
