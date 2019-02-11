<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\furnituregallery;

class furnituregalleryController extends Controller
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
        $furnituregalleries = furnituregallery::orderBy('created_at','desc')->paginate(3);
        return view('furnituregallery.index')->with('furnituregalleries',$furnituregalleries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('furnituregallery.create');
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
            $path = $request->file('image')->storeAs('public/photos/furnituregallery',$fileNameToStore);

        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        //create furnituregallery
        $furnituregalleries = new  furnituregallery;
        $furnituregalleries->name = $request->input('name');
        $furnituregalleries->description = $request->input('description');
        $furnituregalleries->price = $request->input('price');
        $furnituregalleries->details = $request->input('details');
        $furnituregalleries->dimentions = $request->input('dimentions');
        $furnituregalleries->condition = $request->input('condition');
        $furnituregalleries->category = $request->input('category');
        $furnituregalleries ->user_id = auth()->user()->id;
        $furnituregalleries->image = $fileNameToStore;
        $furnituregalleries->save();

        return redirect('/furnituregallery')->with('success','furnituregallery Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $furnituregalleries= furnituregallery::find($id);
        return view('furnituregallery.show')->with('furnituregalleries',$furnituregalleries);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $furnituregalleries= furnituregallery::find($id);
        return view('furnituregallery.edit')->with('furnituregalleries',$furnituregalleries);
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
            $path = $request->file('image')->storeAs('public/photos/furnituregallery',$fileNameToStore);

        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        //create bar stool
        $furnituregalleries =furnituregallery::find($id);
        $furnituregalleries->name = $request->input('name');
        $furnituregalleries->description = $request->input('description');
        $furnituregalleries->price = $request->input('price');
        $furnituregalleries->details = $request->input('details');
        $furnituregalleries->dimentions = $request->input('dimentions');
        $furnituregalleries->condition = $request->input('condition');
        $furnituregalleries->category = $request->input('category');
        $furnituregalleries ->user_id = auth()->user()->id;
        $furnituregalleries->image = $fileNameToStore;
        $furnituregalleries->save();

        return redirect('/furnituregallery')->with('success','furnituregallery updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $furnituregalleries = furnituregallery::find($id);
        
        $furnituregalleries->delete();
 
        return redirect('/furnituregallery')->with('success', 'furnituregallery   deleted Successfully'); 
    }
}
