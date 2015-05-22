
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
    $('.main-nav').css('display', '-webkit-flex')
    .hide()
    .fadeIn('fast');
  } else if (direction === 'up'){
    $('.main-nav').fadeOut('fast');
  }

    
  },
  offset: '10%'
})


});



