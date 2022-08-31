<!DOCTYPE html>
<html lang="en">

<head>

    <title>Ristorante Con Fusion: About Us</title>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
    <link rel="stylesheet" type="text/css" href="style.css"> 
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-sm fixed-top">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">Ristorante Con Fusion</a>
            <div class="collapse navbar-collapse" id="Navbar">
                <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a class="nav-link" href="./index.html"><span class="fa fa-home fa-lg"></span> Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="./aboutus.html"><span class="fa fa-info fa-lg"></span> About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#"><span class="fa fa-list fa-lg"></span> Menu</a></li>
                        <li class="nav-item active"><a class="nav-link" href="#"><span class="fa fa-address-card fa-lg"></span> Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="jumbotron">
        <div class="container">
            <div class="row row-header">
                <div class="col-12 col-sm-6">
                    <h1>Ristorante con Fusion</h1>
                    <p>We make a living by what we get but we make a life by what we give</p>
                </div>
                <div class="col-12 col-sm">
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <ol class="col-12 breadcrumb">
                <li class="breadcrumb-item"><a href="./index.html">Home</a></li>
                <li class="breadcrumb-item active">Contact Us</li>
            </ol>
            <div class="col-12">
               <h3>Contact Us</h3>
               <hr>
            </div>
        </div>

        <div class="row row-content">
           <div class="col-12">
              <h3>Location Information</h3>
           </div>
            <div class="col-12 col-sm-4 offset-sm-1">
                   <h5>Our Address</h5>
                    <address style="font-size: 100%">
		              CENTRE RAMIRO Orphanage<br>
                      Busanza Cell<br>
                      KICUKIRO District<br>
                      KIGALI City<br>
		              <i class="fa fa-phone"></i>: +250786529470<br>
		              <i class="fa fa-fax"></i>: +250726313208<br>
		              <i class="fa fa-envelope"></i>:
                        <a href="mailto:ramiroorphanage@rwanda.net">ramiroorphanage@rwanda.net</a>
		           </address>
            </div>
            <div class="col-12 col-sm-6 offset-sm-1">
                <h5>Map of our Location</h5>
            </div>
            <div class="col-12 col-sm-11 offset-sm-1">
                
                <div class="btn-group" role="group">
                    <a role="button" class="btn btn-primary" href="tel:+250781167275"><i class="fa fa-phone"></i> Call</a>
                    <a role="button" class="btn btn-info"><i class="fa fa-skype"></i> Skype</a>
                    <a role="button" class="btn btn-success" href="mailto:confusion@food.net"><i class="fa fa-envelope-o"></i> Email</a>
                </div>
            </div>
        </div>

        <div class="row row-content">
           <div class="col-12">
              <h3>Send us your Feedback</h3>
           </div>
            <div class="col-12 col-md-9">
                <form>
                <div class="form-group row">
                    <label for="firstname" class="col-md-2 col-form-label">First name</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lastname" class="col-md-2 col-form-label">Last name</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="lastname" name="laststname" placeholder="Last name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="telnum" class="col-12 col-md-2 col-form-label">Code&Tel </label>
                    <div class="col-5 col-md-3">
                        <input type="text" class="form-control" id="areacode" name="areacode" placeholder=" Area Code">
                    </div>
                    <div class="col-7 col-md-7">
                        <input type="text" class="form-control" id="telnum" name="telnum" placeholder="Tel Number">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lastname" class="col-md-2 col-form-label">Email</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 offset-md-2">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="approve" id="approve" value="">
                        <label class="form-check-label" for="approve"></label>
                        <strong>May we contact you?</strong>
                        </div>
                    </div>    
                    <div class="col-md-3 offset-md-1">
                        <select class="form-control">
                            <option>Tel.</option>
                            <option>Email</option>
                        </select>
                    </div>   
                </div>
                <div class="form-group row">
                    <label for="feedback" class="col-md-2 col-form-label">Your feedback</label>
                    <div class="col-md-10">
                        <textarea type="textarea" class="form-control" id="feedback" name="feedback" rows="12">
                        </textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="offset-md-2 col-md-10">
                        <button type="submit" class="btn btn-primary">
                            Send feedback
                        </button>
                    </div>
                </div>
                </form>
            </div>
             <div class="col-12 col-md">
            </div>
       </div>

    </div>

    <footer class="footer">
        <div class="container">
            <div class="row">             
                <div class="col-4 offset-1 col-sm-2">
                    <h5>Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Menu</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="col-7 col-sm-5">
                    <h5>Our Address</h5>
                    <address>
		              CENTRE RAMIRO Orphanage<br>
                      Busanza Cell<br>
                      KICUKIRO District<br>
                      KIGALI City<br>
                      <i class="fa fa-phone fa-lg"></i>: +250786529470<br>
                      <i class="fa fa-fax fa-lg"></i>: +250726313208<br>
                      <i class="fa fa-envelope fa-lg"></i>: 
                      <a href="mailto:ramiroorphanage@rwanda.net">ramiroorphanage@rwanda.net</a>
		           </address>
                </div>
                <div class="col-12 col-sm-4 align-self-center">
                    <div class="text-center">
                        <a class="btn btn-social-icon btn-google" href="http://google.com/+"><i class="fa fa-google-plus"></i></a>
                        <a class="btn btn-social-icon btn-facebook" href="http://www.facebook.com/profile.php?id="><i class="fa fa-facebook"></i></a>
                        <a class="btn btn-social-icon btn-linkedin" href="http://www.linkedin.com/in/"><i class="fa fa-linkedin"></i></a>
                        <a class="btn btn-social-icon btn-twitter" href="http://twitter.com/"><i class="fa fa-twitter"></i></a>
                        <a class="btn btn-social-icon btn-google" href="http://youtube.com/"><i class="fa fa-youtube"></i></a>
                        <a class="btn btn-social-icon" href="mailto:"><i class="fa fa-envelope-o"></i></a>
                    </div>
                </div>
           </div>
           <div class="row justify-content-center">             
                <div class="col-auto">
                    <p>© Copyright 2018 Ristorante Con Fusion</p>
                </div>
           </div>
        </div>
    </footer>
    <!-- jQuery first, then Popper.js, then Bootstrap JS. -->
    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>
