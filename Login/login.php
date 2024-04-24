<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="font-family: 'Roboto', sans-serif; font-weight: 400; font-style: normal;">
    <div style="display: grid; grid-template-columns: repeat(3, 1fr); height: 100%;">
        <div style="border: none; box-shadow: 5px 0px 3px -2px rgba(0, 0, 0, 0.1);">
            <img src="https://i.ibb.co/tQkKGjz/Screenshot-80.png" width="500" height="500" alt="image"
                style="padding-top: 100px;" />
        </div>
        <div style="grid-column-start: 2; grid-column-end: 3; padding-top: 100px;">
            <div style="padding-left: 400px; display: flex; align-items: center;">
                <img src="https://www.shutterstock.com/image-vector/bus-icon-vector-template-flat-260nw-1413254132.jpg"
                    width="50" height="50" />
                <h1>Bus Ticket</h1>
            </div>
            <div style="padding-left: 200px; margin-top: 70px;">
                <?php if (isset($_GET['error'])) { ?>
                    <p style="background: #F2DEDE; color: #A94442; padding: 10px; width: 500px; 
            border-radius: 5px; margin: 20px auto;"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                <form method="post" action="loginBack.php" style="display: flex; flex-direction: column; gap: 15px;">
                    <label>Email</label>
                    <input type="email" name="email" style="box-shadow: 5px 0px 3px -2px rgba(0, 0, 0, 0.1), 
                        0px 5px 3px -2px rgba(0, 0, 0, 0.1); width: 500px; 
                        height: 35px; border: none; font-size: 17px;" type="text" placeholder="Enter email" />
                    <label>Password</label>
                    <input name="password" style="box-shadow: 5px 0px 3px -2px rgba(0, 0, 0, 0.1), 
                        0px 5px 3px -2px rgba(0, 0, 0, 0.1); width: 500px; 
                        height: 35px; border: none; font-size: 17px;" type="password" placeholder="Enter password" />
                    <input
                        style="margin-top: 60px; background-color: black; color: white; width: 500px; height: 35px; border: none; font-size: 17px;"
                        type="submit" value="Log in" placeholder="Enter email" />

                </form>
            </div>
        </div>

    </div>
</body>

</html>