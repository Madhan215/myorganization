@extends('layouts.mainprofil')

@section('container_profil')

      <style>
         .card {
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            width: 50%;
            margin: 20px;
            }

            h5{
               
  text-shadow: 2px 2px 8px #000000;

            }

            .card:hover {
            box-shadow: 0 4px 8px 0 white;
            }

            .container {
            padding: 10px 5px;
            }
            button {
               background-color: #24a0ed;
               color: white;
               padding: 5px 10px;
               border: none;
               border-radius: 5px;
            }

            .button {
               transition-duration: 0.4s;
            }

            .button:hover {
               background-color: #006db1;
               /* Green */
               color: white;
            }
      </style>
   
      <!-- revolution slider -->
      <div class="banner-slider">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-7">
                  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{ asset('storage/images/profil/1.jpg')}}" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
         <h5 class="shadow-lg p-3">Pioneer</h5>
         <p>2017</p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ asset('storage/images/profil/2.jpg')}}" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
         <h5>Akad</h5>
         <p>2018</p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ asset('storage/images/profil/3.jpg')}}" alt="Third slide">
      <div class="carousel-caption d-none d-md-block">
         <h5>Sembilang</h5>
         <p>2019</p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ asset('storage/images/profil/4.jpg')}}" alt="Third slide">
      <div class="carousel-caption d-none d-md-block">
         <h5>Rang-Rang</h5>
         <p>2020</p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ asset('storage/images/profil/5.jpg')}}" alt="Third slide">
      <div class="carousel-caption d-none d-md-block">
         <h5 class="shadow-lg p-3 mb-5">Darang</h5>
         <p>2021</p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ asset('storage/images/profil/Original-IMG_7078.JPG')}}" alt="Third slide">
      <div class="carousel-caption d-none d-md-block">
         <h5>Sinovac</h5>
         <p>2022</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<script>
   $('.carousel').carousel()
</script>
               </div>
               <div class="col-md-5">
                  <div class="full slider_cont_section">
                  	<h4></h4>
                     <h4>Selamat Datang di Website</h4>
                     <p></p>
                     <h3>UKM FKIP MENGAJAR ULM</h3>
                     <h4>Muda Berkarya Istimewa</h4>
                     <hr color="white" size="50%" width="98%">
                  </div>
                  <div>
                     
                     <h2 style="color: darkgray; text-align: center;">EVENTS</h2>
                     <div class="card">
                        <img src="{{ asset('storage/images/profil/pamfletfix.jpg')}}" style="width:100%" alt ="Pamflet Semnas 2022">
                        <div class="container">
                           <p><b style="color: black; font-weight: bold;">SEMINAR NASIONAL MOTIVASI PENDIDIKAN UKM FKIP MENGAJAR ULM
                                 2022</b></p>
                          <p style="color: gray; margin-top: 2px; font-size: small;">Sabtu, 19 November 2022</p>
                           <a href="event.html">
                              <button class="button" target="_blank">Informasi Lebih lanjut</button>
                           </a>
                        </div>
                     </div>
                     <div class="card">
                        <img src="{{ asset('storage/images/profil/pamflet_oprec_2022_fix.png')}}" style="width:100%" alt ="Pamflet Semnas 2022">
                        <div class="container">
                           <p><b style="color: black; font-weight: bold;">OPEN RECRUITMENT UKM FKIP MENGAJAR ULM
                                 2022</b></p>
                          <p style="color: gray; margin-top: 2px; font-size: small;">Pengumuman, 9 Desember 2022</p>
                           <a href="event.html">
                              <button class="button" target="_blank">Informasi Lebih lanjut</button>
                           </a>
                        </div>
                     </div>
                  </div>
               </div> 
            </div>
         </div>
      </div>
@endsection