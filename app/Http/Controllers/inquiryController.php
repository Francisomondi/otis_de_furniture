<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\inquiry;

class inquiryController extends Controller
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
        $inquiries = inquiry::orderBy('created_at','desc')->paginate(6);
        return view('inquiries.index')->with('inquiries',$inquiries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inquiries.create');
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
            'fullname'=> 'required', 
            'email'=> 'required', 
            'phone'=> 'required', 
            'inquiry'=> 'required', 
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
            $path = $request->file('image')->storeAs('public/photos/inquiry',$fileNameToStore);

        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        //create inquiry
        $inquiries = new  inquiry;
        $inquiries->fullname = $request->input('fullname');
        $inquiries->inquiry = $request->input('inquiry');
        $inquiries->phone = $request->input('phone');
        $inquiries->email = $request->input('email');
        $inquiries->image = $fileNameToStore;
        $inquiries->save();

        return redirect('/inquiry')->with('success','inquiry made Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $inquiries= inquiry::find($id);
        return view('inquiries.show')->with('inquiries',$inquiries);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inquiries= inquiry::find($id);
        return view('inquiries.edit')->with('inquiries',$inquiries);
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
            'fullname'=> 'required', 
            'email'=> 'required', 
            'phone'=> 'required', 
            'inquiry'=> 'required', 
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
            $path = $request->file('image')->storeAs('public/photos/inquiry',$fileNameToStore);

        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        //create inquiry
        $inquiries = inquiry::find($id);
        $inquiries->name = $request->input('name');
        $inquiries->description = $request->input('description');
        $inquiries->price = $request->input('price');
        $inquiries->details = $request->input('details');
        $inquiries->dimentions = $request->input('dimentions');
        $inquiries->condition = $request->input('condition');
        $inquiries->category = $request->input('category');
        $inquiries ->user_id = auth()->user()->id;
        $inquiries->image = $fileNameToStore;
        $inquiries->save();

        return redirect('/inquiries')->with('success','inquiry updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inquiries = inquiry::find($id);
        
        $inquiries->delete();
 
        return redirect('/inquiries')->with('success', 'inquiry   deleted Successfully'); 
    }
}
