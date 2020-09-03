<script type="text/javascript" src="{{ url('') }}/admin-asset/files/bower_components/jquery/js/jquery.min.js"></script>
<script type="text/javascript" src="{{ url('') }}/admin-asset/files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="{{ url('') }}/admin-asset/files/bower_components/popper.js/js/popper.min.js"></script>
<script type="text/javascript" src="{{ url('') }}/admin-asset/files/bower_components/bootstrap/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>

<script>





$.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});


var resize = $('#upload-demo').croppie({
    enableExif: true,
    enableOrientation: true,    
    viewport: { // Default { width: 100, height: 100, type: 'square' } 
        width: 200,
        height: 200,
        type: 'circle' //square
    },
    boundary: {
        width: 300,
        height: 300
    }
});


$('#image').on('change', function () { 
  var reader = new FileReader();
    reader.onload = function (e) {
      resize.croppie('bind',{
        url: e.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
});

$('.upload-image').on('click', function (ev) {
      resize.croppie('result', {
        type: 'canvas',
        size: 'viewport'
      }).then(function (img) {
        console.log(img);
        $.ajax({
          url: "{{ url('admin/crop-image') }}",
          type: "POST",
          data: {"image":img},
          success: function (data) {
            window.location.reload();
            html = '<img src="' + img + '" />';
            $("#preview-crop-image").html(html);
          }
        });
      });
    });




$(document).ready(function(){   
     $("#sortable3").sortable({     
        update: function( event, div ) {
            updateAchive();
        }
    });  
});

    function updateAchive() {    
    var item_order = new Array();
    $('#sortable3 .vl').each(function() {
         item_order.push($(this).attr("id"));
    });
    console.log(item_order);
    var order_string = 'order='+item_order;
    $.ajax({
        type: "GET",
        url: "{{url('')}}/admin/skillscategory/order",
        data: order_string,
        cache: false,
        success: function(data){            
        }
    });
}

// $('#Notifi').on('Clearone',function(event){ 
//     // event.preventDefault();
//     // var view = 1;
//     console.log('work!');
//     // $.ajax({
//     //         url:"{{ url('') }}/admin/clearall",
//     //         type:"POST",
//     //         data:{
//     //         "_token": "{{ csrf_token() }}",
//     //         view:view,
//     //       },
//     //       success:function(response){
//     //         console.log('cleared');
            
//     //       },

//     // });
// });
$(document).ready(function() {  
    $('#Clearone').click(function(event) {
       console.log('work!');
       var view = 1;
       console.log('work!');
        $.ajax({
                url:"{{ url('') }}/admin/clearall",
                type:"POST",
                data:{
                "_token": "{{ csrf_token() }}",
                view:view,
            },
            success:function(response){
                console.log('cleared');
                $("#clear_count").css("visibility", "hidden");
                $("#clearcountside").css("visibility", "hidden");
                $("#shownotifi").css('display','block');
                $(".the_message").css('display','none');
                
            },

        });
    });
});

$(document).ready(function() { 
    $( "#opacity" ).change(function() {
         
         var opacity = $('#opacity').val();
         console.log(opacity);
         $.ajax({
            url:"{{ url('') }}/admin/resolution",
            type:"POST",
            data:{
            "_token": "{{ csrf_token() }}",
            opacity:opacity,
            },success:function(response){
                console.log('cleared');
            },

         });
    })
});
</script>






  



<script type="text/javascript" src="{{ url('') }}/admin-asset/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>

<script  type="text/javascript" src="{{ url('') }}/admin-asset/files/bower_components/modernizr/js/modernizr.js"></script>
<script type="text/javascript" src="{{ url('') }}/admin-asset/files/bower_components/modernizr/js/css-scrollbars.js"></script>

<script src="{{ url('') }}/admin-asset/files/assets/pages/nestable/jquery.nestable.js" type="text/javascript"></script>
<script src="{{ url('') }}/admin-asset/files/assets/pages/nestable/custom-nestable.js" type="text/javascript"></script>

<script type="text/javascript" src="{{ url('') }}/admin-asset/files/bower_components/switchery/js/switchery.min.js"></script>

<script type="text/javascript" src="{{ url('') }}/admin-asset/files/assets/pages/j-pro/js/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="{{ url('') }}/admin-asset/files/assets/pages/j-pro/js/jquery.j-pro.js"></script>


<script type="text/javascript" src="{{ url('') }}/admin-asset/files/bower_components/bootstrap-tagsinput/js/bootstrap-tagsinput.js"></script>
<script src="{{ url('') }}/admin-asset/files/cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.10.4/typeahead.bundle.min.js" type="text/javascript"></script>

<script type="text/javascript" src="{{ url('') }}/admin-asset/files/bower_components/bootstrap-maxlength/js/bootstrap-maxlength.js"></script>

<script type="text/javascript" src="{{ url('') }}/admin-asset/files/bower_components/i18next/js/i18next.min.js"></script>
<script type="text/javascript" src="{{ url('') }}/admin-asset/files/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script>
<script type="text/javascript" src="{{ url('') }}/admin-asset/files/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js"></script>
<script type="text/javascript" src="{{ url('') }}/admin-asset/files/bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>
{{-- setting --}}
<script type="text/javascript" src="{{ url('') }}/admin-asset/files/assets/pages/advance-elements/moment-with-locales.min.js"></script>
<script type="text/javascript" src="{{ url('') }}/admin-asset/files/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="{{ url('') }}/admin-asset/files/assets/pages/advance-elements/bootstrap-datetimepicker.min.js"></script>

<script type="text/javascript" src="{{ url('') }}/admin-asset/files/bower_components/bootstrap-daterangepicker/js/daterangepicker.js"></script>

<script type="text/javascript" src="{{ url('') }}/admin-asset/files/bower_components/datedropper/js/datedropper.min.js"></script>

<script src="{{ url('') }}/admin-asset/files/bower_components/datatables.net/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="{{ url('') }}/admin-asset/files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
<script src="{{ url('') }}/admin-asset/files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>
<script src="{{ url('') }}/admin-asset/files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js" type="text/javascript"></script>
<script src="{{ url('') }}/admin-asset/files/assets/pages/chart/echarts/js/echarts-all.js" type="text/javascript"></script>
<script src="{{ url('') }}/admin-asset/files/assets/pages/user-profile.js" type="text/javascript"></script>
{{-- ./setting --}}

<script type="text/javascript" src="{{ url('') }}/admin-asset/files/assets/pages/advance-elements/swithces.js"></script>
{{-- <script type="6832da077c7f630111f86fc0-text/javascript" src="{{ url('') }}/admin-asset/files/assets/pages/advance-elements/swithces.js"></script> --}}
<script src="{{ url('') }}/admin-asset/files/assets/js/pcoded.min.js" type="text/javascript"></script>
<script src="{{ url('') }}/admin-asset/files/assets/js/vartical-layout.min.js" type="text/javascript"></script>
<script src="{{ url('') }}/admin-asset/files/assets/js/jquery.mCustomScrollbar.concat.min.js" type="text/javascript"></script>
<script type="text/javascript" src="{{ url('') }}/admin-asset/files/assets/js/script.js"></script>
<script src="//cdn.ckeditor.com/4.14.1/full/ckeditor.js"></script>

    <script>
      var options = {
        filebrowserImageBrowseUrl: "{{ url('') }}/laravel-filemanager?type=Images",
        filebrowserImageUploadUrl: "{{ url('') }}/laravel-filemanager/upload?type=Images&_token=",
        filebrowserBrowseUrl: "{{ url('') }}/laravel-filemanager?type=Files",
        filebrowserUploadUrl: "{{ url('') }}/laravel-filemanager/upload?type=Files&_token="
      };
      CKEDITOR.replace( 'summary-ckeditor',options);
</script>


<script src="{{ url('') }}/admin-asset/files/ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="6832da077c7f630111f86fc0-|49" defer=""></script>