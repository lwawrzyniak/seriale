<?php

Class Seriale
{
    var $uchwyt;
    
    function __construct($dbhost, $dbuser, $dbhaslo, $dbnazwa) 
    {
       $this -> uchwyt = mysqli_connect($dbhost, $dbuser, $dbhaslo, $dbnazwa) or die ("blad polaczenia");
    }
    
    function dodaj($serial)
    {
        $var = $serial;
        $q = 'Insert Into `lista_seriali`(`nazwa_serialu`) Values("'.mysqli_real_escape_string($this->uchwyt, $serial).'");';
        $result = mysqli_query($this->uchwyt, $q);
    }
    
    function usun($id)
    {
        $q = 'DELETE FROM `lista_seriali` WHERE id='.intval($id);
        $result = mysqli_query($this->uchwyt, $q);
    }
    
    function przenies($id)
    {
        
    }
    
    function wyswietl()
    {
        $q = 'SELECT * FROM `lista_seriali` ORDER BY nazwa_serialu';
        $result = mysqli_query($this->uchwyt, $q);
        while ($ser = mysqli_fetch_assoc($result))
        {
            $lista[] = $ser;
        }
        return($lista);
    }
    
    function update($sezon, $id)
    {
        $q = 'UPDATE `lista_seriali` SET `sezon`='.intval($sezon).' WHERE id='.intval($id);
       // $q = 'UPDATE `lista_seriali` SET `sezon`='.intval($sezon).'WHERE id='.intval($id);
        $result = mysqli_query($this->uchwyt, $q); 
    }
}

