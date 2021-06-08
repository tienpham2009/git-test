<?php

abstract class abc
{
    protected string $name = "khai";
   abstract protected function zyx();
}

class khoi extends abc
{
    protected function zyx()
    {
        echo $this->name;
    }
}








