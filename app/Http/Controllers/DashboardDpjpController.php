<?php

namespace App\Http\Controllers;

use App\Models\Dpjp;
use Illuminate\Http\Request;

class DashboardDpjpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.dpjp.index', [
            'dpjps' => Dpjp::latest()->filter(request(['search']))->paginate(10)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.dpjp.create');
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
            'dokter' => 'required|max:255'
        ]);

        Dpjp::create($validatedData);

        return redirect('/dashboard/dpjp')->with('success', 'new added success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dpjp  $dpjp
     * @return \Illuminate\Http\Response
     */
    public function show(Dpjp $dpjp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dpjp  $dpjp
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.dpjp.edit',[
            'dpjp' => Dpjp::findOrfail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dpjp  $dpjp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'dokter' => 'required|max:255'
        ]);

        Dpjp::where('id',$id)->update($validatedData);

        return redirect('/dashboard/dpjp')->with('success', 'Dpjp has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dpjp  $dpjp
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Dpjp::destroy($id);
        return redirect('/dashboard/dpjp')->with('success', 'Data has been deleted successfully.');
    }
}
