<body>
    <main>
        <h1>Login</h1>

        <form method="post" action="login.php">
            <div class="wrapper-input">
                <input type="text" name="username" placeholder="Username" required>
                <i class="fa fa-user fa-lg icon"></i>
            </div>

            <div class="wrapper-input">
                <input type="password" name="password" placeholder="Password" required>
                <i class="fa fa-key fa-lg icon"></i>
            </div>

            <button class="btn-login" id="btn" type="submit" name="login">Log in</button>
        </form>
    </main>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>