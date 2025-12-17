<?php 
namespace App\Http\Controllers;

class Test {
    public string $name;
    public string $last_name;

    public function __construct($name, $last_name)
    {
        $this->name = $name;
        $this->last_name = $last_name;
    }

    public function getLikeEne2(){
        return "no soy static";
    }

    public static function all(){
        return Test::class;
    }

} 