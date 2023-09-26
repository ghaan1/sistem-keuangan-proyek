<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRolePekerjaRequest;
use App\Http\Requests\UpdateRolePekerjaRequest;
use App\Models\RolePekerja;
use Illuminate\Support\Facades\DB;

class RolePekerjaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:role-pekerja.index')->only('index');
        $this->middleware('permission:role-pekerja.create')->only('create', 'store');
        $this->middleware('permission:role-pekerja.edit')->only('edit', 'update');
        $this->middleware('permission:role-pekerja.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rolePekerja = DB::table('role_pekerja')
            // ->when($request->input('airminum_komponen'), function ($query, $airMinumKomponenSearch) {
            //     return $query->where('airminum_komponen', 'like', '%' . $airMinumKomponenSearch . '%');
            // })
            ->paginate(10);
        return view('pekerja.role-pekerja.index')->with([
            'rolePekerja' => $rolePekerja,
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
     * @param  \App\Http\Requests\StoreRolePekerjaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRolePekerjaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RolePekerja  $rolePekerja
     * @return \Illuminate\Http\Response
     */
    public function show(RolePekerja $rolePekerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RolePekerja  $rolePekerja
     * @return \Illuminate\Http\Response
     */
    public function edit(RolePekerja $rolePekerja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRolePekerjaRequest  $request
     * @param  \App\Models\RolePekerja  $rolePekerja
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRolePekerjaRequest $request, RolePekerja $rolePekerja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RolePekerja  $rolePekerja
     * @return \Illuminate\Http\Response
     */
    public function destroy(RolePekerja $rolePekerja)
    {
        //
    }
}
