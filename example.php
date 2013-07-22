<?php

include('src/Malenki/IterList.php');

$v = new Malenki\IterList();

if($v->void())
{
    printf("This list is empty!\n");
}

$v->add('something');

if($v->hasOnlyOne())
{
    printf("This list has only one element: \"%s\"\n", $v->current());
}

$l = new Malenki\IterList(array('one', 'two', 'three', 'four', 'five'));

printf("This new list has %d items.\n", count($l));

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

