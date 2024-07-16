<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" translate="no">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta
            name="viewport"
            content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no"
        />
        <meta
            http-equiv="Cache-Control"
            content="no-cache, no-store, must-revalidate"
        />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="0" />
        <meta name="theme-color" content="#3e454a" />
        <link rel="icon" href="/assets/favicon.ico" sizes="48x48" />
        <link
            rel="apple-touch-icon"
            href="/assets/apple-touch-icon.png"
            sizes="180x180"
        />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Madimi+One&display=swap" rel="stylesheet">
        <title>Monoland Platform</title>
    </head>

    <body>
        <noscript>
            We're sorry, but simasten doesn't work properly without JavaScript
            enabled. Please enable it to continue.
        </noscript>

        <div id="monosoft"></div>

        @vite(['resources/src/mobile.js'])
    </body>
</html>
