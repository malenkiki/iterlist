<?php

namespace Malenki;

class IterList implements Iterator, Countable, ArrayAccess
{
    private $int_position = 0;

    private $int_count = 0;

    private $arr_items = array();



    public function __construct($arr = null)
    {
        $this->int_position = 0;

        if(is_array($arr))
        {
            $this->arr_items = $arr;
            $this->int_count = count($this->arr_items);
        }
    }



    public function rewind()
    {
        $this->int_position = 0;
    }



    public function current()
    {
        return $this->arr_items[$this->int_position];
    }



    public function key()
    {
        return $this->int_position;
    }



    public function next()
    {
        ++$this->int_position;
    }



    public function valid()
    {
        return isset($this->arr_items[$this->int_position]);
    }



    public function count()
    {
        return $this->int_count;
    }



    public function getArrayCopy()
    {
        return $this->arr_items;
    }



    public function offsetSet($offset, $value)
    {
        if (is_null($offset))
        {
            $this->arr_items[] = $value;
        }
        else
        {
            $this->arr_items[$offset] = $value;
        }
    }



    public function offsetExists($offset)
    {
        return isset($this->arr_items[$offset]);
    }



    public function offsetUnset($offset)
    {
        unset($this->arr_items[$offset]);
    }



    public function offsetGet($offset)
    {
        return isset($this->arr_items[$offset]) ? $this->arr_items[$offset] : null;
    }



    public function add($item)
    {
        $this->arr_items[] = $item;
        $this->int_count = count($this->arr_items);
    }



    public function first()
    {
        return $this->int_position == 0;
    }



    public function lastButOne()
    {
        if($this->count() > 1)
        {
            return $this->int_position == $this->count() - 2;
        }

        return false;
    }



    public function void()
    {
        return $this->count() == 0;
    }



    public function hasOnlyOne()
    {
        return $this->count() == 1;
    }



    public function last()
    {
        return $this->int_position == $this->count() - 1;
    }
}

