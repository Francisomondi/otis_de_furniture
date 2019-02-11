<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\barstool;

class barStoolsController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barstools = barstool::orderBy('created_at','desc')->paginate(3);
        return view('barstools.index')->with('barstools',$barstools);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barstools.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=> 'required', 
            'description'=> 'required', 
            'price'=> 'required', 
            'details'=> 'required', 
            'dimentions'=> 'required', 
            'condition'=> 'required', 
            'category'=> 'required', 
            'image'=> 'image|nullable|max:1999'

        ]);

        //handle file upload
        if($request->hasFile('image')){

            //get file name ith extension
            $fileNameWithExt= $request->file('image')->getClientOriginalName();

            //get just file name
            $filename =pathInfo( $fileNameWithExt, PATHINFO_FILENAME);

            //Get just Ext
            $extension = $request->file('image')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore =$filename.'_'.time().'.'.$extension;

            //Upload image
            $path = $request->file('image')->storeAs('public/photos/dinnings',$fileNameToStore);

        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        //create bar stool
        $barstools = new  barstool;
        $barstools->name = $request->input('name');
        $barstools->description = $request->input('description');
        $barstools->price = $request->input('price');
        $barstools->details = $request->input('details');
        $barstools->dimentions = $request->input('dimentions');
        $barstools->condition = $request->input('condition');
        $barstools->category = $request->input('category');
        $barstools ->user_id = auth()->user()->id;
        $barstools->image = $fileNameToStore;
        $barstools->save();

        return redirect('/barstools')->with('success','Bar Stool Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barstools= barstool::find($id);
        return view('barstools.show')->with('barstools',$barstools);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barstools= barstool::find($id);
        return view('barstools.edit')->with('barstools',$barstools);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=> 'required', 
            'description'=> 'required', 
            'price'=> 'required', 
            'details'=> 'required', 
            'dimentions'=> 'required', 
            'condition'=> 'required', 
            'category'=> 'required', 
            'image'=> 'image|nullable|max:1999'

        ]);

        //handle file upload
        if($request->hasFile('image')){

            //get file name ith extension
            $fileNameWithExt= $request->file('image')->getClientOriginalName();

            //get just file name
            $filename =pathInfo( $fileNameWithExt, PATHINFO_FILENAME);

            //Get just Ext
            $extension = $request->file('image')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore =$filename.'_'.time().'.'.$extension;

            //Upload image
            $path = $request->file('image')->storeAs('public/photos/dinnings',$fileNameToStore);

        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        //create bar stool
        $barstools =barstool::find($id);
        $barstools->name = $request->input('name');
        $barstools->description = $request->input('description');
        $barstools->price = $request->input('price');
        $barstools->details = $request->input('details');
        $barstools->dimentions = $request->input('dimentions');
        $barstools->condition = $request->input('condition');
        $barstools->category = $request->input('category');
        $barstools ->user_id = auth()->user()->id;
        $barstools->image = $fileNameToStore;
        $barstools->save();

        return redirect('/barstools')->with('success','Bar Stool updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barstools = barstool::find($id);
        
        $barstools->delete();
 
        return redirect('/barstools')->with('success', 'Barstool   deleted Successfully'); 
    }
}
