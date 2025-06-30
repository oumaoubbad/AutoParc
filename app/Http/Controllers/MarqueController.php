<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use Illuminate\Http\Request;

class MarqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    } 
        
    public function index(Request $request)
    {
        //
        $marques = Marque::all();
        if ($request->has('search')) {
            $marques = Marque::where('name', 'like', "%{$request->search}%")->get();
        }

        return view('marques.index', compact('marques'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('marques.create');
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
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        

        }else{
            unset($input['image']);
        }
          
        $marque = new Marque();
           
            $marque->name= $request['name'];
            $marque->image= $profileImage;
           
        $marque->save();
     
        return redirect()->route('marques.index')
                        ->with('success','marque créée avec succès.');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function show(Marque $marque)
    {
        //
        return view('marques.show',compact('marque'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function edit(Marque $marque)
    {
        //
        return view('marques.edit',compact('marque'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marque $marque)
    {
        //
        $request->validate([
            'name' => 'required',
            
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            // $destinationPath = 'image/';
            $profileImage = $request->file('image')->getClientOriginalName();
            // $image->move($destinationPath, $profileImage);
            // $input['image'] = "$profileImage";
            $path = $request->file('image')->storeAs('public/files', $profileImage);

        }else{
            unset($input['image']);
        }
        $marque->update($input);
    
        return redirect()->route('marques.index')
                        ->with('success','Marque mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marque $marque)
    {
        //
        
        $marque->delete();

        return redirect()->route('marques.index')->with('message', 'marque Deleted Successfully');
    }
}
