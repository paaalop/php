<!DOCTYPE html>
<html>
    <head>
        <style>
            div{
                border : 5px solid skyblue;
                border-radius : 10px;
                margin : 20px;
                padding : 20px;
                padding-top : 0px;
            }
        </style>
    </head>
    <body>
        <div>
            <h2>SUM, FACTORIAL</h2>
        <form action="homework.php" method="post">
            숫자를 입력하세요 : <input type="number" name="num">
            <input type="submit" value="확인">
        </form>
        <?php
        if(isset($_POST["num"]))
        {
        $n = $_POST["num"];
        $sum = 0;
        $prod = 1;
        for($i = 1; $i <= $n; $i++)
        {
            echo $i." ";
            $sum += $i;
            $prod *= $i;    
        }
        echo "<br>합: ".$sum;
        echo "<br>곱: ".$prod;
    }
        ?>
        </div>

        <div>
            <h2>SORT</h2>
            <form action="homework.php" method="post">
                10 이상 100 이하의 숫자를 입력하세요 : <input type="number" name="num2">
                <input type="submit" value="확인">
            </form>
            <?php
            if(isset($_POST["num2"]) && $_POST["num2"] >= 10 && $_POST["num2"] <= 100)
            {
                $n = $_POST["num2"];

                echo "생성된 숫자 : ";
                for($i = 0; $i < $n; $i++)
                {
                    $data[$i] = rand(0, 100);
                    echo $data[$i]." ";
                }  

                sort($data);

                echo "<br>오름차순: ";
                for($i = 0; $i < $n; $i++)
                    echo $data[$i]." ";
            }
            ?>
        </div>

        <div>
            <h2>FIBONACCI</h2>
            <form action="homework.php" method="post">
                100 이하의 숫자를 입력하세요 : <input type="number" name="num3">
                <input type="submit" value="확인">
            </form>
            <?php
            if(isset($_POST["num3"]) && $_POST["num3"] > 0 && $_POST["num3"] <= 100)
            {
                $n = $_POST["num3"];

                for($i = 0; $i < $n; $i++)
                {
                    if($i>1)
                        $data[$i] = $data[$i-1] + $data[$i-2];
                    else
                        $data[$i] = 1;
                }

                for($i = 0; $i < $n; $i++)
                { 
                    echo ($i+1)." ".$data[$i]." ";
                    if($i<$n-1) 
                        echo $data[$i+1] / $data[$i]."<br>";
                }
            }
            ?>
        </div>

        <div>
            <h2>CALENDAR</h2>
        <form action="homework.php" method="post">
            년(年)을 입력하세요 : <input type="number" name="y" /><br />
            월(月)을 입력하세요 : <input type="number" name="m" />
        <input type="submit" value="확인" />
        </form>
        <?PHP
            if(isset($_POST['y']) && strlen($_POST['y']) > 0 && isset($_POST['m']) && strlen($_POST['m']) > 0) 
            {
                $m = $_POST["m"];
                $y = $_POST["y"];
                if(checkdate($m,1,$y)) {
                    $firstweekday = getDate(mktime(0,0,0,$m,1,$y)); //해당 월 1일의 요일
                    $firstweekday = $firstweekday['wday'];
                    $lastday = date("t", mktime(0,0,0,$m,1,$y)); //t = 주어진 월의 총 일 수(ex : 2014년 1월 = "31" 일)
                    $fc = ceil(($firstweekday+$lastday)/7); //총 주의 수
                    $count = $fc*7; //for 문 count
                    $j=1;
                    echo "<table border='1' width=\"500\" bordercolor=\"#0000FF\">";
                    echo "<tr bgcolor=\"#66FFFF\" align=\"center\"><td colspan=\"7\">". $y."년 ".$m."월 달력</td></tr>";
                    echo "<tr align=\"right\" bgcolor=\"#FF99FF\"><td>일</td><td>월</td><td>화</td><td>수</td><td>목</td><td>금</td><td>토</td></tr>";
                    for($i=1; $i<=$count; $i++){
                        if($i%7==1){
                            echo "<tr>";
                        }
                        echo "<td>";
                        if($i>$firstweekday && $j<=$lastday){
                            echo $j;
                            $j++;
                        }
                        else {
                            echo "&nbsp;";
                        }
                        echo "</td>";
                        if($i%7==0){
                            echo "</tr>";
                        }
                    }
                    echo "</table>";
                    echo "<br/>";        
                }
            }
        ?>
        </div>

        <div>
            <h2>CALCULATE</h2>
            <h2>삼각형 면적</h2>
    <form method="post" action="">
        <label for="tri-base">밑변:</label>
        <input type="number" name="tri-base" id="tri-base" required>
        <br>
        <label for="tri-height">높이:</label>
        <input type="number" name="tri-height" id="tri-height" required>
        <input type="submit" value="계산">
    </form>
    <?php
        if(isset($_POST['tri-base']) && isset($_POST['tri-height'])) {
            $base = $_POST['tri-base'];
            $height = $_POST['tri-height'];
            $area = $base * $height / 2;
            echo "<p>삼각형의 면적은 $area 입니다.</p>";
        }
    ?>


    <h2>직사각형 면적</h2>
    <form method="post" action="">
        <label for="rect-width">가로:</label>
        <input type="number" name="rect-width" id="rect-width" required>
        <br>
        <label for="rect-height">세로:</label>
        <input type="number" name="rect-height" id="rect-height" required>
        <input type="submit" value="계산">
    </form>
    <?php
        if(isset($_POST['rect-width']) && isset($_POST['rect-height'])) {
            $width = $_POST['rect-width'];
            $height = $_POST['rect-height'];
            $area = $width * $height;
            echo "<p>직사각형의 면적은 $area 입니다.</p>";
        }
    ?>


    <h2>원 면적</h2>
    <form method="post" action="">
        <label for="cir-radius">반지름:</label>
        <input type="number" name="cir-radius" id="cir-radius" required>
        <input type="submit" value="계산">
    </form>
    <?php
        if(isset($_POST['cir-radius'])) {
            $radius = $_POST['cir-radius'];
            $area = pi() * pow($radius, 2);
            echo "<p>원의 면적은 $area 입니다.</p>";
        }
    ?>


    <h2>직육면체 체적</h2>
    <form method="post" action="">
        <label for="rectp-width">가로:</label>
        <input type="number" name="rectp-width" id="rectp-width" required>
        <br>
        <label for="rectp-length">세로:</label>
        <input type="number" name="rectp-length" id="rectp-length" required>
        <br>
        <label for="rectp-height">높이:</label>
        <input type="number" name="rectp-height" id="rectp-height" required>
        <input type="submit" value="계산">
    </form>
    <?php
    if(isset($_POST['rectp-width']) && isset($_POST['rectp-length']) && isset($_POST['rectp-height'])) {
        $width = $_POST['rectp-width'];
        $length = $_POST['rectp-length'];
        $height = $_POST['rectp-height'];
        $volume = $width * $length * $height;
        echo "<p>직육면체의 체적은 $volume 입니다.</p>";
    }
?>


<h2>원통 체적</h2>
<form method="post" action="">
    <label for="cyl-radius">반지름:</label>
    <input type="number" name="cyl-radius" id="cyl-radius" required>
    <br>
    <label for="cyl-height">높이:</label>
    <input type="number" name="cyl-height" id="cyl-height" required>
    <input type="submit" value="계산">
</form>
<?php
    if(isset($_POST['cyl-radius']) && isset($_POST['cyl-height'])) {
        $radius = $_POST['cyl-radius'];
        $height = $_POST['cyl-height'];
        $volume = pi() * pow($radius, 2) * $height;
        echo "<p>원통의 체적은 $volume 입니다.</p>";
    }
?>


<h2>구 체적</h2>
<form method="post" action="">
    <label for="sph-radius">반지름:</label>
    <input type="number" name="sph-radius" id="sph-radius" required>
    <input type="submit" value="계산">
</form>
<?php
    if(isset($_POST['sph-radius'])) {
        $radius = $_POST['sph-radius'];
        $volume = 4/3 * pi() * pow($radius, 3);
        echo "<p>구의 체적은 $volume 입니다.</p>";
    }
?>
        </div>
    </body>
</html>