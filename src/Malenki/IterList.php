<?php
/*
 * Copyright (c) 2013 Michel Petit <petit.michel@gmail.com>
 * 
 * Permission is hereby granted, free of charge, to any person obtaining
 * a copy of this software and associated documentation files (the
 * "Software"), to deal in the Software without restriction, including
 * without limitation the rights to use, copy, modify, merge, publish,
 * distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to
 * the following conditions:
 * 
 * The above copyright notice and this permission notice shall be
 * included in all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
 * LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
 * OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
 * WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */


namespace Malenki;

/**
 * Simple little class to have iterated list with first, last but one, last, 
 * void features.
 *
 * @author Michel Petit <petit.michel@gmail.com> 
 */
class IterList implements \Iterator, \Countable, \ArrayAccess
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



    /**
     * Add new item into the list.
     *
     * @param mixed $item
     * @return null
     */
    public function add($item)
    {
        $this->arr_items[] = $item;
        $this->int_count = count($this->arr_items);
    }



    /**
     * Into loop, this method checks if the current item is the first.
     *
     * @return boolean
     */
    public function first()
    {
        return $this->int_position == 0;
    }



    /**
     * Into loop, this method checks if the current item is last but one.
     *
     * If current list has only one item, this method returns False.
     *
     * @return boolean
     */
    public function lastButOne()
    {
        if($this->count() > 1)
        {
            return $this->int_position == $this->count() - 2;
        }

        return false;
    }



    /**
     * Is the list void?
     *
     * @return boolean
     */
    public function void()
    {
        return $this->count() == 0;
    }



    /**
     * True if the list has only one element.
     *
     * @return boolean
     */
    public function hasOnlyOne()
    {
        return $this->count() == 1;
    }



    /**
     * In a loop context, checks if the current element is the last of the list.
     *
     * @return boolean
     */
    public function last()
    {
        return $this->int_position == $this->count() - 1;
    }
}

