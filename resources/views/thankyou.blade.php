<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Reset Password</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>
    <body>
        <div class="jumbotron text-center">
            @if(isset($account_activated))
                <h1 class="display-3">Account Activated!</h1>
                <p class="lead"><strong>Your account has been activated successfully.</p>
                <hr>
            @else
                <h1 class="display-3">Password Changed!</h1>
                <p class="lead"><strong>Your password has been changed successfully.</p>
                <hr>
            @endif
        </div>
    </body>
</html>
