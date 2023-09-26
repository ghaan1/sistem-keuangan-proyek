<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePekerjaRequest;
use App\Http\Requests\UpdatePekerjaRequest;
use App\Models\Pekerja;
use Illuminate\Support\Facades\DB;

class PekerjaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:pekerja.index')->only('index');
        $this->middleware('permission:pekerja.create')->only('create', 'store');
        $this->middleware('permission:pekerja.edit')->only('edit', 'update');
        $this->middleware('permission:pekerja.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pekerja = DB::table('pekerja')
            ->select('pekerja.id', 'pekerja.name', 'role_pekerja.name as name_role')
            ->leftJoin('role_pekerja', 'pekerja.role_pekerja_id', 'role_pekerja.id')
            // ->when($request->input('airminum_komponen'), function ($query, $airMinumKomponenSearch) {
            //     return $query->where('airminum_komponen', 'like', '%' . $airMinumKomponenSearch . '%');
            // })
            ->paginate(10);
        return view('pekerja.pekerja.index')->with([
            'pekerja' => $pekerja,
            // 'airMinumKomponenSearch' => $airMinumKomponenSearch,

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
     * @param  \App\Http\Requests\StorePekerjaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePekerjaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pekerja  $pekerja
     * @return \Illuminate\Http\Response
     */
    public function show(Pekerja $pekerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pekerja  $pekerja
     * @return \Illuminate\Http\Response
     */
    public function edit(Pekerja $pekerja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePekerjaRequest  $request
     * @param  \App\Models\Pekerja  $pekerja
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePekerjaRequest $request, Pekerja $pekerja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pekerja  $pekerja
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pekerja $pekerja)
    {
        //
    }
}
