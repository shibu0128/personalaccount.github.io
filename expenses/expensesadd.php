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
        <title>Add Expense</title>
    </head>
    <body>
        <div id="container">
            <?php include '../design/header.html'; ?>
            <div id="wrapper">
                <?php include '../design/menu.html'; ?>
                <div id="content-wrapper">
                    <div id="content">
                        <form name="myform" action="../controllers/expensescontroller.php?opn=add&userid=<?php echo $ub->getUid() ?>" method="post">
                            <table border="0">
                                <thead>
                                    <tr>
                                        <th colspan="2" bgcolor="black"><font color="white"><b>&nbsp;&nbsp Expense</b></th></font>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ecd = new ExpensesCategoryDao;
                                    $ecb = $ecd->findAll($ub->getUid());
                                    ?>
                                    <tr>
                                        <td>Expense*</td>
                                        <td><input type="text" name="exp"></td>
                                    </tr>
                                    <tr>
                                        <td>Category*	</td>
                                        <td><select name="expcat">
                                                <?php
                                                foreach ($ecb as $e) {
                                                    echo '<option value=' . $e->getExpcatid() . '>' . $e->getExpcatname() . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Amount*	</td>
                                        <td><input type="text" name="amount"></td>
                                    </tr>
                                    <tr>
                                        <td>Pay By*</td>
                                        <td>
                                            <select name="payby">
                                                <option value="Check">Check</option>
                                                <option value="Cash">Cash</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Remark*</td>
                                        <td><input type="text" name="remark"></td>
                                    </tr>
                                    <tr>
                                        <td>Date*</td>
                                        <td><input type="date" name="date"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="submit" value="Submit"></td>
                                        <td><button type="button" onclick="history.go(-1)">Cancel</button></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
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
