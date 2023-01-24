<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends model
{
    public static function all(){
        return [
            [
                'id' =>  1,
                'image' => 'icon.png'
            ],
            [
                'id' =>  2,
                'image' => 'icon2.png'
            ],
            [
                'id' =>  3,
                'image' => 'icon3.png'
            ],
            [
                'id' =>  4,
                'image' => 'icon4.png'
            ],
            [
                'id' =>  5,
                'image' => 'icon5.png'
            ],
        ];
    }
}