<?php
namespace App\Http\Entities;

interface UserInterface {
    function findMedia(string $endpoint);
}