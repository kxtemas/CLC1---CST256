<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileControler
{
    /**
     * Reference code from Actitvy 2 (to be removed)
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index(Request $request)
    {
        // Usage of path method
        $path = $request->path();
        echo 'Path Method:' . $path;
        echo '<br>';
        
        // Usage of is method
        $method = $request->isMethod('get') ? "GET" : "POST";
        echo 'GET or POST Method: '.$method;
        echo '<br>';
        
        $firstName = $request->input('firstname');
        $lastName = $request->input('lastname');
        echo "Your name is: " . $firstName . " " . $lastName;
        echo '<br>';
        
        // Usage of url method
        $url = $request->url();
        echo 'URL method: '.$url;
        echo '<br>';
        
        $data = ['firstName' => $firstName, 'lastName' => $lastName];
        return view('thatswhoami')->with($data);
        
        
    }
}

