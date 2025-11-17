<?php

namespace Hp\Projet\models;

class User
{
    public $name, $id;

    function __construct($name, $id)
    {
        $this->name = $name;
        $this->id = $id;
    }
}
