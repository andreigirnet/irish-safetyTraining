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
            bottom: 3.2%;
            left: 48.5%;
            color: #4a4e4d;
            font-weight: 600;
            font-size: 14px;
        }
        #valid{
            position: absolute;
            bottom: 15.5%;
            left: 32.5%;
            color: #4a4e4d;
            font-weight: 600;
        }
        #expiration{
            position: absolute;
            bottom: 2px;
            left: 46.5%;
            color: #4a4e4d;
            font-weight: 600;
            font-size: 14px;
        }
        #container{
            position: relative;
        }
        #holder{
            position: absolute;
            top: 46%;
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
        <img src="images/certificate/{{ $image }}.jpg" id="image" style="width: 100%" alt="">
        <div id="holder">{{ $holder->name }}</div>
        <div id="id">{{ $certificate[0]->unique_id }}</div>
        <div id="valid">{{ \Carbon\Carbon::parse($certificate[0]->valid_from)->format('Y-m-d') }}</div>
        <div id="expiration">{{ \Carbon\Carbon::parse($certificate[0]->expiration_date)->format('Y-m-d') }}</div>
    </div>
</div>
</body>
</html>
