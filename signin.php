<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wound Classification</title>
    <link rel="stylesheet" href="signinstyle.css">
</head>
<body>
    <header class="header">
        <div class="logo">Wound Classification</div>
        <li><button id="backButton" class="header button" onclick="window.location.href='index.php'">Back</button></li>
    </header>

    <div class="container" id="signIn">
        <h1 class="form-title">Sign In</h1>
        <form method="post" action="signingin.php">
            <div class="input-group">
                <input type="username" name="username" id="username" placeholder="Username" required>
            </div>
            <div class="input-group">
                <input type="password" name="password" id="password" placeholder="Password" required>
            </div>
            <input type="submit" class="btn" value="Sign In" name="Sign In">
        </form>
            <a href="index.php#account_policy" id="link">How to have an account?</a>
    </div>
</body>
</html>