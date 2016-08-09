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
    <form method="post" action="https://lab-sera-chen.c9users.io/Payment/Home/check">
        <div class="banner"></div>
        <div class="header">
            <div class="container">
                <div class="logo">
                    <a href="https://lab-sera-chen.c9users.io/Payment/">銀行系統</a>
                </div>
                <div class="menu">
                    
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!---------------------------------------------使用帳號登入-------------------------------------------------->
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="SearchBox">
                        <h1>請輸入以下資料</h1>
                        <div class="SearchForm">
                            <div class="FormOne">
                                <div class="FormLeft">
                                    <p>帳號</p>
                                </div>
                                <div class="FormRight">
                                    <input type="text" name="account" required="required">
                                </div>
                            </div>

                            </div>
                            <div class="FormOneBtn">
                                <div class="FormBtn">
                                    <input type="submit" value="登入" id="btnok" name="btnok" />
                                </div>
                                <div class="FormBtn">
                                    <input type="reset" name="reset" value="清除重填" />
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
</body>

</html>