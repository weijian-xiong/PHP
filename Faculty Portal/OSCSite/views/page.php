<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $page->title; ?></title>
        <link rel="stylesheet" type="text/css" href="../../css/layout.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <header>
            <h1><?php echo $page->header; ?></h1>
        </header>
        <div class="row">
            <div class="column-left">
                <img src="../img/menu.png" height=80 width=200 />
                <br>
                <br>
                <ul>
                    <?php include_once $page->nav; ?>
                </ul>
            </div>
            <div class="column-right">
                <article>
                    <?php include $page->view; ?>
                </article> 
            </div>
        </div>
        <footer><?php echo $page->footer; ?></footer>
    </body>
</html>
