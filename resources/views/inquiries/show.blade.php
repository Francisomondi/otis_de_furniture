@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row featurette">
                <div class="col-md-7">
                  <h2 class="featurette-heading">{{$inquiries->fullname}} </h2>
                  <p class="lead"> {{$inquiries->inquiry}}.</p>
                  <h4><span class="text-muted">phone: 0{{$inquiries->phone}}</span></h4>
                </div>
                <div class="col-md-5">
                        <img src="/storage/photos//inquiry/{{$inquiries->image}}" alt="leather seat" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500">
                    </div>
                    </div>
                    
                   
                       <div class="row">
                               <a href="/inquiry" class="btn btn-sm btn-outline-primary">Back</a>

                    @if(!Auth::guest())
                        @if(Auth::user()->id == $inquiries->user_id)
                               
                         {!!Form::open(['action'=> ['inquiryController@destroy',$inquiries->id],'method'=> 'POST','class'=>'pull-right'])!!}
                             {{Form::hidden('_method','DELETE')}}
                             {{Form::submit('Delete image',['class'=>'btn btn-sm btn-outline-danger'])}}
                             {!!Form::close()!!}
                       </div>
                      
                       @endif
                  
                   @endif
</div>
        
@endsection