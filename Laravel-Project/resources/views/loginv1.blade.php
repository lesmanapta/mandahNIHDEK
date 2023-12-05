<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Page</title>
  <link rel="stylesheet" href="css/app.css">
  
  </head>
<body>
    <div class="container">
        <form id="loginForm" action="#">
            <h2>Mandah.net</h2>
            <h3>Masuk ke Admin Panel</h3>
            <div class="input-group ">
                <label for="username"></label>
                <input type="text" id="username" name="username" placeholder="username" required>
            </div>
            <div class="input-group">
                <label for="password"></label>
                <input type="password" id="password" name="password" placeholder="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
    <script src="script.js"></script>
</body>
</html>