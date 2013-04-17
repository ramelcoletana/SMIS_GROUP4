<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<title>Home &raquo; School Management and Information System</title>
<meta charset="iso-8859-1">
<link rel="icon" href='images/deped_logo_old.jpg'/>
<link rel='stylesheet' type='text/css' href='bootstrap/css/bootstrap.css' media="screen"/>
<link rel="stylesheet" href="styles/layout.css" type="text/css">
<!--[if lt IE 9]><script src="scripts/html5shiv.js"></script><![endif]-->
<!-- homepage scripts -->
<script src="scripts/jquery.1.9.1.min.js"></script>
<script src="scripts/slides.min.jquery.js"></script>
<script src="scripts/run_date_time.js"></script>
<script src="scripts/indexScript.js"></script>
<script>
$(function () {
    $('#slides').slides({
        preload: true,
        preloadImage: 'images/slider/loading.gif',
        play: 5000,
        pause: 2500,
        hoverPause: true
    });
});
</script>
<!-- / homepage scripts -->
</head>
<body id="top">
<div class="wrapper row0">
  <header id="topbar" class="clear">
    <time datetime="2000-04-06"><small class='date_time'></small></time>
    <form action="#" method="post">
      <fieldset>
        <legend>Search:</legend>
        <input type="text" value="Search Our Website&hellip;" onFocus="this.value=(this.value=='Search Our Website&hellip;')? '' : this.value ;">
        <input type="image" id="search" src="images/search.gif" alt="Search">
      </fieldset>
    </form>
  </header>
</div>
<div class="wrapper row1">
  <header id="header" class="clear">
    <hgroup>
      <h2 class='sys-title-abb'><a href="#" >School Management and Information System</a></h2>
    </hgroup>
    <nav>
      <ul>
        <li><a href="#">SIGN IN</a>
          <ul>
              <form action='' method='POST' class="form_signin">
                <input type='text' name='school-code' id='signin-school-code' placeholder='School Code'/>
                <p>
                <input type='text' name='username' id='signin-username' placeholder='Username'/>
                <p>
                <input type='password' name='password' id='signin-password' placeholder='Password'/>
                <p>
                <input type='submit' id='signin-button' value='Sign in' class='btn btn-primary'/>
              </form>
          </ul>
        </li>
        <li><a href="contact_us.php">CONTACT US</a></li>
        <li><a href="features.php">FEATURES</a></li>
        <li class="active"><a href="index.php">HOME</a></li>
      </ul>
    </nav>
  </header>
