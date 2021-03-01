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
        #VerifyEmail{
            padding: 15px 30px;
        }
        body{
            text-align: center;
            padding-top: 18%;
            width: 80%;
            padding-left: 45px;
        }
        h2{
            color: white;
            font-size: 33px;
        }
         h4{
            color: white;
         font-size: 25px;
        }



    </style>
</head>
<body>
    <h2>Verify Your Email</h2>


<h4>Your OTP Code is :{{$data['token']}}</h4>


    
</body>
</html>