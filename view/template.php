<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">
    
        <base href="<?= $racineWeb ?>">
        <title><?= $this->_page_title ?></title>
        
        <!-- Bootstrap core CSS -->
        <link href="public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="public/bootstrap/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
        
        <!-- CDN fontawsome -->
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        
        <!-- Custom styles for this template -->
        <link href="public/css/style.css" rel="stylesheet" /> 

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        
    </head>
        
    <body>
        
        <header class="row container">
            <div class="col-sm-12">
                <h1 class="pull-left">Jean Forteroche - <small>Billet simple pour l'Alaska</small></h1>
            </div>
        </header>

        <?= $this->_personalBar ?>
        
        <div class="container">
            
            
            

            <?= $page_content ?>
            
        </div><!-- /.container -->
        
        
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="public/bootstrap/assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="public/bootstrap/js/bootstrap.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="public/bootstrap/assets/js/ie10-viewport-bug-workaround.js"></script>
        
        <script>
            // When the user scrolls the page, execute myFunction 
            window.onscroll = function() {myFunction()};

            // Get the navbar
            var navbar = document.getElementById("navbar");

            // Get the offset position of the navbar
            var sticky = navbar.offsetTop;

            // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
            function myFunction() {
              if (window.pageYOffset >= sticky) {
                navbar.classList.add("sticky")
              } else {
                navbar.classList.remove("sticky");
              }
            }
        </script>
        
    </body>
</html>