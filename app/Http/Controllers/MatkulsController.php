<?php

namespace App\Http\Controllers;

use App\Matkul;
use App\Jadwal;
use App\MatkulUser;
use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class MatkulsController extends Controller
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
             $matkuls = Matkul::where('user_id', Auth::user()->id)->get();
 
              return view('matkuls.index', ['matkuls'=> $matkuls]);  
         }
         return view('auth.login');
     }
 

     public function adduser(Request $request){
         //add user to matkuls 

         //take a matkul, add a user to it
         $matkul = Matkul::find($request->input('matkul_id'));

        

         if(Auth::user()->id == $matkul->user_id){

         $user = User::where('email', $request->input('email'))->first(); //single record

         //check if user is already added to the matkul
         $matkulUser = MatkulUser::where('user_id',$user->id)
                                    ->where('matkul_id',$matkul->id)
                                    ->first();
                                    
            if($matkulUser){
                //if user already exists, exit 
        
                return response()->json(['success' ,  $request->input('email').' is already a member of this mata kuliah']); 
               
            }


            if($user && $matkul){

                $matkul->users()->attach($user->id); 

                     return response()->json(['success' ,  $request->input('email').' was added to the jadwal successfully']); 
                        
                    }
                    
         }

         return redirect()->route('matkuls.show', ['matkul'=> $matkul->id])
         ->with('errors' ,  'Error adding user to jadwal');
        

         
     }



     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create( $jadwal_id = null )
     {
         //

         $jadwals = null;
         if(!$jadwal_id){
            $jadwals = Jadwal::where('user_id', Auth::user()->id)->get();
         }
 
         return view('matkuls.create',['jadwal_id'=>$jadwal_id, 'jadwals'=>$jadwals]);
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
             $matkul = Matkul::create([
                 'name' => $request->input('name'),
                 'description' => $request->input('description'),
                 'jadwal_id' => $request->input('jadwal_id'),
                 'user_id' => Auth::user()->id
             ]);
 
 
             if($matkul){
                 return redirect()->route('matkuls.show', ['matkul'=> $matkul->id])
                 ->with('success' , 'Jadwal created successfully');
             }
 
         }
         
             return back()->withInput()->with('errors', 'Error creating new Jadwal');
 
     }

    
 
     /**
      * Display the specified resource.
      *
      * @param  \App\matkul  $matkul
      * @return \Illuminate\Http\Response
      */
     public function show(Matkul $matkul)
     {
         //
 
        // $matkul = Matkul::where('id', $matkul->id )->first();
        $matkul = Matkul::find($matkul->id);
 
        $comments = $matkul->comments;
         return view('matkuls.show', ['matkul'=>$matkul, 'comments'=> $comments ]);
     }
 
     /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\matkul  $matkul
      * @return \Illuminate\Http\Response
      */
     public function edit(Matkul $matkul)
     {
         //
         $matkul = Matkul::find($matkul->id);
         
         return view('matkuls.edit', ['matkul'=>$matkul]);
     }
 
     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\matkul  $matkul
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, matkul $matkul)
     {
        
       //save data
 
       $matkulUpdate = Matkul::where('id', $matkul->id)
                                 ->update([
                                         'name'=> $request->input('name'),
                                         'description'=> $request->input('description')
                                 ]);
 
       if($matkulUpdate){
           return redirect()->route('matkuls.show', ['matkul'=> $matkul->id])
           ->with('success' , 'Jadwal updated successfully');
       }
       //redirect
       return back()->withInput();
 
 
       
     }
 
     /**
      * Remove the specified resource from storage.
      *
      * @param  \App\matkul  $matkul
      * @return \Illuminate\Http\Response
      */
     public function destroy(Matkul $matkul)
     {
         //
 
         $findmatkul = Matkul::find( $matkul->id);
         if($findmatkul->delete()){
             
             //redirect
             return redirect()->route('matkuls.index')
             ->with('success' , 'Jadwal deleted successfully');
         }
 
         return back()->withInput()->with('error' , 'Jadwal could not be deleted');
         
 
     }
}
