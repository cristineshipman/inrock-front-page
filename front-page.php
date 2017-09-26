
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">
    <link rel="stylesheet" src="css/bootstrap.min.css" type="text/css">

    <link rel="stylesheet" href="flexslider.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <script src="jquery.flexslider.js"></script>


    <title>Cover Template for Bootstrap</title>


    <?php wp_head(); ?>
<style>
    html,
body {
  height: 100%;
}

body {
  background: url('http://localhost/localwp.com/wp-content/uploads/2017/09/background-1.gif') no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  font-family:"Bank Gothic W01 Medium", arial;
  font-size: 16px;
  margin-top: 10%;

}

hr {
  opacity: 0.2;
  margin-top: .8%;
  margin-bottom: .4%;
}

p{
    color: white;
    text-transform: uppercase;
    font-weight: bold;
    letter-spacing: .2em;
}

.menu {
    text-align: center;
    background-color: black;
}
.menu a {
    display: block;
    padding: 10px;
    color: white;
    font-family:"Bank Gothic W01 Medium";
    text-transform: uppercase;
    font-size: .8em;
}
.menu a:hover {
    background-color: #eee;
}

/*FOOTER*/
footer {
   position:fixed;
   left:0px;
   bottom:0px;
   height:30px;
   width:100%;
   background:black;
}

.copyright {
  position: absolute;
  right: 0;
  margin-right: 10px;
  font-size: 3%;
  padding: 1%;
  font-family: arial;
}

/*MEDIA QUERY*/

@media only screen and (max-width: 540px)  {
  .menu a {
    border-bottom: 1px solid white;
  }
}
@media (min-width: 600px) {
    .menu a {
        display: inline-block;
    }
}

@media (min-width: 1200px){
    .container {
    width: 970px;
  }
}
</style>


  </head>

  <body>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container"></div>
    </nav>

    <div class="container">

        <div class="col-md-6">
          <?php
          echo "<img src='http://localhost/localwp.com/wp-content/uploads/2017/09/brand-logo.png' class='img-responsive' alt='brand-logo'/>"
          ?>
        </div>

    </div>

    <div class="container">
            <div >
          <p class="text-center">
            Setting the standard for superior performance
          </p></div>
    </div>

    <hr>
    <hr>

    <nav id="menu" class="menu"> 
        <a href="#">Home</a>  
        <a href="#">About Us</a>  
        <a href="#">Products</a>  
        <a href="#">Services</a>  
        <a href="#">Technical Library</a> 
        <a href="#">Credit Application</a> 
        <a href="#">Locations</a> 
    </nav>

      <!-- footer -->
    <footer class="footer">
      <div class="container">
        <span class="copyright">&copy 2017 Copyright.INROCK Drilling.Inc.All Rights Reserved.</span>
      </div>
    </footer>



    <?php wp_footer(); ?>
  </body>
</html>
