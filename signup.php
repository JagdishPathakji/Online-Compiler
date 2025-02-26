<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="index.css"> 
</head>
<body>
    <div class="form-card">
        <h2>Sign Up</h2>
        <p class="subtitle">Create a new account</p>

        <form action="manage_signup.php" method="POST">
            <input type="text" class="custom-input" placeholder="Full Name" name="fname">
            <input type="date" class="custom-input" name="dob">
            <input type="email" class="custom-input" placeholder="Email Address" name="email">
            <input type="password" class="custom-input" placeholder="Password" name="password">

            <button type="submit" class="btn-primary" name="submit">Sign Up</button>
        </form>

        <p class="new-user">Already have an account? <a href="index.php" class="text-highlight">Login here</a></p>
    </div>
</body>
</html>
