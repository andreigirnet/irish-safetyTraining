<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice - #123</title>

    <style type="text/css">
        @page {
            margin: 0;
        }
        body {
            margin: 0;
        }
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        a {
            color: #fff;
            text-decoration: none;
        }
        table {
            font-size: x-small;
        }
        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }
        .invoice table {
            margin: 15px;
        }
        .invoice h3 {
            margin-left: 15px;
        }
        .information {
            background-color: #60A7A6;
            color: #FFF;
        }
        .information .logo {
            margin: 5px;
        }
        .information table {
            padding: 10px;
        }
        .address{
            text-align: center;
        }
    </style>

</head>
<body>

<div class="information">
    <table style="width: 100%">
        <tr>
            <td align="center" style="width: 40%;">
                <h3 class style="margin-left: 40px">{{$user[0]->name}}</h3>
                <h3 class style="margin-left: 40px">{{$user[0]->email}}</h3>
                <div class="address">{{$order['address']}}</div>

                <div class="address">{{$order['city']}}</div>
                <div class="address">{{$order['county']}}</div>
                <div class="address">{{$order['country']}}</div>
                <br /><br />
                Date: {{date('Y-m-d',strtotime($order['created_at']))}}
                Identifier: #{{$order['id']}}
                Status: Paid
                </pre>
            </td>
            <td align="center">
                <img src="images/logo/logomain.png" alt="Logo" width="150" class="logo"/>
            </td>
            <td align="center" style="width: 40%;">
                <h3 style="margin-left: 50px">Ireland</h3>
                <h3 style="margin-left: 40px">Irish Safety Training Company</h3>
                <pre>
                    https://irish-safetytraining.com
                    Cherrywood Park
                    Clondalkin
                    Dublin22
                    Ireland
                </pre>
            </td>
        </tr>

    </table>
</div>
<br/>
<div class="invoice">
    <h3>Invoice id: #{{$order['id']}}</h3>
    <table width="90%">
        <thead>
        <tr>
            <td>Description</td>
{{--            <td>Quantity</td>--}}
            <td>Total</td>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{$order['product_name']}}</td>
{{--            <td>1</td>--}}
            <td align="left">€ {{$order['paid']}}</td>
        </tr>
        </tbody>
        <tfoot>
        <tr>
            <td colspan="1"></td>
            <td align="left">Total</td>
            <td align="left" class="gray">€{{$order['paid']}}</td>
        </tr>
        </tfoot>
    </table>
</div>

<div class="information" style="position: absolute; bottom: 0;">
    <table width="100%">
        <tr>
            <td align="left" style="width: 50%;">
                &copy; {{ date('Y') }} {{ config('app.name') }} - All rights reserved.
            </td>
        </tr>

    </table>
</div>
</body>
</html>
