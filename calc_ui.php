<?php require_once("calc.php")?>

<!DOCTYPE html>
<html>
    <head>
        <title>電卓アプリ</title>
    </head>
    <body>
        <h2>電卓アプリ</h2>
            <!-- $displayNum(ディスプレイに表示するための変数)が空の場合、0を表示
            それ以外は$displayNumに格納された値を表示 -->
            <p><?php if(empty($displayNum)){echo 0;}else{echo $displayNum;} ?></p>
        <!-- calc_ui.phpにデータを送信。post変数でデータを受け取る -->
        <form action="calc_ui.php" method="post">
            <!-- 各変数の値を表示せず保存する -->
            <input type="hidden" name="displayNum" value="<?php echo $displayNum;?>"/>
            <input type="hidden" name="pre_button" value="<?php echo $pre_button;?>"/>
            <input type="hidden" name="ope" value="<?php echo $ope;?>"/>
            <input type="hidden" name="pre_num" value="<?php echo $pre_num;?>"/>
            <input type="hidden" name="input_num" value="<?php echo $input_num;?>"/>
            <input type="hidden" name="memory" value="<?php echo $memory;?>"/>

            <!-- 電卓のボタンを等間隔に配置 -->
            <table>
                <tr align="center">
                    <td><button type="submit" name="button" value="MC">MC</button></td>
                    <td><button type="submit" name="button" value="MR">MR</button></td>
                    <td><button type="submit" name="button" value="M+">M+</button></td>
                    <td><button type="submit" name="button" value="M-">M-</button></td>
                    <td><button type="submit" name="button" value="MS">MS</button></td>
                </tr>
                <tr align="center">
                    <td><button type="submit" name="button" value="%">%</button></td>
                    <td><button type="submit" name="button" value="CE">CE</button></td>
                    <td><button type="submit" name="button" value="C">C</button></td>
                </tr>
                <tr align="center">
                    <td><button type="submit" name="button" value="1/x">1/x</button></td>
                    <td><button type="submit" name="button" value="x^2">x^2</button></td>
                    <td><button type="submit" name="button" value="2√x">2√x</button></td>
                    <td><button type="submit" name="button" value="÷">÷</button></td>
                </tr>
                <tr align="center">
                    <td><button type="submit" name="button" value="7">7</button></td>
                    <td><button type="submit" name="button" value="8">8</button></td>
                    <td><button type="submit" name="button" value="9">9</button></td>
                    <td><button type="submit" name="button" value="×">×</button></td>
                </tr>
                <tr align="center">
                    <td><button type="submit" name="button" value="4">4</button></td>
                    <td><button type="submit" name="button" value="5">5</button></td>
                    <td><button type="submit" name="button" value="6">6</button></td>
                    <td><button type="submit" name="button" value="-">-</button></td>
                </tr>
                <tr align="center">
                    <td><button type="submit" name="button" value="1">1</button></td>
                    <td><button type="submit" name="button" value="2">2</button></td>
                    <td><button type="submit" name="button" value="3">3</button></td>
                    <td><button type="submit" name="button" value="+">+</button></td>
                </tr>
                <tr align="center">
                    <td><button type="submit" name="button" value="+/-">+/-</button></td>
                    <td><button type="submit" name="button" value="0">0</button></td>
                    <td><button type="submit" name="button" value=".">.</button></td>
                    <td><button type="submit" name="button" value="=">=</button></td>
                </tr>
            </table>
        </form>
    </body>
</html>