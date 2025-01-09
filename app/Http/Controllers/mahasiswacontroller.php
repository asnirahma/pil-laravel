<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session; // Tambahkan ini

class mahasiswacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Halaman Home mahasiswa
        return view('mahasiswa.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * \Illuminate\Http\Response
     */
    public function create()
    {
        // Halaman Tambahan Mahasiswa
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     *  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Simpan tambah mahasiswa
        Session::flash('nim', $request->nim);
        Session::flash('nama_mahasiswa', $request->nama_mahasiswa);
        Session::flash('jk', $request->jk);
        Session::flash('tanggal_lahir', $request->tanggal_lahir);
        Session::flash('alamat', $request->alamat);

        // Validasi input
        $request->validate(
            [
                'nim' => 'required|numeric|unique:mahasiswa,NIM', // Pastikan NIM tidak kosong dan unik
                'nama_mahasiswa' => 'required', // Konsisten dengan nama field di database
                'jk' => 'required', // Validasi jenis kelamin, pastikan hanya 'P' atau 'L'
                'tanggal_lahir' => 'required', // Pastikan dalam format tanggal
                'alamat' => 'required', // Batas karakter alamat
            ],
            [
                'nim.required' => 'NIM tidak boleh kosong!',
                'nim.numeric' => 'NIM harus diisi dalam bentuk angka!',
                'nim.unique' => 'NIM sudah ada sebelumnya!',
                'nama_mahasiswa.required' => 'Nama Mahasiswa tidak boleh kosong!',
                'nama_mahasiswa.string' => 'Nama Mahasiswa harus berupa string!',
                'jk.required' => 'Jenis Kelamin tidak boleh kosong!',
                'jk.in' => 'Jenis Kelamin tidak boleh kosong!',
                'tanggal_lahir.required' => 'Tanggal Lahir tidak boleh kosong!',
                'tanggal_lahir.date' => 'Tanggal Lahir harus dalam format tanggal yang benar!',
                'alamat.required' => 'Alamat tidak boleh kosong!',
                'alamat.max' => 'Alamat tidak boleh lebih dari 255 karakter!',
            ]
        );

        // Siapkan data untuk disimpan
        $data = [
            'nim' => $request->nim,
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'jk' => $request->jk,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
        ];

        // Simpan data ke database
        mahasiswa::create($data);

        // Redirect ke halaman mahasiswa dengan pesan sukses
        return redirect('/mahasiswa')->with('success', 'Data Berhasil ditambahkan!');
    }


    /**
     * Display the specified resource.
     *
     *  \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Fungsi untuk menampilkan detail mahasiswa berdasarkan ID
    }

    /**
     * Show the form for editing the specified resource.
     *
     *  \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Fungsi untuk mengedit data mahasiswa
    }

    /**
     * Update the specified resource in storage.
     *
     *  \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Fungsi untuk memperbarui data mahasiswa
    }

    /**
     * Remove the specified resource from storage.
     *
     *\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Fungsi untuk menghapus data mahasiswa
    }
}
