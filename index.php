<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Chris and Lisa Wedding</title>
</head>
<link rel="stylesheet" href="bower_components/normalize.css/normalize.css">
<link rel="stylesheet" href="css/main.css">
<body>


  <!-- main-nav -->
  <nav class= "navbar">
    <ul class="main-nav" id="mainNav">
      <li class="main-nav__link">
        <a href="#countdown">countdown</a>
      </li>
      <li class="main-nav__link">
        <a href="#instagram">instagram</a>
      </li>
      <li class="main-nav__link">
        <a href="#messages">messages</a>
      </li>
      <li class="main-nav__link">
        <a href="#details">details</a>
      </li>
      <li class="main-nav__link">
        <a href="#map">map</a>
      </li>
      <li class="main-nav__link">
        <a href="#honeyfund">honeyfund</a>
      </li>
      <li class="main-nav__link">
        <a href="#rsvp">rsvp</a>
      </li>
    </ul>
  </nav>

  <!-- main content of site -->
  <div class="content">

    <!-- countdown section -->
    <section id="countdown" class="countdown">
      <div class="wrapper">
        <img src="images/hero-text.png" alt="" class="hero-text">
        <p class="clock"></p>
        <div class="avatars">
          <img src="images/avatars.png" alt="lisa and chris avatars">
          <div class="avatar-baseline"></div>
        </div>
        <a href="#instagram"><img src="images/scroll-arrow.png" alt="scroll arrow" class="scroll-arrow floating"></a>
      </div>
    </section>
    <!-- instagram section -->
    <section id="instagram" class="instagram">
      <div id="instafeed" class="instafeed"></div>
    </section>
    <!-- messages feed section -->
    <section id="messages" class="messages"></section>
    <!-- event details section -->
    <section id="details" class="details">
      <div class="wrapper">
       <div class="details-info">
          <img src="images/details.svg" alt="details-info">
       </div>
        <a href="https://www.google.ca/maps/dir//The+Doctor's+House,+21+Nashville+Rd,+Kleinburg,+ON+L0J+1C0/@43.8439,-79.629146,17z/data=!4m13!1m4!3m3!1s0x882b24186a0801e9:0xe2c8a672c2fda0dc!2sThe+Doctor's+House!3b1!4m7!1m0!1m5!1m1!1s0x882b24186a0801e9:0xe2c8a672c2fda0dc!2m2!1d-79.629146!2d43.8439" target="_blank"><input type="button" value="get directions" class="getdirections"></a>
      </div>
    </section>
    <!-- google map section -->
    <section id="map" class="map">
      <div class="map-container">
        <iframe class="googlemap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2877.5277775884747!2d-79.63033434505891!3d43.84488843362457!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xe2c8a672c2fda0dc!2sThe+Doctor&#39;s+House!5e0!3m2!1sen!2sca!4v1431752821777" width="600" height="450" frameborder="0" style="border:0"></iframe>
      </div>
    </section>
    <!-- honeyfund section -->
    <section id="honeyfund" class="honeyfund">
      <div class="honeyfund__gallery">
        <div class="honeyfund__gallery__item"></div>
        <div class="honeyfund__gallery__item"></div>
        <div class="honeyfund__gallery__item"></div>
      </div>
    </section>
    <!-- rsvp form section -->
    <section id="rsvp" class="rsvp">
      <div class="wrapper">
        <img src="images/rsvp.png" alt="rsvp image" class="rsvp__image">
        <form action="rsvp.php" method="post" class="rsvp__form">
          <label>
            <input type="text" name="name" id="fullname" placeholder="full name" class="textinput">
          </label>
          <div class="rsvp__form__radio-selection">
            <div class="radio-select">
              <input type="radio" name="attendancechoice" value="wouldn't miss it for the world" id="attending" class="radiobtn" >
              <label for="attending">wouldn't miss it for the world</label>
            </div>
            <div class="radio-select">
              <input type="radio" name="attendancechoice" value="will be there in spirit" id="not-attending"class="radiobtn">
              <label for="not-attending">will be there in spirit</label>
            </div>
          </div>
        </div>

        <div class="rsvp__form__info">
          <div class="wrapper">
            <div class="rsvp__form__radio-selection whos-attending">
              <p>who's attending:</p>
              <div class="radio-select">
                <input type="radio" name="how-many" value="just me" id="just-me-radio" class="radiobtn" >
                <label for="just-me-radio">just me</label>
              </div>
              <div class="radio-select">
                <input type="radio" name="how-many" value="plus 1 will be " id="plus1-radio"class="radiobtn">
                <label for="plus1-radio">+ 1</label>
              </div>
              <div class="radio-select">
                <input type="radio" name="how-many" value="plus family " id="plusfamily-radio"class="radiobtn">
                <label for="plusfamily-radio">+ family</label>
              </div>
            </div>
            <div class="rsvp__form__info__notes">
              <input type="text" name="plus1" id="plus1__text-input" class="textinput" placeholder="full name">
              <div id="family-member__input-section">
                <div class="family-member__input" id="family-member__input">
                  <input type="text" name="family-member" placeholder="full name" id="plusfamily__text-input">
                    <svg class="add-family-member-btn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50.5 50.5">
                      <title>add family member</title>
                      <circle id="add-family-member-btn-circle" fill="#7EB3BB" cx="25.2" cy="25.2" r="25.2"/>
                      <line fill="none" id="vertical-line" stroke="#6FA2A9" stroke-width="2.1196" stroke-miterlimit="10" x1="25.2" y1="10.8" x2="25.2" y2="40.2"/>
                      <line fill="none" id="horizontal-line" stroke="#6FA2A9" stroke-width="2.1196" stroke-miterlimit="10" x1="10.5" y1="25.5" x2="39.9" y2="25.5"/>
                    </svg>  
                </div>
              </div>
            <p class="rsvp__form__info__notes__message">Please let us know of any dietary restrictions or leave us a heartwarming message.</p>
            <textarea name="notes" class="rsvp__form__info__notes__textarea" placeholder="notes / well wishes"></textarea>
            <input type="email" name="email" id="email" class="email" placeholder="email">
          </div>
          <div class="rsvp__form__submit-button">
            <input type="submit" value="Send RSVP" class="btn">
          </div>
        </form>
      </div>
    </div>
  </section>


</div>

<script src="bower_components/jquery/dist/jquery.js"></script>
<script src="bower_components/jquery.countdown/dist/jquery.countdown.js"></script>
<script src="bower_components/waypoints/lib/noframework.waypoints.min.js"></script>
<script src="bower_components/instafeed.js/instafeed.js"></script>
<script src="js/script.js"></script>
</body>
</html>