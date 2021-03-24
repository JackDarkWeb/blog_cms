<!doctype html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Error 404 - Page Not Found!</title>

    <style>
        /* CSS Document */

        body {
            background: #fff;
            padding: 0;
            margin: 0;
            font-family: Helvetica, Arial, sans-serif;
        }

        .container {
            background-color: #fff;
            margin: 0 auto;
            text-align: center;
            padding-top: 50px;
        }

        h3 {
            font-size: 16px;
            color: #3498db;
            font-weight: bold;
            text-align: center;
            line-height: 130%;
        }

        .buton {
            background: #3498db;
            padding: 10px 20px;
            color: #fff;
            font-weight: bold;
            text-align: center;
            border-radius: 3px;
            text-decoration: none;
        }

        a:hover {
            color: #ff0;
        }

        span {
            font-size: 14px;
            color: #FFF;
            font-weight: normal;
            text-align: center;
        }

        span a {
            color: #FF0;
            text-decoration: none;
        }

        span a:hover {
            color: #F00;
        }

        @media screen and (max-width: 500px) {
            img {
                width: 70%;
            }
            .container {
                padding: 70px 10px 10px 10px;
            }
            h3 {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
<div class="container">

    <img class="ops" src="{{ asset("frontend/img/404.svg") }}"/>

    <br />
    <h3>
        Nous ne parvenons pas à trouver la page que vous recherchez.
    </h3>
    <br/>
    <a class="buton" href="{{ route_name("home") }}">{{ config('app.name', 'Laravel') }}</a>
</div>
</body>

</html>
