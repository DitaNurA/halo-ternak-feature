<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class PostinganTernak extends BaseController
{
    public function index()
    {
        return view('admin/posternak/posternak', [
            'list_posternak' => view('admin/posternak/list_posternak'), 
        ]);
    }


    public function detail()
    {
        // Method to handle showing details of a specific petugas
   // Pass the ID to the view if needed
        return view('admin/posternak/detail_posternak', [
            'show_detailternak' => view('admin/posternak/show_detailternak'), 
        ]);
    }
}
