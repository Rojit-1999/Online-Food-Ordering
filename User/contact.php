<?php
    //the contact us won't Form work with local host but it will work on live server
    if(isset($_REQUEST['submit']))  {
        if(($_REQUEST['name'] == "")||($_REQUEST['subject'] == "")||($_REQUEST['email'] == "")||($_REQUEST['message'] == "")){
            $regmsg = '<div class="alert alert-warning mt-2" role="alert">All Fields are Required</div>';
        }else{
            
            $Name=$_REQUEST['name'];
            $Subject=$_REQUEST['subject'];
            $Email=$_REQUEST['email'];
            $Message=$_REQUEST['message'];

            $mailTo = "sahuharikesh0@gmail.com";
            $headers = "From:".$Email;
            $txt = "You have received an email from ". $Name."\n\n".$Message;
            mail($mailTo, $Subject, $txt, $headers);
            $regmsg = '<div class="alert alert-warning mt-2" role="alert">Sent Successfully...</div>';
            echo '<meta http-equvi="refresh" content= "0;URL=?deleted"/>';

        }
    }
    
?>
<!-- Contact form -->
<section class="contact" id="contact">
    <div class="container text-center text-white pt-3">
      <p><i>We're here to help & answer any question you might have. We look forward to hearing from you</i>
         <i class="fas fa-smile text-warning fa-2x"></i></p>
  </div>
  <div class="container pt-3">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-10 offset-lg-2 offset-md-2 offset-1">
      <form action="" method="POST">
      <div class="form-group">
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your Name" autocomplete="off" required>
      </div>
      <div class="form-group">
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" autocomplete="off" required>
      </div>
      <div class="form-group">
          <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject " autocomplete="off" required>
        </div>
        <div class="form-group">
            <textarea class="form-control" rows="3"  placeholder="How can we help you ?" name="message"></textarea>
          <div  class="d-flex justify-content-center pt-3 form-button">
          <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            
          </div>   
          <?php if(isset($regmsg)) { echo $regmsg;} ?>
        </form>

      </div>
    </div>
  </div>
  </section>
