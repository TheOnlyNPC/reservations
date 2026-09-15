<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Laravel React App</title>
    </head>
    <body class="bg-zinc-950 dark">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Email" />
            <input type="password" name="password" placeholder="Passwort" />
            <button type="submit">Login</button>
        </form>
    </body>
</html>
