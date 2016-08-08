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
    <!--<script type="text/javascript" src="javascript/Index.js"></script>-->
</head>

<body>
    <form method="post" action="">
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
                        <h1>請選擇執行功能</h1>
                        <div class="SearchForm">
                            <div class="FormOne">
                                <div class="FormLeft">
                                    <p>功能</p>
                                </div>
                                <div class="FormRight">
                                    <select class="easyui-combobox textbox" name="type" style="width:70px;" required="required" >
                                        <option value="轉入">轉入</option>
                                        <option value="轉出">轉出</option>
                                    </select> 
                                </div>
                                </div>
                            
                            <div class="FormOne">
                                <div class="FormLeft">
                                    <p>金額</p>
                                </div>
                                <div class="FormRight">
                                    <input type="text" name='money' required="required" />
                                </div>
                                </div>  
                                <div class="FormOneBtn">
                                
                                <div class="FormBtn">
                                    <input type="submit" value="送出" id="btnok" name="btnok" />
                                </div>
                                
                                
                            </div>
                                
                                
                            </div>
                            
                            </div>
                        </div>
                    </div>
                </div>
                </form>
                
</body>

</html>