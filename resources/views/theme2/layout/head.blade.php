<!doctype html>
<html lang="en">

<head>
   
   
      <title>  {{ (request()->is('blog/*')) ?  $blog[0]->title  : $seo[0]->title }} </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="description" content=" <?php if(request()->is('blog/*')){ echo $blog[0]->meta; }else{ echo $seo[0]->description; } ?>" />
    <!-- seo keywords -->
    <meta name="keywords" content="{{ $seo[0]->keywords }}" />
  
    <meta property="og:title" content="{{ (request()->is('blog/*')) ?  $blog[0]->title  : $seo[0]->og_title }}" />
    <meta property="og:url" content="{{ $seo[0]->og_url }}" />
    <meta property="og:description" content="<?php if(request()->is('blog/*')){ echo $blog[0]->meta; }else{ echo $seo[0]->og_description; } ?>"
    />
    {{-- twitter --}}
    <meta name="twitter:title" content="{{ (request()->is('blog/*')) ?  $blog[0]->title  : $seo[0]->twitter_title }}">
    <meta name="twitter:description" content="<?php if(request()->is('blog/*')){ echo $blog[0]->meta; }else{ echo $seo[0]->twitter_description; } ?>">
    <meta name="twitter:url" content="{{ $seo[0]->twitter_url }}">

    {!! $seo[0]->other_tags  !!}
   
   
   
   
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- FAV AND ICONS   -->
    <link rel="shortcut icon" href="{{ url('') }}/theme2/assets/images/iconpp.ico">
    <link rel="shortcut icon" href="{{ url('') }}/theme2/assets/images/apple-icon.png">
    <link rel="shortcut icon" sizes="72x72" href="{{ url('') }}/theme2/assets/images/apple-icon-72x72.png">
    <link rel="shortcut icon" sizes="114x114" href="{{ url('') }}/theme2/assets/images/apple-icon-114x114.png">

    <!-- Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('') }}/theme2/assets/icons/font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('') }}/theme2/assets/plugins/css/bootstrap.min.css">
    <!-- Animate CSS-->
    <link rel="stylesheet" href="{{ url('') }}/theme2/assets/plugins/css/animate.css">
    <!-- Owl Carousel CSS-->
    <link rel="stylesheet" href="{{ url('') }}/theme2/assets/plugins/css/owl.css">
    <!-- Fancybox-->
    <link rel="stylesheet" href="{{ url('') }}/theme2/assets/plugins/css/jquery.fancybox.min.css">
    <!-- Custom CSS-->
    <link rel="stylesheet" href="{{ url('') }}/theme2/assets/css/styles.css">
    <link rel="stylesheet" href="{{ url('') }}/theme2/assets/css/responsive.css">
    
    <!-- timeline -->
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/theme2/assets/css/timeline.css">
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/theme2/css/education.css">


    <!-- Testing with athemeart template -->
        <link rel="stylesheet" type="text/css" href="{{ url('') }}/theme2/css/style.css">


        <!-- Color Css -->
  


    
    <!-- Colors -->
    <link rel="alternate stylesheet" href="{{ url('') }}/theme2/assets/css/colors/blue.css" title="blue">
    <link rel="stylesheet" href="{{ url('') }}/theme2/assets/css/colors/defauld.css" title="defauld">
    <link rel="alternate stylesheet" href="{{ url('') }}/theme2/assets/css/colors/green.css" title="green">
    <link rel="alternate stylesheet" href="{{ url('') }}/theme2/assets/css/colors/blue-munsell.css" title="blue-munsell">
    <link rel="alternate stylesheet" href="{{ url('') }}/theme2/assets/css/colors/orange.css" title="orange">
    <link rel="alternate stylesheet" href="{{ url('') }}/theme2/assets/css/colors/purple.css" title="purple">
    <link rel="alternate stylesheet" href="{{ url('') }}/theme2/assets/css/colors/slate.css" title="slate">
    <link rel="alternate stylesheet" href="{{ url('') }}/theme2/assets/css/colors/yellow.css" title="yellow">
   <!--  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.6.3/css/all.css'> -->
 <style type="text/css">
     
     <style type="text/css">


   .imgcss {
    /* height: 400px; */
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 80%;
    margin-top: 38px;
}

     


        .myaccordion .card,
        .myaccordion .card:last-child .card-header {
            border: none;
        }

        .myaccordion .card-body {
        }

        .myaccordion .fa-stack {
            font-size: 18px;
        }

        .myaccordion .btn {
            width: 100%;
            font-weight: bold;
            color: #0bceaf;
            padding: 0;
        }

        .myaccordion .btn-link:hover,
        .myaccordion .btn-link:focus {
            text-decoration: none;
        }

        .headerwhitetheme {
            border-bottom-color: #0bceaf;
            
        }

        .headerblacktheme {
            border-bottom-color: #0bceaf;
            background: #100e17;
        }

        .bodyblacktheme {
            background: #100e17;
        }

        .bodywhitetheme {
            
        }
        button.d-flex.align-items-center.justify-content-between.btn.btn-link.collapsed.bthemeAccHead {
    color: #fff;
}

button.d-flex.align-items-center.justify-content-between.btn.btn-link.collapsed.wthemeAccHead {
    color: #000;
}


button.d-flex.align-items-center.justify-content-between.btn.btn-link.wthemeAccHead {
     color: #000;
}

button.d-flex.align-items-center.justify-content-between.btn.btn-link.bthemeAccHead {
     color: #fff;
}


        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 28px;
        }

            .switch input {
                opacity: 0;
                width: 0;
                height: 0;
            }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #202026;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
                position: absolute;
                content: "";
                height: 20px;
                width: 20px;
                left: 4px;
                bottom: 4px;
                background-color: white;
                -webkit-transition: .4s;
                transition: .4s;
            }

        input:checked + .slider {
            background-color: #ccc;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px white;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 25px;
        }

            .slider.round:before {
                border-radius: 50%;
            }

            .home-2-img {
  background-image: url({{ url('') }}/{{ $assetimg[0]->storage }});
}

.white-vertion .img-color-overlay {
             background-color: rgba(0, 0, 0, 0.{{ $themeapply[0]->opacity }}); 
           }
           
           .dark-vertion .img-color-overlay {
           background-color: rgba(0, 0, 0, 0.{{ $themeapply[0]->opacity }}); 
         }

    </style>

    <script type="text/javascript">
        function themeChange() {
            var checkBox = document.getElementById("chk_theme"); 
            if (checkBox.checked == true){ 
              $('.headerwhitetheme').removeClass('headerwhitetheme').addClass('headerblacktheme');
                $('.bodywhitetheme').removeClass('bodywhitetheme').addClass('bodyblacktheme');
               
                $('.white-vertion').removeClass('white-vertion').addClass('dark-vertion');
                $('.descriptionwhite').removeClass('descriptionwhite').addClass('description');
                  $('.wthemeAccHead').removeClass('wthemeAccHead').addClass('bthemeAccHead');
            } else {
              $('.headerblacktheme').removeClass('headerblacktheme').addClass('headerwhitetheme');
                $('.bodyblacktheme').removeClass('bodyblacktheme').addClass('bodywhitetheme');
               
                $('.dark-vertion').removeClass('dark-vertion').addClass('white-vertion'); 
                $('.description').removeClass('description').addClass('descriptionwhite');
                   $('.bthemeAccHead').removeClass('bthemeAccHead').addClass('wthemeAccHead');
               
            }
        }
        
        
        
        
    </script>

</head>