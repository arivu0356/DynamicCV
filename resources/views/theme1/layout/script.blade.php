
<!--
==============
* JS Files *
==============
-->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<!-- jQuery -->
<script src="{{ url('') }}/theme1/assets/plugins/js/jquery.min.js"></script>

<script>
 
$('#Thecontact').on('submit',function(e){


  $("#submit").attr("disabled", true); 
  e.preventDefault();
    var name = $('#name').val();
    var email = $('#email').val();
    var message = $('#message').val();
     
    $.ajax({

            url:"{{ url('') }}/mail",
            type:"POST",
            data:{
            "_token": "{{ csrf_token() }}",
            name:name,
            email:email,
            message:message,
          },
          success:function(response){

            
            // console.log(response);
            $("#Thecontact")[0].reset();
          //  $('#themessage').append("<div class='alert alert-success'><h5 style='color:white;margin-bottom: 0px;'//  >Thank you for getting in touch!</h5></div>");
            $('#divSuccessmail').fadeIn( 0 )  ;
                   $('#Thecontact').fadeOut( 0 ) ; 
          $('#divSuccessmail').delay(3000).fadeOut( 0 );            
  $('#Thecontact').delay( 3000 ).fadeIn( 1000 );
  
  $("#submit").attr("disabled", false);    
          
          
          },
          
         });
         
});
 
      $('#CommentPost').on('submit',function(event){ 
         
         event.preventDefault();
         var postid = $('#postid').val();
         var slug = $('#slug').val();
         var username = $('#username').val();
         var email = $('#email').val();
         var comment = $('#comment').val();
         console.log('testing')
         $.ajax({
            url:"{{ url('') }}/post/comment",
            type:"POST",
            data:{
            "_token": "{{ csrf_token() }}",
            postid:postid,
            slug:slug,
            username:username,
            email:email,
            comment:comment,
          },
          success:function(response){
            // console.log(response);
            $("#CommentPost")[0].reset();
            $('.single-comment-append').append(response);
            
          },

         });
      });
      // console.log($('#slug').val());

      var time = '<?php date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
                           echo date(" h:i:s A");?>';
      var date = '<?php date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
      echo date('d-m-Y');?>';
      var ip = '<?php echo getenv("REMOTE_ADDR"); ?>';      
      var agent ='<?php echo $_SERVER['HTTP_USER_AGENT']; ?>'; 
      var url = "{{ url('') }}";   
      var page = "{{ $_SERVER['REQUEST_URI'] }}";          
      $( document ).ready(function() {
         
            $.ajax({
            type: "get",
            url: '{{ url('') }}/analytic',
            data: ({ip: ip,date: date,time: time,agent: agent,url:url,page:page}), 
            success: function(data) {   
                     console.log('success');
               }  
            });
      });

$(document).ready(function() {  
    $('#Cvdownload').click(function(event) {
       console.log('work!');
      var thetime = '<?php date_default_timezone_set("Asia/Calcutta"); echo date(" h:i:s A"); ?>';   //India time (GMT+5:30)
      var thedate = '<?php date_default_timezone_set("Asia/Calcutta"); echo date('d-m-Y'); ?>'; //India time (GMT+5:30)
       console.log('work!');
        $.ajax({
                url:"{{ url('') }}/cv/download",
                type:"POST",
                data:{
                "_token": "{{ csrf_token() }}",
                date:thetime,
                time:thedate,
            },
            success:function(response){
                // console.log('cv download');
            },

        });
    });
});


    


</script>
<!-- popper -->
<script src="{{ url('') }}/theme1/assets/plugins/js/popper.min.js"></script>
<!-- bootstrap -->
<script src="{{ url('') }}/theme1/assets/plugins/js/bootstrap.min.js"></script>
<!-- owl carousel -->
<script src="{{ url('') }}/theme1/assets/plugins/js/owl.carousel.js"></script>
<!-- validator -->
<script src="{{ url('') }}/theme1/assets/plugins/js/validator.min.js"></script>
<!-- wow -->
<script src="{{ url('') }}/theme1/assets/plugins/js/wow.min.js"></script>
<!-- mixin js-->
<script src="{{ url('') }}/theme1/assets/plugins/js/jquery.mixitup.min.js"></script>
<!-- circle progress-->
<script src="{{ url('') }}/theme1/assets/plugins/js/circle-progress.js"></script>
<!-- jquery nav -->
<script src="{{ url('') }}/theme1/assets/plugins/js/jquery.nav.js"></script>
<!-- Fancybox js-->
<script src="{{ url('') }}/theme1/assets/plugins/js/jquery.fancybox.min.js"></script>
<!-- isotope js-->
<script src="{{ url('') }}/theme1/assets/plugins/js/isotope.pkgd.js"></script>
<script src="{{ url('') }}/theme1/assets/plugins/js/packery-mode.pkgd.js"></script>
<!-- Map api -->
<script src="//maps.googleapis.com/maps/api/js?v=3.exp&amp;key=AIzaSyCRP2E3BhaVKYs7BvNytBNumU0MBmjhhxc"></script>
<!-- Custom Scripts-->
<script src="{{ url('') }}/theme1/assets/js/map-init.js"></script>
<script src="{{ url('') }}/theme1/assets/js/custom-scripts.js"></script>
<script id="rendered-js">
$( document ).ready(function() {
     $(".alert").fadeOut(5000);
    });
$("#accordion").on("hide.bs.collapse show.bs.collapse", e => {
$(e.target).
prev().
find("i:last-child").
toggleClass("fa-minus fa-plus");
});
//# sourceURL=pen.js
</script>

 <!-- athemeart templates js -->

    <!-- Optional JavaScript _____________________________  -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- jQuery -->
   
    <!-- Animated Headline (Text Rotator)-->
    <script src="{{ url('') }}/theme1/assets/plugins/animated-headline-master/main.js"></script>
   

