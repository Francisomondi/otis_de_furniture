<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\leathersofa;

class leathersofasController extends Controller
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
        $leathersofas = leathersofa::orderBy('created_at','desc')->paginate(3);
        return view('leathersofas.index')->with('leathersofas',$leathersofas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('leathersofas.create');
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
            $path = $request->file('image')->storeAs('public/photos/leathersofa',$fileNameToStore);

        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        //create leathersofa
        $leathersofas = new  leathersofa;
        $leathersofas->name = $request->input('name');
        $leathersofas->description = $request->input('description');
        $leathersofas->price = $request->input('price');
        $leathersofas->details = $request->input('details');
        $leathersofas->dimentions = $request->input('dimentions');
        $leathersofas->condition = $request->input('condition');
        $leathersofas->category = $request->input('category');
        $leathersofas ->user_id = auth()->user()->id;
        $leathersofas->image = $fileNameToStore;
        $leathersofas->save();

        return redirect('/leathersofas')->with('success','leathersofa Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $leathersofas= leathersofa::find($id);
        return view('leathersofas.show')->with('leathersofas',$leathersofas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $leathersofas= leathersofa::find($id);
        return view('leathersofas.edit')->with('leathersofas',$leathersofas);
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
            $path = $request->file('image')->storeAs('public/photos/leathersofa',$fileNameToStore);

        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        //create bar stool
        $leathersofas =leathersofa::find($id);
        $leathersofas->name = $request->input('name');
        $leathersofas->description = $request->input('description');
        $leathersofas->price = $request->input('price');
        $leathersofas->details = $request->input('details');
        $leathersofas->dimentions = $request->input('dimentions');
        $leathersofas->condition = $request->input('condition');
        $leathersofas->category = $request->input('category');
        $leathersofas ->user_id = auth()->user()->id;
        $leathersofas->image = $fileNameToStore;
        $leathersofas->save();

        return redirect('/leathersofas')->with('success','leathersofas updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $leathersofas = leathersofa::find($id);
        
        $leathersofas->delete();
 
        return redirect('/leathersofas')->with('success', 'leathersofa   deleted Successfully'); 
    }
}
