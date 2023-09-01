<?php

class EntityFactory
{
    public static function create ($type)
    {
        if ($type=="Autor")
        {
            return new Autor();
        }
        else if ($type=="Knjiga")
        {
            return new Knjiga();
        }
    }
}

?>