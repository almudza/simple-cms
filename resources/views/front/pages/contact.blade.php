@extends('user.main')

@section('content')


    <section id="contact">
      <div class="container"> 
        <div class="row">
          <div class="col-md-12">
            <div class="col-lg-12">
              <div class="text-center color-elements">
              <h2>Contact Us</h2>
              </div>
            </div>
            <div class="col-lg-6 col-md-8">
              <form class="inline" id="contactForm" method="post" >
                <div class="row">
                  <div class="col-sm-6 height-contact-element">
                    <div class="form-group">
                      <input type="text" name="first_name" class="form-control custom-labels" id="name" placeholder="FULL NAME" required data-validation-required-message="Please write your name!"/>
                      <p class="help-block text-danger"></p>
                    </div>
                  </div>
                  <div class="col-sm-6 height-contact-element">
                    <div class="form-group">
                      <input type="email" name="email" class="form-control custom-labels" id="email" placeholder="EMAIL" required data-validation-required-message="Please write your email!"/>
                      <p class="help-block text-danger"></p>
                    </div>
                  </div>
                  <div class="col-sm-12 height-contact-element">
                    <div class="form-group">
                      <input type="text" name="message" class="form-control custom-labels" id="message" placeholder="WHAT'S ON YOUR MIND" required data-validation-required-message="Please write a message!"/>
                    </div>
                  </div>
                  <div class="col-sm-3 col-xs-6 height-contact-element">
                    <div class="form-group">
                      <input type="submit" class="btn btn-md btn-custom btn-noborder-radius" value="Send It"/>
                    </div>
                  </div>
                  <div class="col-sm-3 col-xs-6 height-contact-element">
                    <div class="form-group">
                      <button type="button" class="btn btn-md btn-noborder-radius btn-custom" name="reset">RESET
                      </button>
                    </div>
                  </div>
                  <div class="col-sm-3 col-xs-6 height-contact-element">
                    <div class="form-group">
                      <div id="response_holder"></div>
                    </div>
                  </div>
                  <div class="col-sm-12 contact-msg">
                  <div id="success"></div>
                  </div>
                </div>
              </form>
            </div>
            <div class="col-lg-5 col-md-3 col-lg-offset-1 col-md-offset-1">
              <div class="row">
                <div class="col-md-12 height-contact-element">
                  <div class="form-group">
                    <i class="fa fa-2x fa-map-marker"></i>
                    <span class="text">LOCATION</span>
                  </div>
                </div>
                <div class="col-md-12 height-contact-element">
                  <div class="form-group">
                    <i class="fa fa-2x fa-phone"></i>
                    <span class="text">0051 768622115</span>
                   </div>
                 </div>
                <div class="col-md-12 height-contact-element">    
                  <div class="form-group">
                    <i class="fa fa-2x fa-envelope"></i>
                    <span class="text"><a href="malito:mail@demolink.org">mail(at)patros.com</a></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="follow-us">
      <div class="container"> 
        <div class="text-center height-contact-element">
          <h2>FOLLOW US</h2>
        </div>
        <img class="img-responsive displayed" src="{{ asset('user/images/short.png')}}" alt="short" />
        <div class="text-center height-contact-element">
          <ul class="list-unstyled list-inline list-social-icons">
            <li class="active"><a href="#"><i class="fa fa-facebook social-icons"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter social-icons"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus social-icons"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin social-icons"></i></a></li>
          </ul>
        </div>
      </div>
    </section>
@endsection


@section('js')

    <script type="text/javascript">
  $(document).ready(function(){
    inicializemap()

    $('#contactForm').on('submit', function(e){
      e.preventDefault();
      e.stopPropagation();

      // get values from FORM
      var name = $("#name").val();
      var email = $("#email").val();
      var message = $("#message").val();
      var goodToGo = false;
      var messgaeError = 'Request can not be send';
      var pattern = new RegExp(/^(('[\w-\s]+')|([\w-]+(?:\.[\w-]+)*)|('[\w-\s]+')([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);


       if (name && name.length > 0 && $.trim(name) !='' && message && message.length > 0 && $.trim(message) !='' && email && email.length > 0 && $.trim(email) !='') {
          if (pattern.test(email)) {
           goodToGo = true;
          } else {
           messgaeError = 'Please check your email address';
           goodToGo = false; 
          }
       } else {
         messgaeError = 'You must fill all the form fields to proceed!';
         goodToGo = false;
       }

       
      if (goodToGo) {
         $.ajax({
         data: $('#contactForm').serialize(),
         beforeSend: function() {
           $('#success').html('<div class="col-md-12 text-center"><img src="images/spinner1.gif" alt="spinner" /></div>');
         },
         success:function(response){
           if (response==1) {
           $('#success').html('<div class="col-md-12 text-center">Your email was sent successfully</div>');
           window.location.reload();
           } else {
           $('#success').html('<div class="col-md-12 text-center">E-mail was not sent. Please try again!</div>');
           }
         },
         error:function(e){
           $('#success').html('<div class="col-md-12 text-center">We could not fetch the data from the server. Please try again!</div>');
         },
         complete: function(done){
           console.log('Finished');
         },
         type: 'POST',
         url: 'js/send_email.php', 
         });
         return true;
      } else {
         $('#success').html('<div class="col-md-12 text-center">'+messgaeError+'</div>');
         return false;
      }
      return false;
    });
  });

@endsection