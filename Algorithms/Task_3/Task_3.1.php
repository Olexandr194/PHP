<?php
function check($s)
{
    $para = array(
        '(' => ')',
        '[' => ']',
        '{' => '}',
        '<' => '>',
        '/' => '/',
        '|' => '|',
        '"' => '"'
    );
    $stack='';
    for($i=0; $i<strlen($s); $i++)
    {
        $test = ( in_array(substr($s,$i,1), array_keys($para)) ) ||
            ( in_array(substr($s,$i,1), $para) );
        if ($test)
            $stack .= $s[$i];
    }
    $len = strlen($stack)/2;
    for($i=0;$i<$len;$i++)
    {
        foreach($para as $k=>$v)
            $stack = str_replace($k.$v, '', $stack);
    }
    return (strlen($stack)==0);
}


$s = '{z(/x/(ka"z"ak)x)z}';

echo $s,': ',check($s)?"TRUE":"FALSE","\n";