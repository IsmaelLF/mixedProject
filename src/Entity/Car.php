<?php 
namespace App\Entity;

class Car{

    public function __construct(private int $id, private string $description)
    {
        
    }

    public function __toString()
    {
        return 'ID: ' . $this->id . ' ' . 'Description: ' . $this->description . '.';
    }
}