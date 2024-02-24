<?php
//変数を定義
//isset:与えられた変数に値がセットされているか判定する
$displayNum = isset($_POST['displayNum']) ? $_POST['displayNum'] : '';
$pre_num = isset($_POST['pre_num']) ? $_POST['pre_num'] : '';
$ope = isset($_POST['ope']) ? $_POST['ope'] : ''; 
$pre_button = isset($_POST['pre_button']) ? $_POST['pre_button'] : ''; 
$button = isset($_POST['button']) ? $_POST['button'] : ''; 
$input_num = isset($_POST['input_num']) ? $_POST['input_num'] : '';
$memory = isset($_POST['memory']) ? $_POST['memory'] : '';

//数字ボタンが押された場合
if(isNumBtn($button)||empty($button)){
    //数字ボタンの次に記号ボタンを押した場合
    if(isSymBtn($pre_button)){
        $pre_num = $displayNum; //ディスプレイに表示されていた数字を$pre_numに格納
        $displayNum = $button; //次に押した数字をディスプレイに表示
    }else{ //連続で数字が押された場合
            
            //01や02と表示されないようにする
            //ディスプレイに0が表示されているときに、数字ボタンが押された場合、
            //$displayNumに空文字を格納
            if(($displayNum == '0') && (isNumBtn($button) != '0')){ 
                $displayNum = '';
            }
            #$displayNumと$buttonを連結してディスプレイに表示
            $displayNum = $displayNum.$button;
    }

}else{

//記号ボタンが押された場合
    switch($button){
        case 'M+': //ディスプレイに表示されている値をメモリに足す
            if(!is_numeric($memory)){ //$memoryが数値でない場合、初期値0を代入
                $memory = 0;
            }
            $memory += $displayNum;
            break;

        case 'M-': //ディスプレイに表示されている値をメモリから引く
            if(!is_numeric($memory)){ //$memoryが数値でない場合、初期値0を代入
                $memory = 0;
            }
        $memory -= $displayNum;
        break;

        case 'MR': //メモリから値を取り出す
            $displayNum = $memory;
        break;

        case 'MC': //メモリクリア
            $memory = '';
            break;

        case 'MS': //メモリセーブ(1つの値だけ保存)
            $memory = $displayNum;
            break;

        case 'C': //オールクリア：計算式ごと削除する
            $displayNum = '';
            $pre_num = '';
            $input_num = '';
            break;

        case '%': //$displayNumの値に対して、パーセント計算を行う
            $displayNum = $displayNum / 100;
            break;    

        case '1/x': //x分の1の計算を行う
            $displayNum = 1 / $displayNum;
            break;

        case 'x^2': //二乗
            $displayNum *= $displayNum;
            break;

        case '2√x': //平方根
            $displayNum = sqrt($displayNum);
            break;

        case '+/-': //符号反転
            $displayNum = -$displayNum;
            break;
            default:

        //すでに数字ボタンが押されており、次に押すボタンが記号ボタンまたは"="の場合
        if(!empty($pre_num)&&(preg_match('/=/', $button)||(isNumBtn($pre_button)&&isSymBtn($button)))){
            switch($ope){
                case '+': //加算
                    $displayNum = $pre_num + $displayNum;
                    break;
                case '-': //減算
                    $displayNum = $pre_num - $displayNum;
                    break;
                case '×': //乗算
                    $displayNum = $pre_num * $displayNum;
                    break;
                case '÷': //除算
                    $displayNum = $pre_num / $displayNum;
                    break;
                    default:
                    break;
            }
            //CE(クリアエントリー)：現在の入力されている数値だけをクリアし、計算式には影響を与えない
            if($button == "CE"){
                $displayNum = $pre_num; //入力されていた数値をクリア
                $ope = ''; //演算子をクリアする
                $pre_button = $pre_num; //直前のボタン($pre_num)を格納
                break;
            }
        }
        //"="以外の記号ボタンを押した場合$opeに保存
        if ($button != '＝'){
            $ope = $button;  
        }      
    break;
    }
}
//押したボタンの数字を表示
$pre_button = $button;

//関数を定義
//記号ボタンの判別に関する関数。記号ボタンを押されたときにtrueを返す
function isSymBtn($btn){
    if($btn=='MC'||$btn=='MR'||$btn=='M+'||$btn=='M-'||$btn=='MS'||$btn=='%'||$btn=='CE'
    ||$btn=='C'||$btn=='1/x'||$btn=='x^2'||$btn=='2√x'||$btn=='÷'||$btn=='×'||$btn=='-'
    ||$btn=='+'||$btn=='+/-'||$btn=='.'||$btn=='='){
        return true;
    }else{
        return false;
    }
}

//数字ボタンの判別に関する関数。数字ボタンを押されたときにtrueを返す
function isNumBtn($btn){
    if($btn=='0'||$btn=='1'||$btn=='2'||$btn=='3'||$btn=='4'||$btn=='5'||$btn=='6'
    ||$btn=='7'||$btn=='8'||$btn=='9'){
        return true;
    }else{
        return false;
    }
}

?>