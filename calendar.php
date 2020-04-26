<style>
body{
    display:flex;
    align-items:center;
    flex-direction:column ;
    font-family: 'Arial', "DFKai-sb", sans-serif;
    background-image:
            radial-gradient(circle at center, rgb(219, 49, 224) , transparent 60%),
            radial-gradient(circle at left, rgb(54, 160, 231), transparent 50%), 
            radial-gradient(circle at left top, rgb(224, 159, 84) , transparent 80%),
            radial-gradient(circle at right bottom, rgb(11, 127, 221), transparent 70%),  
            radial-gradient(circle at right, rgb(141, 216, 72) , transparent 75%);
}
.box{
    width:1000px;
    display:flex;
    justify-content: space-around;
    align-items: center;
    box-shadow:inset 5px 5px 12px gold , 5px 5px 12px gold ;
}
.calendar1{
    width:auto;
    padding:10px;
}
table{
    width:630px;  
    height:480px;
    text-align:center;
    border-collapse:collapse;
}
table td{
    border:2px solid #000;
    padding:5px;
    text-align:center;
    background:rgb(215, 236, 100);
}
.Llast{
    display:flex;
}
.last{
    display:flex;
    justify-content:center;
    align-items:center;
    border:5px solid lightgreen;
    font-size:18px;
    width:150px;
    height:40px;
    background:rgb(32, 209, 47);
    border-radius: 15px;
}
.col1{
    background:rgb(45, 76, 216);
    color:#fff;
    font-size:2rem;
}
.col2{
    background:rgb(100, 175, 236);
    color:#fff;
    font-size:2rem;
}
</style>


<h1>萬年曆</h1>
<!-- <div> -->
<div>
    <form action="?" method='get'>
        年份:<input type="number" name="year" >
        <input type="submit" value="產生年曆">
    </form>
</div>


<?php

if(isset($_GET["year"])){
    $year=$_GET["year"];
}else{
    $year=date("Y");
}

$m=date("m");

if(isset($_GET["month"])){
    $m=$_GET["month"];
}

$LM=$m-1;
$NM=$m+1;
// $LYin=$year-1;
// $NYin=$year+1;
// $LYout=$year-1;
// $NYout=$year+1;

if($m==1){
    $LYin=$year-1;
    $LM=12;
}else{
    $LYin=$year;
    $LM=$m-1;
}

if($m==12){
    $NYin=$year+1;
    $NM=1;
}else{
    $NYin=$year;
    $NM=$m+1;
}


?>
<div class="Llast">

    <!-- <div class="last">
    <a href="calendar.php?year=<?=$LYout;?> & month=<?=$m;?>">上一年(<?=$LYout;?>)</a>
    </div> -->
    <div class="last">
    <a href="calendar.php?year=<?=$LYin;?> & month=<?=$LM;?>">上一月(<?=$LM;?>)</a>
    </div>
    <div class="last">
    <a href="calendar.php?year=<?=$NYin;?> & month=<?=$NM;?>">下一月(<?=$NM;?>)</a>
    </div>
    <!-- <div class="last">
    <a href="calendar.php?year=<?=$NYout;?> & month=<?=$m;?>">下一年(<?=$NYout;?>)</a>
    </div> -->
</div>

<div class="box">
    <div class="calendar1">
        <table>
        <tr><td colspan="7" class="col1">西元:<?=$year;?>/月份:<?=$m;?></td></tr>

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


$firstDay="$year-$m-01";
//星期中的第幾天
    $firstDayWeek=date("w",strtotime($firstDay));
//指定的月份有幾天
    $monthDays=date("t",strtotime($firstDay));


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

    <div>
        <img src="https://picsum.photos/350/480/?random=1">
    </div>


    <?php
    ?>

</div>

