<!DOCTYPE html>
<?php
require_once'../Daos/IncomeCategoryDao.php';
require_once '../beans/Incomecategory.php';
require_once '../beans/Users.php';
session_start();
$ub = unserialize($_SESSION['user']);
if ($ub == NULL) {
    header("Location: /MyAccount/index.php");
}
$inccatid = $_GET['inccatid'];
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;  charset=iso-8859-1" />
        <meta name="description" content="An minimal site format" />
        <meta name="keywords" content="blog" />
        <link rel="stylesheet" type="text/css" href="../../MyAccount/css/style.css" media="all" />  
        <title>Edit Income Category</title>
    </head>
    <body>
        <div id="container">
            <?php include '../design/header.html'; ?>
            <div id="wrapper">
                <?php include '../design/menu.html'; ?>
                <div id="content-wrapper">
                    <div id="content">
                        <form name="myform" action="../controllers/inccatcontroller.php?opn=edit&userid=<?php echo $ub->getUid() ?>&inccatid=<?php echo $inccatid ?>" method="post">
                            <table border="0">
                                <thead>
                                    <tr><th colspan="2" bgcolor="black"><font color="white"><b>&nbsp;&nbsp Income Category Update</b></th></font>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $icd = new IncomeCategoryDao;
                                    $icb = $icd->find($inccatid);
                                    ?>
                                    <tr>
                                        <td>Expenses Category Name</td>
                                        <td><input type="text" name="inccatname" value="<?php echo $icb->getInccatname() ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td>Expenses Category Details</td>
                                        <td><input type="text" name="inccatdetails" value="<?php echo $icb->getInccatdetails() ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td><input type="submit" value="Update"></td>
                                        <td><button type="button" onclick="history.go(-1)">Cancel</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
                <?php include '../design/sidebar.html'; ?>
                <?php include '../design/footer.html'; ?>
            </div>
        </div>
    </body>
</html>
