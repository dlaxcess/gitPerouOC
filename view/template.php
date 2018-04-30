<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="Blog de Jean Forteroche contenant les parutions de son dernier livre : Billet simple pour l'alaska">
        <meta name="author" content="Philippe Pérou">
        <link rel="icon" href="public/images/favicon/favicon.ico">
    
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
        
        <header class="row">
            <div class="col-sm-12">
                <a href="index.php" title="Jean Forteroche" id="lienHeaderColor"><h1 class="pull-left" style="margin-left: 15px">Jean Forteroche<span id ="dashTitle" class="visible-xs"><br /></span><span class="hidden-xs"> - </span><small>Billet simple pour l'Alaska</small></h1></a>
            </div>
        </header>

        <?= $this->_personalBar ?>
        
        <div class="container">
            
            
            

            <?= $page_content ?>
            
        </div><!-- /.container -->
        <footer>
            <p class="center-block">Blog de Jean Forteroche - Parutions de <em>Billet simple pour l'Alaska</em></p>
            <p class="center-block"><a href="#">Conditions générales et Mentions légales</a></p>
        </footer>
        
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
        
        <script>
            $(function (){
                $('a').tooltip();
             });
        </script>
        
        <script src="public/tinymce/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea#newPostContent' });</script>
        <script>tinymce.init({ selector:'textarea#postToModifContent' });</script>
        
        <script>
            $(function(){
              $("form#regitrationForm").on("submit", function() {
                  if(!$("input#name").val()) {
                      $("div#divName").addClass("has-error");
                      $("div.alert#emptyName").show("slow").delay(4000).hide("slow");
                      return false;
                  }
                  if($("input#pass").val().length < 6) {
                      $("div#divPass").addClass("has-error");
                      $("div.alert#passCaracAmount").show("slow").delay(4000).hide("slow");
                      return false;
                  }
                  if($("input#pass").val() !== $("input#passConfirm").val()) {
                      $("div#divPass").addClass("has-error");
                      $("div.alert#differentPass").show("slow").delay(4000).hide("slow");
                      return false;
                  }
                  var mailReg = /^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,4}$/;
                  var mail = $("input#email").val();
                  if(!mailReg.test(mail)) {
                      $("div#divEmail").addClass("has-error");
                      $("div.alert#emailVerif").show("slow").delay(4000).hide("slow");
                      return false;
                  }
                  if($("input#email").val() !== $("input#emailConfirm").val()) {
                      $("div#divEmail").addClass("has-error");
                      $("div.alert#differentEmail").show("slow").delay(4000).hide("slow");
                      return false;
                  }
              });
              $("form#connexionForm").on("submit", function() {
                  var mailReg = /^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,4}$/;
                  var mail = $("input#email").val();
                  if(!mailReg.test(mail)) {
                      $("div#divEmail").addClass("has-error");
                      $("div.alert#emailVerif").show("slow").delay(4000).hide("slow");
                      return false;
                  }
                  if($("input#pass").val().length < 6) {
                      $("div#divPass").addClass("has-error");
                      $("div.alert#passCaracAmount").show("slow").delay(4000).hide("slow");
                      return false;
                  }
              });
              $("form#addCommentForm").on("submit", function() {
                  if(!$("input#pseudo").val()) {
                      $("div#divCommentPseudo").addClass("has-error");
                      $("div.alert#addCommentAuthor").show("slow").delay(4000).hide("slow");
                      return false;
                  }
                  if(!$("textarea#comment").val()) {
                      $("div#divCommentContent").addClass("has-error");
                      $("div.alert#addCommentContent").show("slow").delay(4000).hide("slow");
                      return false;
                  }
              });
              $(window.onload = function() {
                  $("div#reportValidationMsg").delay(4000).hide("slow");
              });
            });
        </script>
        
    </body>
</html>