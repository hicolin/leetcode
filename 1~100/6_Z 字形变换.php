<?php

class Solution
{
    /**
     * @param String $s
     * @param Integer $numRows
     * @return String
     */
    function convert($s, $numRows)
    {
        $len = strlen($s);
        if ($len <= $numRows || $numRows <= 1) {
            return $s;
        }

        $arr = [];
        $line = 1;
        $add = true;

        for ($i = 0; $i < $len; $i++) {
            $arr[$line][] = $s[$i];

            if ($line == 1) {
                $add = true;
            } elseif ($line == $numRows) {
                $add = false;
            }

            if ($add) {
                $line++;
            } else {
                $line--;
            }
        }

        $res = '';
        for ($m = 0; $m < $numRows; $m++) {
            $res .= implode('', $arr[$m + 1]);
        }

        return $res;
    }

}