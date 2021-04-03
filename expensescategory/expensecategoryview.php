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
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;  charset=iso-8859-1" />
        <meta name="description" content="An minimal site format" />
        <meta name="keywords" content="blog" />
        <link rel="stylesheet" type="text/css" href="../../MyAccount/css/style.css" media="all" />  
        <title>Expense Category View</title>
    </head>
    <body>
        <div id="container">
            <?php include '../design/header.html'; ?>
            <div id="wrapper">
                <?php include '../design/menu.html'; ?>
                <div id="content-wrapper">
                    <div id="content">
                        <form name="myform" action="../controllers/expcatcontroller.php?opn=add&userid=<?php echo $ub->getUid() ?>" method="post">
                            <table border="0">
                                <thead>
                                    <tr><th colspan="2" bgcolor="black"><font color="white"><b>&nbsp;&nbsp Expenses Category Details</b></th></font>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Expenses Category Name</td>
                                        <td><input type="text" name="expcatname"/></td>
                                    </tr>
                                    <tr>
                                        <td>Expenses Category Details</td>
                                        <td><input type="text" name="expcatdetails"/></td>
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
                                    <th>Expense Category Name</th>
                                    <th>Expense Category Details</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $ecd = new ExpensesCategoryDao;
                                $exb = $ecd->findAll($ub->getUid());
                                foreach ($exb as $e) {
                                    echo '<tr><td>' . $e->getExpcatname() . '</td><td>' . $e->getExpcatdetails() . '</td><td><a href="editexpensecategory.php?expcatid=' . $e->getExpcatid() . '">Edit</a></td><td><a href="/MyAccount/controllers/expcatcontroller.php?opn=delete&expcatid=' . $e->getExpcatid() . '">Delete</a></td></tr>';
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
