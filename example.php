<?php

include('src/Malenki/IterList.php');

$l = new Malenki\IterList(array('one', 'two', 'three', 'four', 'five'));

while($l->valid())
{
    if($l->first())
    {
        printf("First item: %s\n", $l->current());
    }
    elseif($l->lastButOne())
    {
        printf("Last but one item: %s\n", $l->current());
    }
    elseif($l->last()) 
    {
        printf("Last item: %s\n", $l->current());
    }
    else
    {
        printf("nth item: %s\n", $l->current());
    }

    $l->next();
}

