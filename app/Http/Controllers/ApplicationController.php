<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

/**
 * @group Main app endpoint
 */
class ApplicationController extends Controller
{
    public function index()
    {
        return '{"message": "Unauthenticated."}';
    }
}
