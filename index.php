<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="index.css"> 
</head>
<body>
    <div class="form-card">
        <h2>Login</h2>
        <p class="subtitle">Welcome back! Please enter your details.</p>

        <form action="manage_login.php" method="POST">
            <input type="email" class="custom-input" placeholder="Email Address" name="email" required>
            <input type="password" class="custom-input" placeholder="Password" name="password" required>

            <button type="submit" class="btn-primary" name="submit" >Login</button>
        </form>

        <p class="new-user">New user? <a href="signup.php" class="text-highlight">Create an account</a></p>
    </div>
</body>
</html>
