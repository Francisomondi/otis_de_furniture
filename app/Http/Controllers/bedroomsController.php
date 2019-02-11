<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bedroom;

class bedroomsController extends Controller
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
        $bedrooms = bedroom::orderBy('created_at','desc')->paginate(3);
        return view('bedrooms.index')->with('bedrooms',$bedrooms);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bedrooms.create');
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
            $path = $request->file('image')->storeAs('public/photos/bedrooms',$fileNameToStore);

        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        //create bar stool
        $bedrooms = new  bedroom;
        $bedrooms->name = $request->input('name');
        $bedrooms->description = $request->input('description');
        $bedrooms->price = $request->input('price');
        $bedrooms->details = $request->input('details');
        $bedrooms->dimentions = $request->input('dimentions');
        $bedrooms->condition = $request->input('condition');
        $bedrooms->category = $request->input('category');
        $bedrooms ->user_id = auth()->user()->id;
        $bedrooms->image = $fileNameToStore;
        $bedrooms->save();

        return redirect('/bedrooms')->with('success','Bed Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bedrooms= bedroom::find($id);
        return view('bedrooms.show')->with('bedrooms',$bedrooms);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bedrooms= bedroom::find($id);
        return view('bedrooms.edit')->with('bedrooms',$bedrooms);
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
            $path = $request->file('image')->storeAs('public/photos/bedrooms',$fileNameToStore);

        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        //create bar stool
        $bedrooms =bedroom::find($id);
        $bedrooms->name = $request->input('name');
        $bedrooms->description = $request->input('description');
        $bedrooms->price = $request->input('price');
        $bedrooms->details = $request->input('details');
        $bedrooms->dimentions = $request->input('dimentions');
        $bedrooms->condition = $request->input('condition');
        $bedrooms->category = $request->input('category');
        $bedrooms ->user_id = auth()->user()->id;
        $bedrooms->image = $fileNameToStore;
        $bedrooms->save();

        return redirect('/bedrooms')->with('success','bed updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bedrooms = bedroom::find($id);
        
        $bedrooms->delete();
 
        return redirect('/bedrooms')->with('success', 'bedroom   deleted Successfully'); 
    }
}
