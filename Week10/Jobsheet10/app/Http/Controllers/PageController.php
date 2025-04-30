<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
	public function index() 
    {
        return 'Selamat Datang';
    }
    public function about() 
    {
        return 'NIM: 2341760008<br> Nama: Claudya Destine Julia Handoko';
    }
    public function articles($id)
    {
        return 'Halaman Artikel dengan ID ' . $id;
    }

}