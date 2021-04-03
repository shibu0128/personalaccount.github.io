<!DOCTYPE html>
<?php
require_once './beans/Users.php';
session_start();
$ub = unserialize($_SESSION['user']);
if ($ub == NULL) {
    header("Location: /MyAccount/index.php");
}
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;  charset=iso-8859-1" />
        <meta name="description" content="An minimal site format" />
        <meta name="keywords" content="blog" />
        <link rel="stylesheet" type="text/css" href="../MyAccount/css/style.css" media="all" />  
        <title>Profile</title>
    </head>
    <body>
        <div id="container">
            <?php include './design/header.html'; ?>
            <div id="wrapper">
                <?php include './design/menu.html'; ?>

                <div id="content-wrapper">

                    <div id="content">
                        <form name="myForm" action="../MyAccount/controllers/userform.php" method="post">
                            <input type="hidden" name="userid" value="<?php echo $ub->getUid(); ?>">
                            <input type="hidden" name="opn" value="update">
                            <table>
                                <tbody>
                                    <tr>
                                        <td colspan="2" bgcolor="black"><font color="white"><b>&nbsp;&nbsp;User Profile</b></td></font>
                                    </tr>
                                    <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                    <tr>
                                        <td>UserName*</td>
                                        <td><input type="text" name="username" value="<?php echo '' . $ub->getUsername(); ?>"</td>
                                    </tr>
                                    <tr>
                                        <td>Password*</td>
                                        <td><input type="password" name="password" value="<?php echo '' . $ub->getPasword(); ?>"</td>
                                    </tr>
                                    <tr>
                                        <td>Name*</td>
                                        <td><input type="text" name="name" value="<?php echo '' . $ub->getName(); ?>"</td>
                                    </tr>
                                    <tr>
                                        <td>Address*</td>
                                        <td><input type="text" name="address" value="<?php echo '' . $ub->getAddress(); ?>"</td>
                                    </tr>
                                    <tr>
                                        <td>Mobile*</td>
                                        <td><input type="text" name="mobile" value="<?php echo '' . $ub->getMobile(); ?>"</td>
                                    </tr>
                                    <tr>
                                        <td>Email*</td>
                                        <td><input type="text" name="email" value="<?php echo '' . $ub->getEmail(); ?>"</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td><td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <button type="submit">Update</button>
                                        </td>
                                        <td>
                                            <button type="button" onclick="history.go(-1)">Cancel</button>
                                        </td>
                                </tbody>
                            </table>
                        </form>
                    </div>

                </div>

                <?php include './design/sidebar.html'; ?>
                <?php include './design/footer.html'; ?>
            </div>
        </div>
    </body>
</html>
