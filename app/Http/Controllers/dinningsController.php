<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dinning;

class dinningsController extends Controller
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
        $dinnings = dinning::orderBy('created_at','desc')->paginate(6);
        return view('dinnings.index')->with('dinnings',$dinnings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dinnings.create');
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
            $path = $request->file('image')->storeAs('public/photos/dinning',$fileNameToStore);

        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        //create dinning
        $dinnings = new  dinning;
        $dinnings->name = $request->input('name');
        $dinnings->description = $request->input('description');
        $dinnings->price = $request->input('price');
        $dinnings->details = $request->input('details');
        $dinnings->dimentions = $request->input('dimentions');
        $dinnings->condition = $request->input('condition');
        $dinnings->category = $request->input('category');
        $dinnings ->user_id = auth()->user()->id;
        $dinnings->image = $fileNameToStore;
        $dinnings->save();

        return redirect('/dinnings')->with('success','Dinning Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dinnings= dinning::find($id);
        return view('dinnings.show')->with('dinnings',$dinnings);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dinnings= dinning::find($id);
        return view('dinnings.edit')->with('dinnings',$dinnings);
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
            $path = $request->file('image')->storeAs('public/photos/dinning',$fileNameToStore);

        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        //create bar stool
        $dinnings =dinning::find($id);
        $dinnings->name = $request->input('name');
        $dinnings->description = $request->input('description');
        $dinnings->price = $request->input('price');
        $dinnings->details = $request->input('details');
        $dinnings->dimentions = $request->input('dimentions');
        $dinnings->condition = $request->input('condition');
        $dinnings->category = $request->input('category');
        $dinnings ->user_id = auth()->user()->id;
        $dinnings->image = $fileNameToStore;
        $dinnings->save();

        return redirect('/dinnings')->with('success','Dinnings updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dinnings = dinning::find($id);
        
        $dinnings->delete();
 
        return redirect('/dinnings')->with('success', 'Dinning   deleted Successfully'); 
    }
}
