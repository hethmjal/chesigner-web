<x-app-layout>
    <x-slot name="header">
     
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home page') }}
        </h2>

        <link
        rel="stylesheet"
        href="https://unpkg.com/swiper/swiper-bundle.min.css"
      />
      <script>
  var slideIndex = 0;
showSlides();
var slides,dots;

function showSlides() {
    var i;
    slides = document.getElementsByClassName("mySlides");
    dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex> slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 8000); // Change image every 8 seconds
}

function plusSlides(position) {
    slideIndex +=position;
    if (slideIndex> slides.length) {slideIndex = 1}
    else if(slideIndex<1){slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
}

function currentSlide(index) {
    if (index> slides.length) {index = 1}
    else if(index<1){index = slides.length}
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[index-1].style.display = "block";  
    dots[index-1].className += " active";
}
    
    
      </script>
    </x-slot>
    <div id="slide">
        <div class="slideshow-container">
            @foreach ($slides as $slide)
            
        <div id="slideshow-container" class="slideshow-container">

           
            
            <div id="mySlides" class="mySlides fade" style="background-image: url({{asset('uploads/'.$slide->image)}})">
              <div class="text">
                  <h1>{{$slide->entitle}}</h1>
                  <p>{{$slide->description}}</p>
                   <br>
                  <div>
                        <a href="{{$slide->link}}" class="bg-purple-800 py-4 px-8 text-white font-bold uppercase text-xs rounded hover:bg-gray-200 hover:text-gray-800">Contact us</a>
                    </div>
                </div>
            </div>
            
            </div>
            <br>
        @endforeach
          <a class="prev" onclick="plusSlides(-1)">&#10094;</a> <a class="next" onclick="plusSlides(1)">&#10095;</a> 
        
        </div>
        <br>
        @php
            $i =0;
        @endphp
        <div style="text-align:center"> 
            @foreach ($slides as $slide)

        <span class="dot" onclick="currentSlide({{++$i}})"></span> 
        @endforeach
         </div>
    {{--
  <div class="slideshow-container">
        @foreach ($slides as $slide)
            
        <div id="slideshow-container" class="slideshow-container">

           
            
            <div id="mySlides" class="mySlides fade" style="background-image: url({{asset('uploads/'.$slide->image)}})">
              <div class="text">
                  <h1>{{$slide->entitle}}</h1>
                  <p>{{$slide->description}}</p>
                   <br>
                  <div>
                        <a href="{{$slide->link}}" class="bg-purple-800 py-4 px-8 text-white font-bold uppercase text-xs rounded hover:bg-gray-200 hover:text-gray-800">Contact us</a>
                    </div>
                </div>
            </div>
            
            </div>
            <br>
        @endforeach

    
        
        </div> 
        <br>
         
        <div style="text-align:center">
            @php
                $i =0;
            @endphp
            @foreach ($slides as $slide)
    
            <span class="dot" onclick="currentSlide({{++$i}})"></span> 
          @endforeach
    
         
        </div> --}}
</x-app-layout>
