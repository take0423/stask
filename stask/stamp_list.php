<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stamp_style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>スタスク</title>
</head>
<?php
$taskfile = "task.php";
$taskf = file_get_contents($taskfile);
?>
<h1><img class='stampN-top' src='img/stampN.png' width='40' height='40' alt=''>スタスク<img class='stampL-top' src='img/stampL.png' width='50' height='50' alt=''></h1>
<div class="top-msg">
    <p>やることやってスタンプためよう！</p>
</div>
<div class="task-group-wrapper">
    <div class="task-group">
        <!-- 追加ボタン -->
        <input class="add-task add-btn" type="button" value="追加">
        <div class="list-wrapper">
            <div class="tasks">
                <!-- ★ここにタスク追加★ -->
            </div>
        </div>
        <div class="comment-wrapper">
            <!-- カウントアップ表示 -->
            <div class="countup"></div>
            <!-- コメント表示 -->
            <div class="comment"></div>
            <!-- スタンプ大 -->
            <div class="stamp-box"></div>
        </div>
    </div>   
</div>

<script type="text/javascript">
$(function(){
    var task = <?php echo json_encode($taskf);?>;
    //タスク追加ボタンクリック
    $(".add-btn").click(function(){
        //リストを複製して追加
        $(task).clone().appendTo(".tasks");
        //数を数える→カウント表示
        var staSnum = $(".stampS").length;
        var listnum = $(".task").length;
        var countup = "<p><span class='font-l'>"+ staSnum + "</span>/" + listnum + "</p>";
        $(".countup").html(countup);
        
        //リストの数と小スタンプの数が違ったら、大スタンプ非表示
        if(listnum !== staSnum){
            var kara = "";
            var fightMsg = "<p class='fightMsg'>Fight★</p>";
            $(".stamp-box").html(kara);
            $(".comment").html(fightMsg);
        }
    });
    //okボタンをクリック
    $(document).on("click", ".okBtn", function(){
        var checkbox = $(this).parents(".taskflex").find(".checkbox");
        //済（小）、ねこ、肉球
        var stampS ="<img class='stampS' src='img/stampL.png' width='40' height='40' alt=''>";
        var stampN ="<img class='stampN' src='img/stampN.png' width='40' height='40' alt=''>";
        var stampH ="<img class='stampH' src='img/stampH.png' width='40' height='40' alt=''>";
        checkbox.html(stampH);
        // 数えて表示
        var staSnum = $(".stampH").length;
        var listnum = $(".task").length;
        var countup = "<p><span class='font-l'>"+ staSnum + "</span>/" + listnum + "</p>";
        $(".countup").html(countup);
        //リストの数とスタンプ小の数が一致したら
        if(listnum == staSnum && listnum > 0 && staSnum > 0 ){
            //ねこ（大）済（大）、おめでとう
            var stampN ="<img class='stampN' src='img/stampN.png' width='100' height='100' alt=''>";
            var stampL ="<img class='stampL' src='img/stampL.png' width='100' height='100' alt=''>";
            var comment ="<p class='congratulations'>Congratulations★</p>";
            $(".stamp-box").html(stampN);
            $(".comment").html(comment);
        }
    });
});
</script>
</body>
</html>