<?php

namespace Hackathon\LevelC;

class RotationString
{
    /**
     * @TODO ! BAM
     *
     * @param $s1
     * @param $s2
     *
     * @return bool|int
     */
    public static function isRotation($s1, $s2)
    {
        $temp = array();
        if (strlen($s1) != strlen($s2)) {
            return false;
        }
        for ($i = strlen($s2); $i > 0; $i--)  {
            $tmp = RotationString::shiftString($s1, $i - 1);
            array_push($temp, $tmp);
        }
        if (in_array($s2, $temp))
            return true;
        return false;
    }

    public static function shiftString($s1, $len)
    {
        $len = $len % strlen($s1);
        return substr($s1, $len) . substr($s1, 0, $len);
    }

    public static function isSubString($s1, $s2)
    {
        $pos = strpos($s1, $s2);

        return $pos;
    }
}
