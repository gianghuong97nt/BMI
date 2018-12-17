<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Jumbotron Template for Bootstrap</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body>

<nav class="navbar navbar-inverse">
    <div class="container" >
        <div class="navbar-header" style="font-family: Algerian">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">HOME</a>
            <a class="navbar-brand" href="#">ABOUT</a>
            <a class="navbar-brand" href="#">TOUCH ME</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <form class="navbar-form navbar-right">
                <div class="form-group">
                    <input type="text" placeholder="Email" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Password" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Sign in</button>
            </form>
        </div><!--/.navbar-collapse -->
    </div>
</nav>

<?php
$url = 'https://www.vietcombank.com.vn/exchangerates/ExrateXML.aspx';
$xml = file_get_contents($url);
$data = simplexml_load_string($xml);

$source = $data->Source;
$dateTime = $data->DateTime;
$Exrate = $data->Exrate;

?>



<div class="container">
    <h2>Tỉ giá vàng USD</h2>
    <h3>Đã được cập nhật lúc <?php echo $dateTime ?></h3>

    <hr>


    <table class="table">
        <thead>
        <tr>
            <th>Mã ngoại tệ</th>
            <th>Tên ngoại tệ</th>
            <th>Mua</th>
            <th>Chuyển khoản</th>
            <th>Bán ra</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($Exrate as $item): ?>
            <tr>
                <td><?php echo $item['CurrencyCode'] ?></td>
                <td><?php echo $item['CurrencyName'] ?></td>
                <td><?php echo $item['Buy'] ?></td>
                <td><?php echo $item['Transfer'] ?></td>
                <td><?php echo $item['Sell'] ?></td>

            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <footer>
        <p><strong style="color: red"><?php echo $source ?></strong></p>

    </footer>
</div> <!-- /container -->




</body>
</html>
