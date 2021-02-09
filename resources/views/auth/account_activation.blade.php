<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Safra</title>
    <style>
        body {
            background: #384047;
            font-family: sans-serif;
            font-size: 10px
        }

        p {
            margin: 0 0 3em 0;
            position: relative;
        }
    </style>
</head>
<body>
    <h2>Activate your safra account.</h2>
    <a href="{{ url('/activate_user/' . $user->verified_token) }}">Activate</a>
</body>
</html>