</div>
<!-- content -->
<div class="wrapper row2">
  <div id="container" class="clear">
    <!-- content body -->
    <section id="slides">
      <div id="controls">
        <!-- Controls -->
        <a href="#" class="prev"><img src="images/slider/arrow-prev.png" alt="Previous"></a> <a href="#" class="next"><img src="images/slider/arrow-next.png" alt="Next"></a>
        <!-- Frame -->
        <img src="images/slider/frame.png" alt="" id="frame">
        <!-- / Frame -->
        <div class="slidescontainer">
          <figure class="slide"><a href="#"><img src="images/deped-slide1.jpg" width="940px" height="360px" alt="" class='bg-slide'></a>
            <figcaption class="caption">
              <h2 class="h2_welcome">Welcome to School Management and Information System</h2>
              <p>It's a simple, lovely and effective school management and information system for smaller schools.</p>
            </figcaption>
          </figure>
          <figure class="slide"><a href="#"><img src="images/deped-slide2.jpg" width="940px" height="360px" alt="" class='bg-slide'></a>
            <!--figcaption class="caption">
              <h2>Slide 2 Caption</h2>
              <p>Dapiensociis temper donec auctortortis cumsan et curabitur condis lorem loborttis leo. Ipsumcommodo libero nunc at in velis tincidunt pellentum tincidunt vel lorem pellus sed mauris enim.</p>
            </figcaption-->
          </figure>
          <figure class="slide"><a href="#"><img src="images/watch.jpg" width="940px" height="360px" alt="" class='bg-slide'></a>
            <!--figcaption class="caption">
              <h2>Slide 3 Caption</h2>
              <p>Dapiensociis temper donec auctortortis cumsan et curabitur condis lorem loborttis leo. Ipsumcommodo libero nunc at in velis tincidunt pellentum tincidunt vel lorem pellus sed mauris enim.</p>
            </figcaption-->
          </figure>
          <figure class="slide"><a href="#"><img src="images/2012-05-k12-1.jpg" width="940px" height="360px" alt="" class='bg-slide'></a>
            <!--figcaption class="caption">
              <h2>Slide 4 Caption</h2>
              <p>Dapiensociis temper donec auctortortis cumsan et curabitur condis lorem loborttis leo. Ipsumcommodo libero nunc at in velis tincidunt pellentum tincidunt vel lorem pellus sed mauris enim.</p>
            </figcaption-->
          </figure>
          <figure class="slide"><a href="#"><img src="images/deped_mission.jpg" width="940px" height="360px" alt="" class='bg-slide'></a>
            <!--figcaption class="caption">
              <h2>Slide 5 Caption</h2>
              <p>Dapiensociis temper donec auctortortis cumsan et curabitur condis lorem loborttis leo. Ipsumcommodo libero nunc at in velis tincidunt pellentum tincidunt vel lorem pellus sed mauris enim.</p>
            </figcaption-->
          </figure>
          <figure class="slide"><a href="#"><img src="images/deped_vision.jpg" width="940px" height="360px" alt="" class='bg-slide'></a>
            <!--figcaption class="caption">
              <h2>Slide 6 Caption</h2>
              <p>Dapiensociis temper donec auctortortis cumsan et curabitur condis lorem loborttis leo. Ipsumcommodo libero nunc at in velis tincidunt pellentum tincidunt vel lorem pellus sed mauris enim.</p>
            </figcaption-->
          </figure>
          <!-- / Slide Container -->
        </div>
        <!-- / Controls -->
      </div>
    </section>
    <!-- Features area -->
    <section class="features clear">
      <h1 class="h1_features_head"><hr>F e a t u r e s<hr></h1>
      <article>
        <figure><img src="images/demo/32x32.gif" width="32" height="32" alt=""></figure>
        <strong>Student Information</strong>
        <p>Get easy access to student particulars their grades, schedules, address, parents info, disciplinary records, extracurricular activities, and any reports, anytime.</p>
        <p class="more"><a href="#">Read More &raquo;</a></p>
      </article>
      <article>
        <figure><img src="images/demo/32x32.gif" width="32" height="32" alt=""></figure>
        <strong>Lorum ipsum dolor</strong>
        <p>You can use and modify the template for both personal and commercial use. You must keep all copyright information and credit links in the template and associated files.</p>
        <p class="more"><a href="#">Read More &raquo;</a></p>
      </article>
      <article class="last">
        <figure><img src="images/demo/32x32.gif" width="32" height="32" alt=""></figure>
        <strong>Lorum ipsum dolor</strong>
        <p>For more HTML5 templates visit <a href="http://www.os-templates.com/">free website templates</a>. Orciinterdum condimenterdum nullamcorper elit nam curabitur laoreet met praesenean et iaculum.</p>
        <p class="more"><a href="#">Read More &raquo;</a></p>
      </article>
      <div class="spacer"></div>
      <article>
        <figure><img src="images/demo/32x32.gif" width="32" height="32" alt=""></figure>
        <strong>Lorum ipsum dolor</strong>
        <p>Orciinterdum condimenterdum nullamcorper elit nam curabitur laoreet met praesenean et iaculum. Metridiculis conseque quis iaculum aenean nunc aenean quis nam nis dui.</p>
        <p class="more"><a href="#">Read More &raquo;</a></p>
      </article>
      <article>
        <figure><img src="images/demo/32x32.gif" width="32" height="32" alt=""></figure>
        <strong>Lorum ipsum dolor</strong>
        <p>Orciinterdum condimenterdum nullamcorper elit nam curabitur laoreet met praesenean et iaculum. Metridiculis conseque quis iaculum aenean nunc aenean quis nam nis dui.</p>
        <p class="more"><a href="#">Read More &raquo;</a></p>
      </article>
      <article class="last">
        <figure><img src="images/demo/32x32.gif" width="32" height="32" alt=""></figure>
        <strong>Lorum ipsum dolor</strong>
        <p>Orciinterdum condimenterdum nullamcorper elit nam curabitur laoreet met praesenean et iaculum. Metridiculis conseque quis iaculum aenean nunc aenean quis nam nis dui.</p>
        <p class="more"><a href="#">Read More &raquo;</a></p>
      </article>
    </section>

    <section class="signup-section">
      <div id="signup-container">
        <ul>
          <li class="en_msg">IT'S FREE AND OPEN SOURCE SYSTEM.</li>
          <li class="en_msg">FREE TO USE.</li>
          <li class="en_msg">USERS FRIENDLY.</li>
          <li class="en_msg">NOTE: PLEASE SELECT USER TYPE BEFORE SIGN UP!</li>
        </ul>
        <form action="" method="POST" id='form_user_type'>
          <input type='radio' name='radio_user_type' value="Administrator" id="radio_user_type_admin"/>&nbsp;&nbsp;<label for="radio_user_type_admin" class="lbl_user_type_SP">Administrator</label>&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="radio" name='radio_user_type' value="Secretary" id="radio_user_type_sec"/> &nbsp;&nbsp;<label for="radio_user_type_sec" class="lbl_user_type_SP">Secretary</label><br/>
          <input type="radio" name='radio_user_type' value="Teacher" id="radio_user_type_tech"/>&nbsp;&nbsp;<label for="radio_user_type_tech" class="lbl_user_type_SP">Teacher</label>&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="radio" name='radio_user_type' value="Student" id="radio_user_type_stud"/>&nbsp;&nbsp;<label for="radio_user_type_stud" class="lbl_user_type_SP">Student</label>&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="radio" name='radio_user_type' value="Parent" id="radio_user_type_par"/>&nbsp;&nbsp;<label for="radio_user_type_par" class="lbl_user_type_SP">Parent</label><br/><br/>
          <input type="submit" id="signup_submit" value="Sign Up for FREE" class="btn btn-large btn-success"/>
        </form>
      </div>
    </section>
    <!-- / content body -->
  </div>
</div>
<!-- footer -->
<div class="wrapper row3">
  <footer id="footer" class="clear">
    <p class="fl_left">Copyright &copy; 2012 - All Rights Reserved - <a href="http://www.facebook.com/ramel.coletana" target="_blank">Ramel Relampagos Coletana</a></p>
    <p class="fl_right">Template by <a href="#" title=".....">.....</a></p>
  </footer>
</div>
</body>
</html>
