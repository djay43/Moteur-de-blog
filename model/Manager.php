<?php 
class Manager {


	public static function base_connect(){

             $bdd = new PDO('mysql:host=localhost;dbname=base_alaska;charset=utf8', 'root', '');
             return $bdd;            
    }
}