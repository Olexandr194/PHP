<?php

function check($s)
{
    $para = array(
        '(' => ')',
        '[' => ']',
        '{' => '}',
        '<' => '>'
    );
    $para = array_flip($para);
    $stack = array();
    $stack_size = 0;
    for($i=0;$i<strlen($s);$i++)
    {
        if (in_array($s[$i],array_values($para)))
            $stack[$stack_size++] = $s[$i];
        else if (in_array($s[$i],array_keys($para)))
        {
            $last = $stack_size? $stack[$stack_size-1] : '';
            if ($last!=$para[$s[$i]])
                return false;
            else
                unset($stack[--$stack_size]);
        }
    }
    return count($stack)==0;
}


$s = "(test[test{test}]test))";

print check($s)?"TRUE\n":"FALSE\n";
