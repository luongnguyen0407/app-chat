<?php
class Test extends Controller
{
    function fest()
    {
        $test = [2, 4, 5, 12, 'y'];
        // PrintDisplay::printFix($test);
        $max = 0;
        $second = 0;
        define('TESS', 10);
        for ($i = 0; $i < count($test); $i++) {
            global $max;
            global $second;
            if (!is_numeric($test[$i])) continue;
            if ($test[$i] > $max) {
                $second = $max;
                $max = $test[$i];
            }
            if ($test[$i] < $max && $test[$i] > $second) {
                $second = $test[$i];
            }
        }
        echo $max;
    }
}
