<!DOCTYPE html>
<?php
require_once'../Daos/ExpensesCategoryDao.php';
require_once '../beans/Expensescategory.php';
require_once '../beans/Users.php';
session_start();
$ub = unserialize($_SESSION['user']);
if ($ub == NULL) {
    header("Location: /MyAccount/index.php");
}
$expcatid = $_GET['expcatid'];
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;  charset=iso-8859-1" />
        <meta name="description" content="An minimal site format" />
        <meta name="keywords" content="blog" />
        <link rel="stylesheet" type="text/css" href="../../MyAccount/css/style.css" media="all" />  
        <title>Edit Expense Category</title>
    </head>
    <body>
        <div id="container">
            <?php include '../design/header.html'; ?>
            <div id="wrapper">
                <?php include '../design/menu.html'; ?>
                <div id="content-wrapper">
                    <div id="content">
                        <form name="myform" action="../controllers/expcatcontroller.php?opn=edit&userid=<?php echo $ub->getUid() ?>&expcatid=<?php echo $expcatid ?>" method="post">
                            <table border="0">
                                <thead>
                                    <tr><th colspan="2" bgcolor="black"><font color="white"><b>&nbsp;&nbsp Expenses Category Update</b></th></font>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ecd = new ExpensesCategoryDao;
                                    $ecb = $ecd->find($expcatid);
                                    ?>
                                    <tr>
                                        <td>Expenses Category Name</td>
                                        <td><input type="text" name="expcatname" value="<?php echo $ecb->getExpcatname() ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td>Expenses Category Details</td>
                                        <td><input type="text" name="expcatdetails" value="<?php echo $ecb->getExpcatdetails() ?>"/></td>
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
