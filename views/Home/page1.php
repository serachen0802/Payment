<!DOCTYPE HTML>
<html>
<head>
    <base href="/Payment/public/" />

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>銀行系統</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.min.css" type="text/css" />
    <link rel="stylesheet" href="css/index.css" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.full.min.js"></script>
</head>
<body>
    <form method="post" action="">
        <div class="banner"></div>
        <div class="header">
            <div class="container">
                <div class="logo">
                    <a href="https://lab-sera-chen.c9users.io/Payment/">銀行系統</a>
                </div>
                <div class="menu"></div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!---------------------------------------------選擇功能-------------------------------------------------->
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="SearchBox">
                        <h1>請選擇執行功能</h1>
                        <div class="SearchForm"></div>
                            <div class="FormOneBtn">
                                <div class="FormBtn">
                                    <a href="https://lab-sera-chen.c9users.io/Payment/Home/index"><input type="button" value="登出" name="btnok" /></a>
                                </div>
                                <div class="FormBtn">
                                    <a href="https://lab-sera-chen.c9users.io/Payment/Page/money"><input type="button" value="轉入/轉出"  name="btnok" /></a>
                                </div>
                                <div class="FormBtn">
                                    <a href="https://lab-sera-chen.c9users.io/Payment/Page/details"><input type="button" value="查詢餘額及明細" name="btnok" /></a>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>

</body>
</html>