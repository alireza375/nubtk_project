<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CsvController extends Controller
{
    public function index(){
        $users = [];
        if(($open = fopen(storage_path()."/sample.csv", "r")) !== FALSE){
            while(($data = fgetcsv($open,  0, ",")) !== FALSE){
                $users[] = $data;

                // $name = $data[0];
                // $email = $data[1];
                // $phone = $data[2];
                // $users[] = $data;
                // array_push($users, $data);
            }
            fclose($open);
        }
        echo "<pre>";
        print_r($users);
    }
}
