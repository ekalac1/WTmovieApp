<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

<head>
    <link rel="stylesheet" href="tmdb.css"> </head>

<body>
    <div class="red login">
        <ul>
            <form method="post" action="dodajAutora.php" name="registracija">
                <input name="username" type="text" placeholder="Username" />
                <br>
                <br>
                <input name="password" type="text" placeholder="Password" />
                <br>
                <br>
                <input name="email" type="text" placeholder="eMail" />
                <p>Do you agree to the terms and conditions?</p>
                <input type="radio" name="gender" value="male" checked> Yes
                <br>
                <input type="radio" name="gender" value="female"> No
                <br>
                <br>
                <input type="submit" value="Submit" name="registracija">
            </form>
            <p class="alert" id="mssg"></p>
        </ul>
    </div>
</body>

</html>