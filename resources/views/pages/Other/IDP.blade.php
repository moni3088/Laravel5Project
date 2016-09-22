<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IDP kursinis</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Custom CSS -->
    <link href="css/kursinis.css" rel="stylesheet">

    <link rel="stylesheet" href="css/animate.min.css">

    <!-- Custom Fonts -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="js/jquery-1.12.3.min.js"</script>

    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="js/bootstrap.min.js"</script>

    <!-- Custom Theme JavaScript -->
    <!-- <script src="js/kursinis.js"></script> -->

</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navigation" >
        <div class="container-fluid">
                <ul class="nav navbar-nav virsus">
                    <li class="prMenu">
                        <img src="img/Headphones Filled-100.png">
                        <a class="dropdown" href="#">{{$fullname}}</a>
                        <ul class="drop-ul">
                            <li><a href="denon">Denon</a></li>
                            <li><a href="focal">Focal</a></li>
                            <li><a href="grado">Grado</a></li>
                        </ul>
                        <ul class="drop-ul2">
                            <li>
                                <a class="" href="\information">Information</a>
                            </li>
                            <li>
                                <a class="" href="\contacts">Contacts</a>
                            </li>
                            <li>
                                <a class="" href="\gallery">GALLERY</a>
                            </li>
                        </ul>
                    </li>
                    <li class="slept">
                        <img src="img/Automatic-100.png">
                        <a href="about">Information</a>
                    </li>
                    <li class="slept">
                        <img src="img/contacts-100.png">
                        <a href="contacts">CONTACTS</a>
                    </li>
                    <li class="slept">
                        <img src="img/Stack of Photos-96.png">
                        <a href="gallery">GALLERY</a>
                    </li>
                </ul>
            </div>
    </nav>

<div data-role="page" class="container-fluid" id="main">
        <div class="row">
			<div class="col-sm-12"></div>
        </div>
</div>

<div class="container-fluid" style="height: 10%;" >
   <div class="row" style="height: 100%; width: 100%;">
		<div class="col-sm-12" id="apaciaMain" style="height: 100%; display: table;">
			<div class="vert" >
			   <ul class="nav navbar-nav apacia">
			       <li class="hidden">
			           <a href="#page-bottom"></a>
			       </li>
			       <li class="animated bounce">
			           <img src="img/tumblr.png">
			       </li>
			       <li>
			           <img src="img/twitter.png">
			       </li>
			       <li>
			           <img src="img/facebook.png">
			       </li>
			   </ul>
			</div>
		</div>
	</div>
</div>

<script>
    // var animationName = 'animated pulse';
    // $(function () {
    // var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
    //     $('li').addClass(animationName).one(animationEnd, function() {
    //         $(this).removeClass(animationName);
    //     });

    // });

</script>

</body>

</html>
