<head>
    <link rel="stylesheet" href="style.css">
    <title>Crowd FUNDING</title>
</head>
<div class="nav">
    <ul>
            <li><a class="active" href="home.php">Crowd FUNDING</a></li>
    </ul>
</div>
<form action="regi_validate.php" method="post">
<div style="background-color: white; align-items: center;text-align:center; width: 300px;height: 650px; margin: 20px auto; padding: 20px; border: 1px solid black; border-radius:5PX ;">
    <h1 style="text-align: center;">Registration</h1>

    <input type="text" name="uname" placeholder="User Name"><br/>

    <input type="password" name="pass" placeholder="Password"><br/>

    <input type="password" name="confpass" placeholder="Confirm Password"><br/>

    <input type="text" name="email" placeholder="email"><br/>
    <div style="margin: 10px 0px;">
        <input type="radio" id="admin" name="user_type" value="Admin"> Admin
        <input type="radio" id="donar" name="user_type" value="Donar"> Donar
        <input type="radio" id="collector" name="user_type" value="Collector"> Collector
        <input type="radio" id="provider" name="user_type" value="Provider"> Provider<br>
    </div>
    <input type="submit" name="sbt" value="Signup" />
        </form>
    <div class="outerDiv">
        <a href="login.php">Login</a><br/>
        <a href="index.html">Home</a><br/>
    </div>
</div>


