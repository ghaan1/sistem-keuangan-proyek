<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use App\Imports\BarangsImport;
use App\Models\Barang;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BarangController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:barang.index')->only('index');
        $this->middleware('permission:barang.create')->only('create', 'store');
        $this->middleware('permission:barang.edit')->only('edit', 'update');
        $this->middleware('permission:barang.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::paginate(5);
        return view('barang.index')->with([
            'barang' => $barang
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBarangRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBarangRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBarangRequest  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBarangRequest $request, Barang $barang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        //
    }

    public function import(Request $request)
    {
        Excel::import(new BarangsImport, $request->file('import-file')->store('import-files'));
        return redirect()->route('barang.index')->with('success', 'Tambahkan Data Barang Sukses diimport');
    }
}
