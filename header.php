<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Run Together</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="static/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 20px;
        padding-bottom: 40px;
      }

      /* Custom container */
      .container-narrow {
        margin: 0 auto;
        max-width: 800px;
      }
      .container-narrow > hr {
        margin: 30px 0;
      }

      /* Main marketing message and sign up button */
      .jumbotron {
        margin: 60px 0;
        text-align: center;
        background-image: url('static/img/frontpic.png');
        background-size: 100%;
        padding: 25px;
      }
      .jumbotron h1 {
        font-size: 72px;
        line-height: 1;
      }
      .jumbotron .btn {
        font-size: 21px;
        padding: 14px 24px;
      }

      /* Supporting marketing content */
      .marketing {
        margin: 60px 0;
      }
      .marketing p + h4 {
        margin-top: 28px;
      }
      
      .box {
	      background-color: #F8F8F8;
	      border-radius: 5px;
	      padding: 15px;
      }
      
      .headingtext {
	      font-weight: bold;
      }

      .headingtext2 {
	      font-weight: bold;
	      font-size: 16px;
      }
      
      #space {
	      height: 10px;
      }
      
      .rightborder {
	      border-right: 1px dashed #333;
      }
      
      #mapview {
	      height: 300px;
      }
      
    </style>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="ico/favicon.png">
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen"
     href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">
     
     <style type="text/css">
        #map-canvas {height:100%;}
    </style>
      
  </head>

  <body>
      <script src="http://code.jquery.com/jquery.js"></script>
	  <script src="static/js/bootstrap.min.js"></script>
	  <div class="container-narrow">
      <div class="masthead">
        <ul class="nav nav-pills pull-right">
          <li><a href="http://asiaoffshore.shekbagg.com">Home</a></li>
          <li><a href="#">About</a></li>          
          <li><a href="myprofile.php">Profile</a></li>
       
        </ul>
        <a style="text-decoration:none;" href="http://asiaoffshore.shekbagg.com"><h3 class="muted"><img src="static/img/runlogo.png" height="40" width="40"> Run Together</h3></a>
      </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?v=3.exp&libraries=geometry&sensor=false"></script>
   
    <script src="routeCreate.js"></script>
</body>