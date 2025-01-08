<?php
interface CrudInterface{
    public function addObject(): void;
    // public function deleteObject(): void;
    // public function updateObject(): void;
    // public function getAllObjects() : array;
    // public function getOneObject(): object;
    public function loadObjects(): void;
}
?>