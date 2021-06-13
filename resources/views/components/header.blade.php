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
</style>

<div class="header">
    <div class="container">
        <a href="/">Главная</a>
        <a href="/categories">Категории</a>
        <a href="/product/vinni">Продукт</a>
    </div>
</div>