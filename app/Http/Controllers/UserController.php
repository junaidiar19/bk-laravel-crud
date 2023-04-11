<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $name = 'Junaidi';
        $job = 'Full Stack Developer';
        $hobbies = ['Olahraga', 'Travelling', 'Coding'];
        
        return view('users.index', compact('name', 'job', 'hobbies'));
    }

    public function create()
    {
        // Menampilkan form create user
    }

    public function store(Request $request)
    {
        // Proses menyimpan data user
    }

    public function edit($id)
    {
        // Menampilkan form edit user
    }

    public function update(Request $request, $id)
    {
        // Proses update data user
    }

    public function delete($id)
    {
        // proses menghapus data user dari database
    }
}
