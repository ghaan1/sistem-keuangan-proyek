<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSaldoRequest;
use App\Http\Requests\UpdateSaldoRequest;
use App\Models\Saldo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SaldoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreSaldoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSaldoRequest $request)
    {
        $project_id = $request->input('project_id');
        $saldo_type = $request->input('saldo_type');
        $amount = $request->input('amount');
        $keterangan = $request->input('keterangan');

        $saldo = Saldo::where('project_id', $project_id)->first();

        if (!$saldo) {
            $saldo = new Saldo();
            $saldo->project_id = $project_id;
            $saldo->keterangan = $keterangan;
        }
        $timezone = 'Asia/Jakarta';

        $historyEntry = [
            'id' => $this->generateNextHistoryId($saldo),
            'saldo_type' => $saldo_type,
            'amount' => $amount,
            'created_at' => Carbon::now($timezone)->format('Y-m-d H:i:s')
        ];

        $history = json_decode($saldo->history, true) ?: [];
        $history[] = $historyEntry;
        $saldo->history = json_encode($history);

        if ($saldo_type === 'saldo_project') {
            $saldo->saldo_project += $amount;
        } elseif ($saldo_type === 'piutang_pengusaha') {
            $saldo->piutang_pengusaha += $amount;
        }

        $saldo->save();

        return redirect()->back()->with('success', 'Saldo added successfully.');
    }

    private function generateNextHistoryId($saldo)
    {
        $history = json_decode($saldo->history, true) ?: [];
        $maxId = 0;
        foreach ($history as $entry) {
            $maxId = max($maxId, $entry['id']);
        }

        return $maxId + 1;
    }






    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Saldo  $saldo
     * @return \Illuminate\Http\Response
     */
    public function show(Saldo $saldo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Saldo  $saldo
     * @return \Illuminate\Http\Response
     */
    public function edit(Saldo $saldo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSaldoRequest  $request
     * @param  \App\Models\Saldo  $saldo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSaldoRequest $request, Saldo $saldo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Saldo  $saldo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Saldo $saldo)
    {
        //
    }
}
