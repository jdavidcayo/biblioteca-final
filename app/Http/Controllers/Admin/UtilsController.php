<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class UtilsController extends Controller
{
    public function generateRandomPassword()
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789$%';
        $password = '';
        
        for ($i = 0; $i < 12; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $password .= $characters[$index];
        }
        
        return response()->json(['password' => $password]);
    }

    
}
    

