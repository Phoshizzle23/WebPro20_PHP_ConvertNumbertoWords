<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convert Numbers</title>
</head>
<body>
    <h1>Convert numbers into words</h1>
    <?php
    function numberToWords($num) {
        $arr = array(
            1 => "one",
            2 => "two",
            3 => "three",
            4 => "four",
            5 => "five",
            6 => "six",
            7 => "seven",
            8 => "eight",
            9 => "nine",
            10 => "ten",
            11 => "eleven",
            12 => "twelve",
            13 => "thirteen",
            14 => "fourteen",
            15 => "fifteen",
            16 => "sixteen",
            17 => "seventeen",
            18 => "eighteen",
            19 => "nineteen",
        );

        $t = array(
            2 => "twenty",
            3 => "thirty",
            4 => "forty",
            5 => "fifty",
            6 => "sixty",
            7 => "seventy",
            8 => "eighty",
            9 => "ninety"
        );

        $hundreds = array(
            "hundred",
            "thousand",
            "million",
            "billion",
            "trillion",
            "quadrillion"
        );

        $num = number_format($num, 2, ".", ",");
        $num_array = explode(".", $num);
        $whole_num = $num_array[0];
        $dec_num = $num_array[1];
        $whole_array = array_reverse(explode(",", $whole_num));
        krsort($whole_array);
        $ret_text = "";

        foreach ($whole_array as $key => $i) {
            if ($i < 20) {
                $ret_text .= $arr[$i];
            } elseif ($i < 100) {
                $ret_text .= $t[substr($i, 0, 1)];
                $ret_text .= "" . $arr[substr($i, 1, 1)];
            } else {
                $ret_text .= $arr[substr($i, 0, 1)] . "" . $hundreds[0];
                $ret_text .= "" . $t[substr($i, 1, 1)];
                $ret_text .= "" . $arr[substr($i, 2, 1)];
            }
            if ($key > 0) {
                $ret_text .= "" . $hundreds[$key] . "";
            }
        }
        if ($dec_num > 0) {
            $ret_text .= " and";
            if ($dec_num < 20) {
                $ret_text .= $arr[$dec_num];
            } elseif ($dec_num < 100) {
                $ret_text .= $t[substr($dec_num, 0, 1)];
                $ret_text .= "" . $arr[substr($dec_num, 1, 1)];
            }
        }

        return $ret_text;
    }

    if (isset($_POST['convert'])) {
        echo "<p align='center' style='color:green'>" . numberToWords($_POST['num']) . "</p>";
    }
    ?>

    <form method="post">
        <table border="1" align="center">
            <tr>
                <td>Enter your number</td>
                <td><input type="text" name="num" value="<?php if(isset($_POST['num'])) {echo $_POST['num'];}?>"></td>
            </tr>
            <td colspan="2" align="center">
                <input type="submit" value="Convert Number to String" name="convert" />
            </td>
        </table>
    </form>
</body>
</html>
