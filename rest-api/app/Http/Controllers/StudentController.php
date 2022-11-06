<?php

namespace App\Http\Controllers;
use App\Models\Student;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        # menggunakan model Student untuk select data
        $students = Student::all();

        $data = [
            'message' => 'Get all students',
            'data' => $students,
        ];
    return response()->json($data,200);
    }
    # menambahkan resource student
    # membuat method store
    public function store(Request $request)
    {
        # menangkap data request
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan,
        ];

        # menggunakan Student untuk insert data
        $student = Student::create($input);

        $data = [
            'message' => 'Student is created successfully',
            'data' => $student,
        ];

        # mengembalikan data (json) status code 201
        return response()->json($data, 201);
    }
    public function update(Request $request, $id){
        $student1 = Student::find ($id);
        $student1->update([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan,
            'updated_at' => now()
        ]);
        $data = [
            'message' => 'Data berhasil diubah' .$id,
            'data' => $student1
        ];
        return response()->json($data, 200);
    }
    public function delete($id){
        $student2 = Student::destroy($id);
        $data = [
            'message' => 'Data Berhasil dihapus' .$id,
            'jumlah data yang terhapus' =>$student2
        ];
        return response()->json($data, 200);
    }
}