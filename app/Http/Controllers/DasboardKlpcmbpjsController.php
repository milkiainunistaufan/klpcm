<?php

namespace App\Http\Controllers;

use App\Models\Dpjp;
use App\Models\klpcm;
use Illuminate\Http\Request;

class DasboardKlpcmbpjsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if(request('search')){
        //     $klpcms = klpcm::with(['dpjp'])
        //     ->latest()
        //     ->where('pasien','like', '%'. request('search').'%')
        //     ->where(function($query){
        //         $query->where('cara_bayar','bpjs');
        //     })
        //     ->orWhere('no_rm','like', '%'. request('search').'%')
        //     ->where(function($query){
        //         $query->where('cara_bayar','bpjs');
        //     })
        //     ->orWhere('kelamin', 'like', '%'.request('search').'%')
        //     ->where(function($query){
        //         $query->where('cara_bayar','bpjs');
        //     });
        // }else if(request('dpjp_id')){
        //     $klpcms = klpcm::with(['dpjp'])
        //     ->latest()
        //     ->where('dpjp_id', request('dpjp_id'))
        //     ->where(function($query){
        //         $query->where('cara_bayar','bpjs');
        //     });
        // }
        // else{
        //     $klpcms = klpcm::with(['dpjp'])->where('cara_bayar', 'bpjs')->latest();
        // }
        return view('dashboard.klpcmbpjs.index', [
            'klpcms' => klpcm::where('cara_bayar','bpjs')->latest()->bpjs(request(['search','dpjp_id']))->paginate(10)->withQueryString(),
            'dpjps' => Dpjp::all(),
            'dpjp_id' => request('dpjp_id')
        ]);
    }
    public function cetak()
    {
        return view('dashboard.klpcmbpjs.cetak', [
            'klpcms' => klpcm::where('cara_bayar','bpjs')->latest()->bpjs(request(['search','dpjp_id']))->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.klpcmbpjs.create', [
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
        $validatedDAta = $request->validate([
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

        Klpcm::create($validatedDAta);

        return redirect('/dashboard/klpcmbpjs')->with('success', 'new added success');
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
        return view('dashboard.klpcmbpjs.edit', [
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

        return redirect('/dashboard/klpcmbpjs')->with('success', 'Klpcm has been updated');
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
    return redirect('/dashboard/klpcmbpjs')->with('success', 'Data has been deleted successfully.');
    }
}
