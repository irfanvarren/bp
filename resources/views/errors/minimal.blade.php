<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .code {
            border-right: 2px solid;
            font-size: 26px;
            padding: 0 15px 0 15px;
            text-align: center;
        }

        .message {
            font-size: 18px;
            text-align: center;
            padding-left: 15px;
        }
    </style>
</head>
<body>
    <div class="position-ref full-height  flex-center">
        <div>
            <div style="width: 100%;" class="flex-center">
                <div class="code">
                    @yield('code')
                </div>
                <div class="message">
                    @yield('message')
                </div>
            </div>
            <div style="width: 100%;float: left;text-align: center; margin-top:30px;">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
