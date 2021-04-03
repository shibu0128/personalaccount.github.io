<!DOCTYPE html>
    <?php
    require_once './beans/Users.php';
    session_start();
    $ub = unserialize($_SESSION['user']);
        if ($ub == NULL) {
            header("Location: /MyAccount/index.php");
        }
    ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html;  charset=iso-8859-1" />
        <meta name="description" content="An minimal site format" />
        <meta name="keywords" content="blog" />
        <link rel="stylesheet" type="text/css" href="../MyAccount/css/style.css" media="all" />  

        <title>Home</title>
    </head>
    <body>
        <div id="container">
            <?php include './design/header.html'; ?>
            <div id="wrapper">
                <?php include './design/menu.html'; ?>
                <div id="content-wrapper">
                    <div id="content">


                    </div>   
                </div>
                <?php include './design/sidebar.html'; ?>
                <?php include './design/footer.html'; ?>
            </div> 
        </div>
    </body>
</html>

