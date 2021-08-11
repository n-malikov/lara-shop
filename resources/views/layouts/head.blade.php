<head>
<meta charset="utf-8" />
<title>@yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    *{margin:0;padding:0;box-sizing:border-box;}
    body {
        background: #eeeeee;
        padding: 60px 0;
        line-height: 1.0;
        font-family: Verdana;
        color: #333;
    }

    a {
        color: #333;
        text-decoration: none;
    }

    .container {
        width: 720px;
        max-width: 100%;
        margin: 0 auto;
    }
    @media screen and (max-width:1157px){
        .container {
            padding: 0 15px;
        }
    }

    .header {
        background: #fff;
        box-shadow: 0 1px 0 rgba(0, 0, 0, 0.05);
        margin-bottom: 45px;
        padding: 0 15px;
        text-align: center;
    }
    .header a {
        display: inline-flex;
        align-items: center;
        height: 48px;
        margin-right: 30px;
        color: #737373;
    }
    .header a:hover {
        color: #33691e;
    }
    .header a:last-child {
        margin-right: 0;
    }
    .header .a_green {
        font-weight: bold;
        color: green;
    }

    .content {
        padding: 25px;
        background: #fff;
        box-shadow: 0 3px 4px 0 rgba(0, 0, 0, 0.14), 0 3px 3px -2px rgba(0, 0, 0, 0.12), 0 1px 8px 0 rgba(0, 0, 0, 0.2);
        border-radius: 2px;
        font-size: 14px;
        line-height: 24px;
    }
    .content h1 {
        font-size: 26px;
        font-weight: 300;
        line-height: 35px;
    }

    .text-right {
        text-align: right;
    }

    input[type=text],
    input[type=email],
    input[type=password],
    textarea {
        display: block;
        width: 100%;
        max-width: 250px;
        margin: 5px 0 10px;
        padding: 10px 20px;
        outline: none;
        border: 1px solid #eee;
        border-radius: 4px;
        font-size: 14px;
        color: #212121;
    }

    .button {
        display: inline-flex;
        padding: 0 20px;
        box-shadow: 0 1px 0 rgba(0, 0, 0, 0.05);
        border: 1px solid rgba(0,0,0,0.17);
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
        color: #737373;
        font-weight: 500;
        line-height: 34px;
    }
    .button:hover {
        box-shadow: 0 1px 0 0 rgba(0, 0, 0, 0.27);
    }

    .count-buttons {
        display: flex;
        flex-wrap: wrap;
    }
    .count-buttons__int {
        display: flex;
        align-items: center;
        padding: 0 15px;
    }

    .message {
        margin-bottom: 20px;
        padding: 15px;
        border: 1px solid #000;
        text-align: center;
    }
    .message__success {
        color: #3c763d;
        background-color: #dff0d8;
        border-color: #d6e9c6;
    }
    .message__warning {
        color: #8a6d3b;
        background-color: #fcf8e3;
        border-color: #faebcc;
    }

    .table{
        border-collapse: collapse;
        border-spacing: 0;
        border: 1px solid #eee;
        table-layout: fixed;
        width: 100%;
        margin-bottom: 20px;
    }
    .table th {
        font-weight: bold;
        padding: 5px;
        background: #efefef;
        border: 1px solid #dddddd;
    }
    .table td{
        padding: 5px 10px;
        border: 1px solid #eee;
        text-align: left;
    }
    .table tbody tr:nth-child(odd){
        background: #fff;
    }
    .table tbody tr:nth-child(even){
        background: #F7F7F7;
    }
</style>
</head>
{{-- \. /var/www/lara-shop.artello.ru/lara_shop.sql --}}
