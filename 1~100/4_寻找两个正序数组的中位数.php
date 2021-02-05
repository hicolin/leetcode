<?php

class Solution
{
    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2)
    {
        $nums = array_merge($nums1, $nums2);
        sort($nums);
        $len = count($nums);

        if ($len % 2 == 1) { // 奇数
            $mid_key = ($len - 1) / 2;
            $mid = $nums[$mid_key];
        } else { // 偶数
            $mid_next = $len / 2;
            $mid_prev = $mid_next - 1;
            $mid = ($nums[$mid_prev] + $nums[$mid_next]) / 2;
        }

        return $mid;
    }

}