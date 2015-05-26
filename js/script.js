
// Countdown clock function
//==========================================

$(function(){

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
  url: "https://api.instagram.com/v1/tags/MyCuteNieceOlivia/media/recent?client_id=698a1ba199a648ceacf26e00e835f81a&count=14?callback=myCallBack",
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
    console.log('working');
    $rsvpFormInfo.fadeIn('300');
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





// add family member inputs
// ======================================
function addFamilyMember(){
  $('.family-member__input:first').clone(true)
  .hide()
  .find("input:text").val("").end()
  .appendTo('#family-member__input-section')
  .fadeIn(300);
}

$('.add-family-member-btn').on('click', function(event) {
  addFamilyMember();
});










});



