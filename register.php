<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;  charset=iso-8859-1" />
        <meta name="description" content="An minimal site format" />
        <meta name="keywords" content="blog" />
        <link rel="stylesheet" type="text/css" href="../MyAccount/css/style.css" media="all" />  
        <title>Registration</title>
        <script type="text/javascript">
            function validateForm() {
                // var elem = document.getElementById('numbers');
                var numericExpression = /^[0-9]+$/;
                var x = document.forms["myForm"]["username"].value;
                var y = document.forms["myForm"]["password"].value;
                var z = document.forms["myForm"]["name"].value;
                var p = document.forms["myForm"]["address"].value;
                var a = document.forms["myForm"]["email"].value;
                var m = document.forms["myForm"]["mobile"].value;
                var atpos = a.indexOf("@");
                var dotpos = a.lastIndexOf(".");
				var numbers = /^[0-9]+$/;
			
                if (x == null || x == "") {
                    alert("User name must be filled out");
                    return false;
                }
                if (y == null || y == "") {
                    alert("Password must be filled out");
                    return false;
                }
                if (z == null || z == "") {
                    alert("Name must be filled out");
                    return false;
                }
                if (p == null || p == "") {
                    alert("Address must be filled out");
                    return false;
                }

                if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= a.length)
                {
                    alert("Not a valid e-mail address");
                    return false;
                }
                if (m.match(numbers) && m.length == 10) {
                    return true;
                } else {
                    alert("Not a valid mobile number");
                    return false;
                    elem.focus();
                }
				
				 
				  if(inputtxt.value.match(numbers))
				  {
				  alert('Your Registration number has accepted....');
				  document.form1.text1.focus();
				  return true;
				  }
				  else
				  {
				  alert('Please input numeric characters only');
				  document.form1.text1.focus();
				  return false;
				  }
            }
        </script>
    </head>
    <body>
        <div id="container">
            <?php include './design/header.html'; ?>
            <div id="wrapper">
                <div id="content-wrapper">
                    <div id="content">
                        <form name="myForm" action="../MyAccount/controllers/userform.php" method="post" onsubmit="return  validateForm()">
                            <input type="hidden" name="opn" value="add">
                            <table style="background: #9eb9c2">
                                <tbody>
                                    <tr>
                                        <td colspan="2" bgcolor="black"><font color="white"><b>&nbsp;&nbsp;User Registration</b></td></font>
                                    </tr>
                                    <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                    <tr>
                                        <td>UserName*</td>
                                        <td><input type="text" name="username" value=""</td>
                                    </tr>
                                    <tr>
                                        <td>Password*</td>
                                        <td><input type="password" name="password" value=""</td>
                                    </tr>
                                    <tr>
                                        <td>Name*</td>
                                        <td><input type="text" name="name" </td>
                                    </tr>
                                    <tr>
                                        <td>Address*</td>
                                        <td><input type="text" name="address" </td>
                                    </tr>
                                    <tr>
                                        <td>Mobile*</td>
                                        <td><input type="text" name="mobile" </td>
                                    </tr>
                                    <tr>
                                        <td>Email*</td>
                                        <td><input type="text" name="email" </td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td><td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="submit" name="reg" value="Register">
                                        </td>
                                        <td>
                                            <button type="button" onclick="history.go(-1)">Cancel</button>
                                        </td>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>

                <?php include './design/footer.html'; ?>
            </div>
        </div>
    </body>
</html>
