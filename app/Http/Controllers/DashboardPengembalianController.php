<?php

namespace App\Http\Controllers;

use App\Models\Dpjp;
use App\Models\Ruang;
use App\Models\Pengembalian;
use Illuminate\Http\Request;

class DashboardPengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // if(request('search')){
        //     $pengembalians = Pengembalian::with(['dpjp','ruang'])->latest()->where('no_rm','like', '%'. request('search').'%')
        //     ->orWhere('pasien', 'like', '%'. request('search').'%')
        //     ->orWhere('kelamin', 'like', '%'. request('search').'%')->paginate(10);
        // }else if(request('dpjp_id')){
        //     $pengembalians = Pengembalian::with(['dpjp','ruang'])->latest()->where('dpjp_id', request('dpjp_id'))->paginate(10);
        // } else{
        //     $pengembalians = Pengembalian::with(['dpjp','ruang'])->latest()->paginate(10);
        // }
        return view('dashboard.pengembalian.index',[
            'pengembalians' => Pengembalian::with(['dpjp','ruang'])->latest()->filter(request(['search','dpjp_id','status']))->paginate(10)->withQueryString(),
            'dpjps' => Dpjp::all()
        ]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pengembalian.create',[
            'dpjps' => Dpjp::all(),
            'ruangs' => Ruang::all()
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
            'status' => 'required|max:255',
            'no_rm' => 'required|max:255',
            'pasien' => 'required|max:255',
            'kelamin' => 'required|max:255',
            'dpjp_id' => 'required|max:255',
            'ruang_id' => 'required|max:255',
            'tgl_pengembalian' => 'required|max:255',
            'tgl_kembali_rm' => 'required|max:255',
            
        ]);

        Pengembalian::create($validatedData);

        return redirect('/dashboard/pengembalian')->with('success', 'new added success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function show(Pengembalian $pengembalian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.pengembalian.edit',[
            'pengembalian' => Pengembalian::findOrfail($id),
            'dpjps' => Dpjp::all(),
            'ruangs' => Ruang::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'status' => 'required|max:255',
            'no_rm' => 'required|max:255',
            'pasien' => 'required|max:255',
            'kelamin' => 'required|max:255',
            'dpjp_id' => 'required|max:255',
            'ruang_id' => 'required|max:255',
            'tgl_pengembalian' => 'required|max:255',
            'tgl_kembali_rm' => 'required|max:255',
            
        ]);

        Pengembalian::where('id',$id)->update($validatedData);

        return redirect('/dashboard/pengembalian')->with('success', 'Data has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pengembalian::destroy($id);
        return redirect('/dashboard/pengembalian')->with('success', 'Data has been deleted successfully.');
    }
}
