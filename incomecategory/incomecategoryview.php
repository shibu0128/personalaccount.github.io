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
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;  charset=iso-8859-1" />
        <meta name="description" content="An minimal site format" />
        <meta name="keywords" content="blog" />
        <link rel="stylesheet" type="text/css" href="../../MyAccount/css/style.css" media="all" />  
        <title>Income Category View</title>
    </head>
    <body>
        <div id="container">
            <?php include '../design/header.html'; ?>
            <div id="wrapper">
                <?php include '../design/menu.html'; ?>
                <div id="content-wrapper">
                    <div id="content">
                        <form name="myform" action="/MyAccount/controllers/inccatcontroller.php?opn=add&userid=<?php echo $ub->getUid() ?>" method="post">
                            <table border="0">
                                <thead>
                                    <tr><th colspan="2" bgcolor="black"><font color="white"><b>&nbsp;&nbsp Income Category Details</b></th></font>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Income Category Name</td>
                                        <td><input type="text" name="inccatname"/></td>
                                    </tr>
                                    <tr>
                                        <td>Income Category Details</td>
                                        <td><input type="text" name="inccatdetails"/></td>
                                    </tr>
                                    <tr>
                                        <td><input type="submit" value="Submit"></td>
                                        <td><button type="button" onclick="history.go(-1)">Cancel</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                        <br><hr><br>
                        <table border="1" style="background-color: #9eb9c2">
                            <thead>
                                <tr>
                                    <th>Income Category Name</th>
                                    <th>Income Category Details</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $icd = new IncomeCategoryDao;
                                $icb = $icd->findAll($ub->getUid());
                                foreach ($icb as $e) {
                                    echo '<tr><td>' . $e->getInccatname() . '</td><td>' . $e->getInccatdetails() . '</td><td><a href="editincomecategory.php?inccatid=' . $e->getInccatid() . '">Edit</a></td><td><a href="/MyAccount/controllers/inccatcontroller.php?opn=delete&inccatid=' . $e->getInccatid() . '">Delete</a></td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php include '../design/sidebar.html'; ?>
                <?php include '../design/footer.html'; ?>
            </div>
        </div>
    </body>
</html>
