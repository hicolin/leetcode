<?php

class Solution
{
    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s)
    {
        $len = strlen($s);
        $max = 0;
        $i = $j = 0;
        $map = [];

        while ($i < $len && $j < $len) {
            if (array_key_exists($s[$j], $map)) {
                $i = max($map[$s[$j]] + 1, $i);
            }

            $map[$s[$j]] = $j;
            $max = max($max, $j - $i + 1);
            $j++;
        }

        return $max;
    }

}