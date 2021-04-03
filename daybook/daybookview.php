<!DOCTYPE html>
<?php
require_once'../Daos/IncomeDao.php';
require_once '../beans/Income.php';
require_once '../Daos/ExpensesDao.php';
require_once '../beans/Expenses.php';
require_once '../beans/Users.php';
session_start();
$ub = unserialize($_SESSION['user']);
if ($ub == NULL) {
    header("Location: /MyAccount/index.php");
}
if (isset($_POST['sd']) && isset($_POST['ed'])) {
    $sd = $_POST['sd'];
    $ed = $_POST['ed'];
} else {
    $sd = date("Y/m/d");
    $ed = date("Y/m/d");
}
$uid = $ub->getUid();
$id = new IncomeDao;
$exd = new ExpensesDao;
$ib = NULL;
$eb = NULL;
if ($sd != NULL && $ed != NULL && $uid != NULL) {
    $ib = $id->findAllDateWise($sd, $ed, $uid);
    $eb = $exd->findAllDateWise($sd, $ed, $uid);
}
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;  charset=iso-8859-1" />
        <meta name="description" content="An minimal site format" />
        <meta name="keywords" content="blog" />
        <link rel="stylesheet" type="text/css" href="../../MyAccount/css/style.css" media="all" />  
        <title>Daybook</title>

    </head>
    <body>
        <div id="container">
            <?php include '../design/header.html'; ?>
            <div id="wrapper">
                <?php include '../design/menu.html'; ?>
                <div id="content-wrapper">
                    <div id="content">
                        <form name="myform"  method="post" action="daybookview.php">
                            <table border="1" width="100%">
                                <thead>
                                    <tr>
                                        <th bgcolor="black"><font color="white"><b>Day Book</b></font></th>
                                        <th colspan="2" bgcolor="black"><font color="white"><b>Date From<br><input type="date" name="sd"></b></font></th>
                                        <th colspan="2" bgcolor="black"><font color="white"><b>To<br><input type="date" name="ed"></b></font></th>
                                        <th bgcolor="black"><font color="white"><b><input type="submit" value="Show"></b></font></th>
                                    </tr>
                                    <tr>
                                        <th bgcolor="black"><font color="white"><b>S.No.</b></th>
                                        <th bgcolor="black"><font color="white"><b>Account Name</b></th>
                                        <th bgcolor="black"><font color="white"><b>Date</b></th>
                                        <th bgcolor="black"><font color="white"><b>Amount</b></th>
                                        <th bgcolor="black"><font color="white"><b>Pay/Receive by</b></th>
                                        <th bgcolor="black"><font color="white"><b>Remark</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                     echo '<tr><td bgcolor="#cde5ef" colspan="6" >Expenses</td></tr>';
                                    foreach ($eb as $e) {
                                        $i++;
                                        echo '<tr><td>' . $i . '</td><td>' . $e->getExpac() . '</td><td>' . $e->getTrandate() . '</td><td>' . $e->getAmount() . '</td><td>' . $e->getPayby() . '</td><td>' . $e->getRemark() . '</td></tr>';
                                    }
                                    $j = 0;
                                    echo '<tr><td bgcolor="#cde5ef" colspan="6" >Incomes</td></tr>';
                                    foreach ($ib as $e) {
                                        $j++;
                                        echo '<tr><td>' . $j . '</td><td>' . $e->getIncac() . '</td><td>' . $e->getTrandate() . '</td><td>' . $e->getAmount() . '</td><td>' . $e->getRecieveby() . '</td><td>' . $e->getRemark() . '</td></tr>';
                                    }
                                    ?>

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
