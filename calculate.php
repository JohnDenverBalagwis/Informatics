<?php
    function average(...$numbers) {
        $total = 0;

        foreach($numbers as $number) {
            $total += $number;
        }
        
        return round($total);
    }


?>