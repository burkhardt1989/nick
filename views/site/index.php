<!DOCTYPE html>
<html>
    <head> 
        <style type="text/css">
        table.imagetable {
            font-family: verdana,arial,sans-serif;
            font-size:11px;
            color:#333333;
            border-width: 1px;
            border-color: #999999;
            border-collapse: collapse;
        }
        table.imagetable th {
            background:#b5cfd2 url('http://img.my.csdn.net/uploads/201209/08/1347078600_3763.jpg');
            border-width: 1px;
            padding: 8px;
            border-style: solid;
            border-color: #999999;
        }
        table.imagetable td {
            background:#dcddc0 url('http://img.my.csdn.net/uploads/201209/08/1347078645_1925.jpg');
            border-width: 1px;
            padding: 8px;
            border-style: solid;
            border-color: #999999;
        }
        </style>
        <meta charset="UTF-8"> 
        <title>Cashier API</title> 
    </head>
    <body>
        积分榜
        <table class="imagetable">
            <tr>
                <th>名称</th>
                <th>积分</th>
            </tr>
        <?php foreach ($users as $user) { ?>
            <tr>
                <td><?php echo $user['username'] ?></td>
                <td><?php echo $user['score'] ?></td>
            </tr>
        <?php } ?>
        </table>
    </body>
</html>