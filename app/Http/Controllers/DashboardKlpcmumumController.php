<?php

namespace App\Http\Controllers;

use App\Models\Dpjp;
use App\Models\klpcm;
use App\Models\Doktor;
use GuzzleHttp\Psr7\Query;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class DashboardKlpcmumumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('dashboard.klpcmumums.index', [
            'klpcms' => klpcm::with(['dpjp'])->where('cara_bayar','umum')->latest()->filter(request(['search','dpjp_id']))->paginate(10)->withQueryString(),
            'dpjps' => Dpjp::all(),
            'dpjp_id' => request('dpjp_id')
        ]);
    }
    public function cetak()
    {

        return view('dashboard.klpcmumums.cetak', [
            'klpcms' => klpcm::with(['dpjp'])->where('cara_bayar','umum')->latest()->filter(request(['search','dpjp_id']))->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.klpcmumums.create', [
            'dpjps' => Dpjp::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cara_bayar' => 'required|max:255',
            'pasien' => 'required|max:255',
            'no_rm' => 'required|max:255',
            'umur' => 'required|max:10',
            'kelamin' => 'required|max:20',
            'tgl_masuk' => 'required|max:255',
            'tgl_keluar' => 'required|max:255',
            'rm3' => 'required|max:255',
            'rm4' => 'required|max:255',
            'rm8a' => 'required|max:255',
            'rm8b' => 'required|max:255',
            'rm9a' => 'required|max:255',
            'rm9b' => 'required|max:255',
            'rm9c' => 'required|max:255',
            'rm9d' => 'required|max:255',
            'rm9e' => 'required|max:255',
            'rm9f' => 'required|max:255',
            'rm9g' => 'required|max:255',
            'rm9h' => 'required|max:255',
            'rm9l' => 'required|max:255',
            'rm15a' => 'required|max:255',
            'diagnosa' => 'required|max:255',
            'tindakan' => 'required|max:255',
            'dpjp_id' => 'required|max:255',
            'cara_keluar' => 'required|max:255',
        ]);

        Klpcm::create($validatedData);

        return redirect('/dashboard/klpcmumums')->with('success', 'new added success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\klpcm  $klpcm
     * @return \Illuminate\Http\Response
     */
    public function show(klpcm $klpcm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\klpcm  $klpcm
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.klpcmumums.edit', [
            'klpcm' => klpcm::findOrfail($id),
            'dpjps' => Dpjp::all(), 
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\klpcm  $klpcm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'cara_bayar' => 'required|max:255',
            'pasien' => 'required|max:255',
            'no_rm' => 'required|max:255',
            'umur' => 'required|max:10',
            'kelamin' => 'required|max:20',
            'tgl_masuk' => 'required|max:255',
            'tgl_keluar' => 'required|max:255',
            'rm3' => 'required|max:255',
            'rm4' => 'required|max:255',
            'rm8a' => 'required|max:255',
            'rm8b' => 'required|max:255',
            'rm9a' => 'required|max:255',
            'rm9b' => 'required|max:255',
            'rm9c' => 'required|max:255',
            'rm9d' => 'required|max:255',
            'rm9e' => 'required|max:255',
            'rm9f' => 'required|max:255',
            'rm9g' => 'required|max:255',
            'rm9h' => 'required|max:255',
            'rm9l' => 'required|max:255',
            'rm15a' => 'required|max:255',
            'diagnosa' => 'required|max:255',
            'tindakan' => 'required|max:255',
            'dpjp_id' => 'required|max:255',
            'cara_keluar' => 'required|max:255',
        ]);

        Klpcm::where('id', $id)->update($validatedData);

        return redirect('/dashboard/klpcmumums')->with('success', 'Klpcm has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\klpcm  $klpcm
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        klpcm::destroy($id);
        return redirect('/dashboard/klpcmumums')->with('success', 'Data has been deleted successfully.');
    }
}
