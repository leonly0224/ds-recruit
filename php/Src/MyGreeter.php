<?php

namespace Src;

use Carbon\Carbon;

class MyGreeter
{

    /**
     * 返回问候语（根据当前时间）
     * 当运行时间在6AM至12AM之间时，返回 "Good morning"。
     * 当运行时间在12AM至6PM之间时，返回 "Good afternoon"。
     * 当运行时间在6PM至第二天6AM之间时，返回 "Good evening"。
     * @return string
     */
    public function greeting(): string
    {
        # 仅与当天小时数有关
        # [~, 5] evening
        # [6, 11] morning
        # [12, 17] afternoon
        # [18, ~] evening
        $_currentHour = Carbon::now()->format("H");
        # 从小到大 依次判断 hour 的最大值即可
        if ($_currentHour <= 5) {
            return "Good evening";
        } elseif ($_currentHour <= 11) {
            return "Good morning";
        } elseif ($_currentHour <= 17) {
            return "Good afternoon";
        } else {
            return "Good evening";
        }
    }

}