<?php
namespace App\Interaface\Human;

interface IndexInterface {

    public function getAll($limit,$page,$modulus,$filters);
}