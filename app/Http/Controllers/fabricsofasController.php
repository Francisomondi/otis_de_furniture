<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\fabricsofa;

class fabricsofasController extends Controller
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
        $fabricsofas = fabricsofa::orderBy('created_at','desc')->paginate(3);
        return view('fabricsofas.index')->with('fabricsofas',$fabricsofas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fabricsofas.create');
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
            $path = $request->file('image')->storeAs('public/photos/fabricsofa',$fileNameToStore);

        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        //create fabricsofa
        $fabricsofas = new  fabricsofa;
        $fabricsofas->name = $request->input('name');
        $fabricsofas->description = $request->input('description');
        $fabricsofas->price = $request->input('price');
        $fabricsofas->details = $request->input('details');
        $fabricsofas->dimentions = $request->input('dimentions');
        $fabricsofas->condition = $request->input('condition');
        $fabricsofas->category = $request->input('category');
        $fabricsofas ->user_id = auth()->user()->id;
        $fabricsofas->image = $fileNameToStore;
        $fabricsofas->save();

        return redirect('/fabricsofas')->with('success','fabricsofa Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fabricsofas= fabricsofa::find($id);
        return view('fabricsofas.show')->with('fabricsofas',$fabricsofas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fabricsofas= fabricsofa::find($id);
        return view('fabricsofas.edit')->with('fabricsofas',$fabricsofas);
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
            $path = $request->file('image')->storeAs('public/photos/fabricsofa',$fileNameToStore);

        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        //create bar stool
        $fabricsofas =fabricsofa::find($id);
        $fabricsofas->name = $request->input('name');
        $fabricsofas->description = $request->input('description');
        $fabricsofas->price = $request->input('price');
        $fabricsofas->details = $request->input('details');
        $fabricsofas->dimentions = $request->input('dimentions');
        $fabricsofas->condition = $request->input('condition');
        $fabricsofas->category = $request->input('category');
        $fabricsofas ->user_id = auth()->user()->id;
        $fabricsofas->image = $fileNameToStore;
        $fabricsofas->save();

        return redirect('/fabricsofas')->with('success','fabricsofas updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fabricsofas = fabricsofa::find($id);
        
        $fabricsofas->delete();
 
        return redirect('/fabricsofas')->with('success', 'fabricsofa   deleted Successfully'); 
    }
}
