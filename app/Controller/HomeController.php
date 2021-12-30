<?php

namespace Alialbair\BelajarPhpMvc\Controller;

use Alialbair\BelajarPhpMvc\App\View;

class HomeController
{
    
    function index():void
    {
        //syntax dibawah ini $model adalah contoh aja bahwa ini model menggunakan array, *seharusnya buat folder model tersendiri
        $model = [
            "title" => "Belajar PHP MVC",
            "content" => "Selamat Belajar PHP MVC dari Programmer Zaman Now"
        ];
        
        // require __DIR__ . '/../View/Home/index.php'; bisa memanggil memakai ini atau membuat function render View di App
        
        View::render('Home/index', $model);
    }

    function hello():void
    {
        echo "Home Controller.hello()";
    }

    function world():void
    {
        echo "Home Controller.world()";
    }

    function about():void
    {
        echo "Author, Muhammad Ali Albair";
    }
    
    function login():void{
        //syntax dibawah ini adalah contoh aja bahwa ini model menggunakan array, *seharusnya buat folder model tersendiri 
        $request = [
            "username" => $_POST['username'],
            "password" => $_POST['passwprd']
        ];

        $user = [

        ];

        $response = [
            "message" => "Login Success"
        ];
        //kirimkan response ke view
    }
}

?>