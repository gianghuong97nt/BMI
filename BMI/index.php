<?php
if(isset($_POST)){
    $weight = 0;
    $height = 0;
    if(isset($_POST['height']) && is_numeric($_POST['height']) && $_POST['height'] >0){
        $height = $_POST['height'];
    }

    if(isset($_POST['weight']) && is_numeric($_POST['weight']) && $_POST['weight'] >0){
        $weight = $_POST['weight'];
    }

    $result = "";
    if($height && $weight){
        $index_bmi = $weight/ ($height*$height);
        $index_bmi = round($index_bmi, 3);
        if($index_bmi<18.5){
            $result = "Gầy";
        }else if($index_bmi>= 18.5 && $index_bmi <=24.5){
            $result = "Bình thường";
        }else if($index_bmi>= 25 && $index_bmi <=29.9){
            $result = "Thừa cân";
        }else if($index_bmi>= 30 && $index_bmi <=34.9){
            $result = "Béo phì cấp độ I";
        }else if($index_bmi>= 35 && $index_bmi <=39.9){
            $result = "Béo phì cấp độ II";
        }else{
            $result= "Béo phì cấp độ III";
        }

    }else{
        $result = "Mời bạn nhập dữ liệu";
    }
}
?>

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

    <title>Giang</title>

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

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <h2 style="font-size: 45px">Công cụ tính BMI – Cách xác định độ gầy béo | Chỉ số BMI là gì?</h2>
        <h3><trong>Hướng dẫn cách tính chỉ số BMI chuẩn khoa hoc nhất</trong></h3>
        <p style="color: red; text-align: center">
             <strong>Công thức tính chỉ số BMI = (trọng lượng cơ thể)/(chiều cao x chiều cao)
             </strong>
        </p>
        <ul>
            <li>Trọng lượng cơ thể tính bằng đơn vị (kg)</li>
            <li>Chiều cao: Tính bằng đơn vị (m)</li>
        </ul>
        <p>Tổ chức Y tế Thế giới (WHO) khuyến cáo trọng lượng cơ thể dựa trên
        giá trị BMI cho người lớn (trên 18 tuổi)
        </p>

        <p>
            <img src="bmi.jpg">
        </p>

    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form name="cal_bmi" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<!--                <div class="form-group">-->
<!--                    <label>Ảnh:</label>-->
<!--                    <img src="huong.jpg" class="form-control" style="width: 550px; height: 380px">-->
<!--                </div>-->
                <div class="form-group">
                    <label>Chiều cao (M):</label>
                    <?php $val_height = isset($_POST['height']) ? $_POST['height']: ''; ?>
                    <input name="height" type="text" class="form-control" placeholder="Nhập chiều cao theo đơn vị mét" value="<?php echo $val_height ?>">
                </div>
                <div class="form-group">
                    <label>Cân nặng (kg):</label>
                    <?php $val_weight = isset($_POST['weight'])? $_POST['weight']: ''; ?>
                    <input name="weight" type="text" class="form-control" placeholder="Nhập cân nặng theo đơn vị kilogram" value="<?php echo $val_weight?>">
                </div>
                <div class="form-group">
                    <label>Chỉ số khối cơ thể</label>
                    <?php if (isset($index_bmi)) : ?>
                    <p class="help-block"><?php echo $index_bmi; ?></p>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label>Kết quả</label>
                    <?php if (isset($result)) : ?>
                        <p class="help-block"><?php echo $result; ?></p>
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn btn-danger">Tính BMI</button>
            </form>

        </div>
    </div>

    <hr>

    <footer>
        <p>&copy; 2016 Company, Inc.</p>
    </footer>
</div> <!-- /container -->




</body>
</html>
