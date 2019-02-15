@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row featurette">
                <div class="col-md-7">
                  <h2 class="featurette-heading">{{$fabricsofas->name}} <span class="text-muted">KES {{$fabricsofas->price}}</span></h2>
                  <p class="lead"> {{$fabricsofas->description}}.</p>
                </div>
                <div class="col-md-5">
                        <img src="/storage/photos//fabricsofa/{{$fabricsofas->image}}" alt="leather seat" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500">
                    </div>
                    </div>
                    
                    @if(!Auth::guest())
                    @if(Auth::user()->id == $fabricsofas->user_id)
                       <div class="row">
                               <a href="/fabricsofas" class="btn btn-sm btn-outline-primary">Back</a>
                               
                         {!!Form::open(['action'=> ['fabricsofasController@destroy',$fabricsofas->id],'method'=> 'POST','class'=>'pull-right'])!!}
                             {{Form::hidden('_method','DELETE')}}
                             {{Form::submit('Delete image',['class'=>'btn btn-sm btn-outline-danger'])}}
                             {!!Form::close()!!}
                       </div>
                      
                       @endif
                  
                   @endif
</div>


<div class="my-3 p-3 bg-white rounded shadow-sm">
        <h5 class="border-bottom border-gray pb-2 mb-0">Contac Us</h5>
        <div class="media text-muted pt-3">
          <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32"  preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect fill="#007bff" width="100%" height="100%"/><text fill="#007bff" dy=".3em" x="50%" y="50%">32x32</text></svg>
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">@Telephone</strong>
            0720868509<br>
          </p>
        </div>
        <div class="media text-muted pt-3">
          <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect fill="#e83e8c" width="100%" height="100%"/><text fill="#e83e8c" dy=".3em" x="50%" y="50%">32x32</text></svg>
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">@E-mail</strong>
            Info@otisdefurniture.co.ke <br>
            Otisauko@gmail.com
        
          </p>
        </div>
        <div class="media text-muted pt-3">
                <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect fill="#e83e8c" width="100%" height="100%"/><text fill="#e83e8c" dy=".3em" x="50%" y="50%">32x32</text></svg>
                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                  <strong class="d-block text-gray-dark">@Social-media</strong>
                  Facebook: <a href="https://www.facebook.com/otisfurn/">OTIS DE FURNITURE  </a><br>
                 Instagram: <a href="instagram.com/noblefurniture">Otis_De_Furniture  </a><br>
                 Twitter: <a href=" www.twitter.com/noblefurniture">@Otis_de_Furnitures  </a><br>
                 <br>
                
              
                </p>
              </div>
        <div class="media text-muted pt-3">
          <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32"  role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect fill="#6f42c1" width="100%" height="100%"/><text fill="#6f42c1" dy=".3em" x="50%" y="50%">32x32</text></svg>
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">@postal address</strong>
            B.O.Box 7778-00300 Nrb
            <strong class="d-block  mt-3">
                   Jogoo Road<br>
                   Mboya Hall
            </strong>
           
          </p>
        </div>
       
      </div>
        
@endsection