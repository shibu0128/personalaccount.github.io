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
$total1 = 0.0;
$total2 = 0.0;
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
        <title>My Account::Balance Sheet</title>
    </head>
    <body>
    <center>
        <table border="1" width="70%">
            <tr>
                <td>
            <center>
                <form name="Balance Sheet" action="balancesheetview.php" method="post">
                    <table width="100%">
                        <tr><th colspan="4" bgcolor="black"><font color="white"><b>Balance Sheet</b></font></th></tr>
                        <tr>
                            <th bgcolor="black"><font color="white"><b>Date From<br><input type="date" name="sd"></b></font></th>
                            <th bgcolor="black"><font color="white"><b>Date To<br><input type="date" name="ed"></b></font></th> 
                            <th bgcolor="black" colspan="2"><input type="submit" value="Show"></th>
                        </tr>
                    </table>
                    <table width="100%">
                        <tr>
                            <th bgcolor="black"><font color="white"><b>Incomes</b></font></th> 
                            <th bgcolor="black"><font color="white"><b>Expense</b></font></th> 
                        </tr>
                        <tr>
                            <td>
                                <table border="1" width="100%">
                                    <tr>
                                        <th bgcolor="black"><font color="white"><b>Incomes</b></font></th> 
                                        <th bgcolor="black"><font color="white"><b>Amount</b></font></th> 
                                    </tr>
                                    <?php
                                    foreach ($ib as $v) {
                                        $total1 += $v->getAmount();
                                        echo '<tr><td>' . $v->getIncac() . '</td><td>' . $v->getAmount() . '</td></tr>';
                                    }
                                    ?>
                                    <tr>
                                        <th bgcolor="black"><font color="white"><b>Total</b></font></th> 
                                        <th bgcolor="black"><font color="white"><b><?php echo $total1 ?></b></font></th> 
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                </table>
                            </td>
                            <td>
                                <table width="100%" border="1">
                                    <tr>
                                        <th bgcolor="black"><font color="white"><b>Expenses</b></font></th> 
                                        <th bgcolor="black"><font color="white"><b>Amount</b></font></th> 
                                    </tr>
                                    <?php
                                    foreach ($eb as $v1) {
                                        $total2 += $v1->getAmount();
                                        echo '<tr><td>' . $v1->getExpac() . '</td><td>' . $v1->getAmount() . '</td></tr>';
                                    }
                                    ?>
                                    <tr>
                                        <th bgcolor="black"><font color="white"><b>Total</b></font></th> 
                                        <th bgcolor="black"><font color="white"><b><?php echo $total2 ?></b></font></th>
                                    </tr>
                                    <?php
                                    if ($total1 > $total2) {
                                        echo '<tr><td>Gross Profit</td><td>' . ($total1 - $total2) . '</td></tr>';
                                    } else {
                                        echo '<tr><td>Gross Loss</td><td>' . ($total1 - $total2) . '</td></tr>';
                                    }
                                    ?>
                                </table>
                            </td>
                    </table>
                </form>
                <input type="button" Value="Back" onclick="history.go(-1)">
            </center>
            </td>
            </tr>
        </table>
    </center>
</body>
</html>
