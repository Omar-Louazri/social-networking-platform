<nav class="navbar" style='z-index:111;'>
        <div class="drop-brand">
                <a class="navbar-brand brand" href="home">Brand name</a>
        </div>
    <div class="drops-container">
      <div class="drop-btn">
          Drop down <span class="fa fa-caret-down"></span>
        </div>

        <div class="drop-btn2" style="display:none;">
          Drop down <span class="fa fa-caret-down"></span>
        </div>

      <div class="drop-noti">
          <span class="fa fa-bell"></span>
          <span class="label label-pill label-danger count" style="border-radius: 50%;position: absolute;z-index: 99;background: #e34e4e;width: 20px;height: 20px;font-size:small;"></span>
        </div>
    </div>
                <div class="wrapper-noti" id="notification_bar" style="padding:0 !important;">
                    <ul class="notif" style="overflow-y: scroll;"><a href="home?dlt="></a></ul>
                </div>
      <div class="tooltip"></div>
      <div class="wrapper" style="display:none;">
        <ul class="menu-bar">
          <li><a href="home"><div class="icon"><span class="fa fa-home"></span></div>Home </a></li>
          <li><a href="@<?php  echo $fetch_info['name']; ?> "><div class="icon"><span class="fa fa-user"></span></div>My Profile </a></li>
          <li class="setting-item"><a href="#"><div class="icon"><span class="fa fa-cog"></span></div>Settings & privacy <i class="fa fa-angle-right"></i></a></li>
          <li class="help-item"><a href="#"><div class="icon"><span class="fa fa-question-circle"></span></div>Help & support <i class="fa fa-angle-right"></i></a></li>
          <li class="contact-item"><a href="#"><div class="icon"><span class="fa fa-comment"></span></div>Contact Us <i class="fa fa-angle-right"></i></a></li>
        </ul>

        <!-- Settings & privacy Menu-items -->
        <ul class="setting-drop">
          <li class="arrow back-setting-btn"><span class="fa fa-arrow-left"></span>Settings & privacy</li>
          <li><a href="#">
            <div class="icon">
              <span class="fa fa-user"></span></div>
            Personal info </a></li>
            <li><a href="Reset/User-Password.php">
              <div class="icon">
                <span class="fa fa-lock"></span></div>
                Password </a></li>
            <li><a href="#">
              <div class="icon">
                <span class="fa fa-address-book"></span></div>
                Activity log </a></li>
           <li><a href="#">
              <div class="icon">
                <span class="fa fa-globe"></span></div>
                Languages </a></li>
           <li><a href="Logout">
              <div class="icon">
                <span class="fa fa-sign-out"></span></div>
                Log out </a></li>
        </ul>

        <!-- Help & support Menu-items -->
        <ul class="help-drop">
          <li class="arrow back-help-btn"><span class="fa fa-arrow-left"></span>Help & support</li>
          <li><a href="#"><div class="icon"><span class="fa fa-question-circle"></span></div>Help centre </a></li>
          <li><a href="#"><div class="icon"><span class="fa fa-envelope"></span></div>Support Inbox </a></li>
          <li><a href="#"><div class="icon"><span class="fa fa-comment-alt"></span></div>Send feedback </a></li>
          <li><a href="#"><div class="icon"><span class="fa fa-exclamation-circle"></span></div>Report problem </a></li>
        </ul>

        <!--  contact drop  -->
        <ul class="contact-drop">
          <li class="arrow back-contact-btn"><span class="fa fa-arrow-left"></span>Contact Us</li>
          <li><a href="#"><div class="icon"><span class="fa fa-question-circle"></span></div>Support Guid</a></li>
          <li><a href="#"><div class="icon"><span class="fa fa-envelope"></span></div>Support Mail</a></li>
          <li><a href="#"><div class="icon"><span class="fa fa-comment"></span></div>Terms & Conditions</a></li>
          <li><a href="#"><div class="icon"><span class="fa fa-comment"></span></div>Connect With Costumer </a></li>
        </ul>

      </div>
    </nav>



<br>
<br>
