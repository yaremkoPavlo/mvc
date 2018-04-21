<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome Home!</title>
    <link rel="stylesheet" href="/css/master.css">
</head>
<body>
    <header>
        <nav>
            <a href="/">Home</a>
            <a href="/login">Login</a>
            <a href="/admin">Admin</a>
        </nav>
    </header>
    <div id='container'>
       <?php echo $param; ?>
    </div>
    <footer>
        <p>&copy; Pavlo Yaremko</p>
    </footer>
</body>
</html>