<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\JadwalPraktik;
use App\Models\Pengguna;
use Illuminate\Container\Attributes\Auth;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function data()
    {
        $data = Dokter::with('pengguna')->get();
        return view('Data.dataDokter', compact('data'));
    }

    public function index()
    {

    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Dokter::with('jadwalPraktik')->findOrFail($id);
        return view('Data.detailDokter', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
