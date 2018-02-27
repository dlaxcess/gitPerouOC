<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <base href="<?= $racineWeb ?>">
        <title><?= $this->_page_title ?></title>
        <link href="public/css/style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <div id="personalBar"><?= $this->_personalBar ?></div>
    	<h1>Mon super blog !</h1>

    	<?= $page_content ?>
    </body>
</html>