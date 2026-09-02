<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Laravel React App</title>

        <!-- Load Vite assets -->
        @viteReactRefresh @vite(['resources/css/app.css',
        'resources/js/app.jsx'])
    </head>
    <body class="bg-zinc-950 dark">
        <div
            id="app"
            class="bg-zinc-950 min-h-screen font-sans w-full dark"
        ></div>
    </body>
</html>
