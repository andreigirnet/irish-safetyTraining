<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Certificate</title>

    <style type="text/css">
        #image{
            position: absolute;
        }
        #id{
            position: absolute;
            bottom: -4px;
            left: 50%;
            color: #4a4e4d;
            font-weight: 600;
            font-size: 14px;
        }
        #valid{
            position: absolute;
            bottom: 18%;
            left: 24%;
            color: #4a4e4d;
            font-weight: 600;
        }
        #expiration{
            position: absolute;
            bottom: 2.3%;
            left: 48.5%;
            color: #4a4e4d;
            font-weight: 600;
            font-size: 14px;
        }
        #container{
            position: relative;
        }
        #holder{
            position: absolute;
            top: 40%;
            width: 100%;
            text-align: center;
            font-size: 30px;
            font-weight: 600;
            color: #4a4e4d;
        }
    </style>
</head>
<body>

<div>
    <div id="container">
        <img src="images/certificate/certificate.jpg" id="image" style="width: 100%" alt="">
        <div id="holder">{{$holder->name}}</div>
        <div id="id">{{$certificate[0]->unique_id}}</div>
        <div id="valid">{{$certificate[0]->valid_from}}</div>
        <div id="expiration">{{$certificate[0]->expiration_date}}</div>
    </div>
</div>
</body>
</html>
