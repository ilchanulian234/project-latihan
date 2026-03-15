<?php

namespace App\Controllers;

class Profil extends BaseController
{
    public function index()
    {
        $data = [
            'nama'   => 'Ian', 
            'status' => 'Web Developer',
            'roles'  => [
                'BE Developer', 
                'FE Developer', 
                'Cyber Security', 
                'AI Engineer', 
                'Data Science'
            ],
            'skill'  => [
                'Python',
                'JavaScript',
                'HTML',
                'CSS',
                'Node',
                'Kotlin'
            ]
        ];

        return view('halaman_profil', $data);
    }
}