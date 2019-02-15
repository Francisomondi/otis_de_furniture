@extends('layouts.app')
@section('content')
<main role="main">

        <div class="container">
            <hr class="featurette-divider">
            <div class="container">
           
           
                   <div class="list-group">
                     
                     
                        <a href="#" class="list-group-item active">
                          List of Inquiries
                        </a>
                        @if(count($inquiries)>0)

                        @foreach($inquiries as $inquiry)
                        <a href="/inquiry/{{$inquiry->id}}" class="list-group-item">{{$inquiry->fullname}}</a>
                        
                     </div>
                     @endforeach
              

              @else
                <p>No inquiries found</p>
              
              @endif      
            </div>
          </div>
</main>
          
          
              {{$inquiries->links()}}
              <a class="btn btn-sm btn-outline-secondary" style="float:left" href="/" role="button">Back
                &raquo;</a>
        
         
         
   
   

  
  
<hr class="featurette-divider">
  
<div class="my-3 p-3 bg-white rounded shadow-sm">
      <h5 class="border-bottom border-gray pb-2 mb-0">Contac Us</h5>
      <div class="media text-muted pt-3">
        <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32"  preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect fill="#007bff" width="100%" height="100%"/><text fill="#007bff" dy=".3em" x="50%" y="50%">32x32</text></svg>
        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
          <strong class="d-block text-gray-dark">@Telephone</strong>
          0720868509<br>
          <strong class="d-block text-gray-dark">@Telephone</strong>
                0724454687<br>
        </p>
      </div>
      <div class="media text-muted pt-3">
        <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect fill="#e83e8c" width="100%" height="100%"/><text fill="#e83e8c" dy=".3em" x="50%" y="50%">32x32</text></svg>
        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
          <strong class="d-block text-gray-dark">@E-mail</strong>
          Info@noblefurtures.co.ke <br>
          Noblefurtures@gmail.com
      
        </p>
      </div>
      <div class="media text-muted pt-3">
              <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect fill="#e83e8c" width="100%" height="100%"/><text fill="#e83e8c" dy=".3em" x="50%" y="50%">32x32</text></svg>
              <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <strong class="d-block text-gray-dark">@Social-media</strong>
               Facebook: <a href="www.facebook.com/noblefurniture">Noble Furnitures  </a><br>
               Instagram: <a href="instagram.com/noblefurniture">Noble_Furnitures  </a><br>
               Twitter: <a href=" www.twitter.com/noblefurniture">@Noble_Furnitures  </a><br>
               <br>
              
            
              </p>
            </div>
      <div class="media text-muted pt-3">
        <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32"  role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect fill="#6f42c1" width="100%" height="100%"/><text fill="#6f42c1" dy=".3em" x="50%" y="50%">32x32</text></svg>
        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
          <strong class="d-block text-gray-dark">@postal address</strong>
          B.O.Box 0771-00518
          <small class="d-block  mt-3">
                 Mbotela Makadara Along jogoo Road<br>
                          Left turn to Town Before Foot Bridge
          </small>
         
        </p>
      </div>
     
    </div>

<hr class="featurette-divider">
  
  
    <!-- FOOTER -->
    <footer class="container">
      <p class="float-right"><a href="#">Back to top</a></p>
      <p>&copy; Noble Furnitures, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
    </footer>
  </main>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="/docs/4.2/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-zDnhMsjVZfS3hiP7oCBRmfjkQC4fzxVxFhBx8Hkz2aZX8gEvA/jsP3eXRCvzTofP" crossorigin="anonymous"></script></body>
  </html>
  
@endsection