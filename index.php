<link rel="stylesheet" href="style.css">

<h1>萬年曆</h1>
<!-- <div> -->
<div>
    <form action="?" method='get'>
        年份:<input type="number" name="year"  min="1">
        月份:<input type="number" name="month"  min="1" max="12">
        <input type="submit" value="產生年曆">
    </form>
</div>

<?php
if(isset($_GET["year"])){
    $year=$_GET["year"];
}else{
    $year=date("Y");}

if(isset($_GET["month"])){
    $month=$_GET["month"];
}else{
    $month=date("m");}

$thisyear="$year-$month";
$thismonth=date("m");
$firstDay="$year-$month-01";
$today=date("Y-m-d");

//下個月
// $NM=date("m" , strtotime("+1 month".$firstDay));
if($month==12){
    $nextyear=$year+1;
    $NM=1;
}
else{
    $nextyear=$year;
    $NM=$month+1;
}

//上個月
// $LM=date("m" , strtotime("-1 month".$firstDay));
if($month==1){
    $preyear=$year-1;
    $LM=12;
}
else{
    $preyear=$year;
    $LM=$month-1;
}

//明年
$NY=date("Y" , strtotime("+1 year".$thisyear));
//去年
$LY=date("Y" , strtotime("-1 year".$thisyear));
//星期中的第幾天
$firstDayWeek=date("w",strtotime($firstDay));
//指定的月份有幾天
$monthDays=date("t",strtotime($firstDay));

?>
<div class="Llast">
    <div class="last">
    <a href="index.php?year=<?=$LY;?>">上一年<br>(<?=$LY;?>)</a>
    </div>
    <div class="last">
    <a href="index.php?year=<?=$preyear;?>&month=<?=$LM;?>">上一月<br>(<?=$LM;?>)</a>
    </div>
    <div class="last">
    <a href="index.php?month=<?=$thismonth;?>">本月</a>
    </div>
    <div class="last">
    <a href="index.php?year=<?=$nextyear;?>&month=<?=$NM;?>">下一月<br>(<?= $NM;?>)</a>
    </div>
    <div class="last">
    <a href="index.php?year=<?=$NY;?>">下一年<br>(<?=$NY;?>)</a>
    </div>
</div>

<div class="box">
    <div class="calendar1">
        <table>
        <tr><td colspan="7" class="col1">西元:<?=$year;?>/月份:<?=$month;?></td></tr>

        <tr>
            <td width="90px" class="col2">SUN</td>
            <td width="90px" class="col2">MON</td>
            <td width="90px" class="col2">TUE</td>
            <td width="90px" class="col2">WED</td>
            <td width="90px" class="col2">THU</td>
            <td width="90px" class="col2">FRI</td>
            <td width="90px" class="col2">SAT</td>
        </tr>
    <?php

for($i=0;$i<6;$i++){
    echo "<tr>";
    for($j=0;$j<7;$j++){
        if($i==0 && $j<$firstDayWeek){
            echo "<td>";
            echo "</td>";
        }else{
            echo "<td>";
            $num=$i*7+$j+1-$firstDayWeek;
            if($num<=$monthDays){
                echo $num;
            }else{
                echo "　";
            }
            echo "</td>";
        }
    }
    echo "</tr>";   
}    
?>
    </table>
    </div>
    <div style="width:350px">
        <img src="https://i.imgur.com/UtdBU0F.jpg" width="350" height="480">
    </div>
    <?php
    ?>

</div>

