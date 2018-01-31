      // Navbar Shadow 
      $(document).ready(function(){
        $(window).scroll(function(){
          if($(this).scrollTop()>10){
            $("nav.navbar").addClass("shadowNavbar");
          } else if ($(this).scrollTop() == 0) {
            $("nav.navbar").removeClass("shadowNavbar");
          } else {
            return false;
          }
        });
      });



      // Scroll Up jQuery 
      $(document).ready(function(){

        // Chek jika di scroll ke atas, muncul dan sembunyi
        $(window).scroll(function(){
          if ($(this).scrollTop() >100){
            $('#scrollUp').fadeIn();
          } else {
            $('#scrollUp').fadeOut();
          }
        });

        // Click ke atas dengan animasi scroll Up
        $("#scrollUp").click(function(){
          $("html, body").animate({scrollTop : 0},800);
          return false;
        });
      });

