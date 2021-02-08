<?php

class Solution
{
    /**
     * @param String $s
     * @return String
     */
    function longestPalindrome($s)
    {
        $t = $this->malache($s);

        $n = strlen($t);
        $c = $r = 0;
        $p = [];

        for ($i = 0; $i < $n - 1; $i++) {
            $i_mirror = $c * 2 - $i;

            if ($r > $i) {
                $p[$i] = min($r - $i, $p[$i_mirror]);
            } else {
                $p[$i] = 0;
            }

            while (($t[$i - 1 - $p[$i]]) == ($t[$i + 1 + $p[$i]])) {
                $p[$i]++;
            }

            if ($i + $p[$i] > $r) {
                $c = $i;
                $r = $i + $p[$i];
            }
        }

        $max_len = 0;
        $center_index = 0;

        for ($i = 1; $i < $n - 1; $i++) {
            if ($p[$i] > $max_len) {
                $max_len = $p[$i];
                $center_index = $i;
            }
        }

        $start = ($center_index - $max_len) / 2;
        return substr($s, $start, $max_len);
    }

    function malache($str)
    {
        $len = strlen($str);

        if (!$str) {
            return "^$";
        }

        $ret = '^';

        for ($i = 0; $i < $len; $i++) {
            $ret .= '#' . $str[$i];
        }

        $ret .= "#$";

        return $ret;
    }

}
