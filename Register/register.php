<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Document</title>
</head>

<body>
    <div style="display: flex; flex-direction: column; align-items: center;">
        <h1>Sign up</h1>
        <h4 style="color:gray; margin-top:-10px; margin-bottom: 50px;">Enter your details to book a bus ticket</h4>
        <?php if (isset($_GET['error'])) { ?>
        <p style="background: #F2DEDE; color: #A94442; padding: 10px; width: 500px; 
            border-radius: 5px; margin: 20px auto;"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <?php if (isset($_GET['msg'])) { ?>
        <p style="background: #bfeccb; color: #38a66f; padding: 10px; width: 500px; 
            border-radius: 5px; margin: 20px auto;"><?php echo $_GET['msg']; ?></p>
        <?php } ?>
        <form action="register.php" method="post" style="display: flex; flex-direction: column; gap: 10px;">
            <label style="font-size: 17px;">Full Name</label>
            <input name="fname" style="box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2); width: 500px; height: 35px;
            border: none; font-size: 17px;" placeholder='Enter Your full name'>
            <label style="font-size: 17px;">Email</label>
            <input name="email" style="box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2); width: 500px; height: 35px;
            border: none; font-size: 17px;" placeholder='Enter Your email address'>
            <label style="font-size: 17px;">Username</label>
            <input name="uname" style="box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2); width: 500px; height: 35px;
            border: none; font-size: 17px;" placeholder='Create Your username'>
            <label>Create a secure password</label>
            <input name="password" style="box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2); width: 500px; height: 35px;
            border: none; font-size: 17px;" placeholder='Enter Your password'>
            <label>Confirm your password</label>
            <input name="cpassword" style="box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2); width: 500px; height: 35px;
            border: none; font-size: 17px;" placeholder='Confirm Your password'>
            <div style="display: flex; align-items: center; gap: 5px;
            margin-top: 15px;">
                <input type="checkbox" style="width: 20px; height: 20px;" />
                <label>By signing up, you are agreeing with our terms and condition.</label>
            </div>
            <input name="signup_button" value="Sign up" type='submit' style="background-color: black; color: white; 
            border-radius: 10px; height: 35px; width: 80%; align-items: center; font-size: 17px;  margin-left:40px;" />
            <h4>Already have an account? <a href="login.php">Log in</a></h4>
        </form>
    </div>
</body>

</html>