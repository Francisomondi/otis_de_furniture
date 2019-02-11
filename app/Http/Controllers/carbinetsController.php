<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\carbinet;

class carbinetsController extends Controller
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
        $carbinets = carbinet::orderBy('created_at','desc')->paginate(3);
        return view('carbinets.index')->with('carbinets',$carbinets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('carbinets.create');
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
            $path = $request->file('image')->storeAs('public/photos/carbinet',$fileNameToStore);

        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        //create carbinet
        $carbinets = new  carbinet;
        $carbinets->name = $request->input('name');
        $carbinets->description = $request->input('description');
        $carbinets->price = $request->input('price');
        $carbinets->details = $request->input('details');
        $carbinets->dimentions = $request->input('dimentions');
        $carbinets->condition = $request->input('condition');
        $carbinets->category = $request->input('category');
        $carbinets ->user_id = auth()->user()->id;
        $carbinets->image = $fileNameToStore;
        $carbinets->save();

        return redirect('/carbinets')->with('success','carbinet Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carbinets= carbinet::find($id);
        return view('carbinets.show')->with('carbinets',$carbinets);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carbinets= carbinet::find($id);
        return view('carbinets.edit')->with('carbinets',$carbinets);
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
            $path = $request->file('image')->storeAs('public/photos/carbinet',$fileNameToStore);

        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        //create bar stool
        $carbinets =carbinet::find($id);
        $carbinets->name = $request->input('name');
        $carbinets->description = $request->input('description');
        $carbinets->price = $request->input('price');
        $carbinets->details = $request->input('details');
        $carbinets->dimentions = $request->input('dimentions');
        $carbinets->condition = $request->input('condition');
        $carbinets->category = $request->input('category');
        $carbinets ->user_id = auth()->user()->id;
        $carbinets->image = $fileNameToStore;
        $carbinets->save();

        return redirect('/carbinets')->with('success','carbinets updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carbinets = carbinet::find($id);
        
        $carbinets->delete();
 
        return redirect('/carbinets')->with('success', 'carbinet   deleted Successfully'); 
    }
}
