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
        </div>
        <div class="SearchBox2">
         <div class="FormBtn">
             <input type="button" onclick="history.back()" class="btn" value="回上頁"/>
         </div>
                        <h1>餘額及明細</h1>
                    <div class="block">
                        <div>目前餘額:<?php echo($data[0]['total']);?></div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>日期</th>
                                    <th>轉入/轉出</th>
                                    <th>金額</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                foreach($data as $key => $value)
                                 {
                                ?>
                                <tr >
                                    <td><?php echo $value['date'];?></td>
                                    <td><?php echo $value['type'];?></td>
                                    <td><?php echo $value['money'];?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
        </div>
</body>
</html>