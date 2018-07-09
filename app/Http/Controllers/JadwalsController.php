<?php

namespace App\Http\Controllers;

use App\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if( Auth::check() ){


            $jadwals = Jadwal::where('user_id', Auth::user()->id)->get();

             return view('jadwals.index', ['jadwals'=> $jadwals]);  
        }
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('jadwals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        if(Auth::check()){
            $jadwal = Jadwal::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'user_id' => Auth::user()->id
            ]);


            if($jadwal){
                return redirect()->route('jadwals.show', ['jadwal'=> $jadwal->id])
                ->with('success' , 'Jadwal created successfully');
            }

        }
        
            return back()->withInput()->with('errors', 'Error creating new Jadwal');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function show(Jadwal $jadwal)
    {
        //

       // $jadwal = Jadwal::where('id', $jadwal->id )->first();
        $jadwal = Jadwal::find($jadwal->id);

        return view('jadwals.show', ['jadwal'=>$jadwal]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function edit(Jadwal $jadwal)
    {
        //
        $jadwal = Jadwal::find($jadwal->id);
        
        return view('jadwals.edit', ['jadwal'=>$jadwal]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jadwal $jadwal)
    {
       
      //save data

      $jadwalUpdate = Jadwal::where('id', $jadwal->id)
                                ->update([
                                        'name'=> $request->input('name'),
                                        'description'=> $request->input('description')
                                ]);

      if($jadwalUpdate){
          return redirect()->route('jadwals.show', ['jadwal'=> $jadwal->id])
          ->with('success' , 'Jadwal updated successfully');
      }
      //redirect
      return back()->withInput();


      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jadwal $jadwal)
    {
        //

        $findJadwal = Jadwal::find( $jadwal->id);
		if($findJadwal->delete()){
            
            //redirect
            return redirect()->route('jadwals.index')
            ->with('success' , 'Jadwal deleted successfully');
        }

        return back()->withInput()->with('error' , 'Jadwal could not be deleted');
        

    }
}
