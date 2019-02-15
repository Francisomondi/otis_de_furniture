@extends('layouts.app')

@section('content')

<main role="main" class="container">
        <div class="row">
          <div class="col-md-8 blog-main">
            <h3 class="pb-3 mb-4 font-italic border-bottom">
             About Us
            </h3>
      
            <div class="blog-post">
      
              <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class="active">      
                  </li>
                  <li data-target="#myCarousel" data-slide-to="1"> </li>
                     
                  <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                     <img src="/images/m.jpg" alt="leather seat" class="bd-placeholder-img" width="100%" height="50%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" rect fill="#777" width="100%" height="50%"/>
                   
                    <div class="container">
                     
                    </div>
                  </div>
                  <div class="carousel-item">
                          <img src="/images/n.jpg" alt="furniture image" class="bd-placeholder-img" width="100%" height="50%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" rect fill="#777" width="100%" height="50%"/>
                    <div class="container">
                     
                    </div>
                  </div>
                  <div class="carousel-item">
                          <img src="/images/r.jpg" alt="leather seat" class="bd-placeholder-img" width="100%" height="50%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" rect fill="#777" width="100%" height="50%"/>
                    <div class="container">
                     
                    </div>
                  </div>
                </div>
                <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
              
            </div><!-- /.blog-post -->
      
            
          </div><!-- /.blog-main -->
      
          <aside class="col-md-4 blog-sidebar">
            <div class="p-3 mb-3 bg-light rounded">
              <h4 class="font-italic">Motto</h4>
              <p class="mb-0"> <em>Designed to please, Made to last</em></p>
            </div>
      
            <div class="p-3 mb-3 bg-light rounded">
              <h4 class="font-italic">Mission</h4>
              <p class="mb-0"> <em>To be kenya's leading online Furniture Store serving for a purpose.</em></p>
            </div>
      
            <div class="p-3 mb-3 bg-light rounded">
                    <h4 class="font-italic">Vision</h4>
                    <p class="mb-0"><em>Production for clients best interests</em> .</p>
            </div>
          </aside><!-- /.blog-sidebar -->
      
        </div><!-- /.row -->
      
      </main><!-- /.container -->
      <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h5 class="border-bottom border-gray pb-2 mb-0">Contac Us</h5>
        <div class="media text-muted pt-3">
          <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32"  preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect fill="#007bff" width="100%" height="100%"/><text fill="#007bff" dy=".3em" x="50%" y="50%">32x32</text></svg>
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">@Telephone</strong>
            0720868509<br>
            
                0724454687<br>
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
                 Facebook: <a href="www.facebook.com/noblefurniture">OTIS DE FURNITURE  </a><br>
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