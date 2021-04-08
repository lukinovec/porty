<?php
namespace App\Http\Entities;

interface MediaInterface {
    public function findMany(string $query);
    public function find(string $query);
    public function format();
}