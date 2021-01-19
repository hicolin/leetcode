<?php

/**
 * Definition for a singly-linked list.
 */
class ListNode
{
    public $val = 0;
    public $next = null;

    function __construct($val = 0, $next = null)
    {
        $this->val = $val;
        $this->next = $next;
    }
}

class Solution
{
    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2)
    {

        $pre = new ListNode(0);
        $cur = $pre;
        $carry = 0;

        while ($l1 != null || $l2 != null) {
            $x = $l1 == null ? 0 : $l1->val;
            $y = $l2 == null ? 0 : $l2->val;

            $sum = $x + $y + $carry;
            $carry = intval($sum / 10);
            $sum = $sum % 10;

            $cur->next = new ListNode($sum);
            $cur = $cur->next;

            if ($l1 != null) {
                $l1 = $l1->next;
            }
            if ($l2 != null) {
                $l2 = $l2->next;
            }
        }

        if ($carry == 1) {
            $cur->next = new ListNode($carry);
        }

        return $pre->next;
    }

}