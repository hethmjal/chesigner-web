<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <script src="https://use.fontawesome.com/aefb3497d1.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/selectize.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.bootstrap4.min.css" integrity="sha512-MMojOrCQrqLg4Iarid2YMYyZ7pzjPeXKRvhW9nZqLo6kPBBTuvNET9DBVWptAo/Q20Fy11EIHM5ig4WlIrJfQw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        @livewireStyles

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="{{ asset('js/selectize.js') }}" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/standalone/selectize.js" integrity="sha512-pF+DNRwavWMukUv/LyzDyDMn8U2uvqYQdJN0Zvilr6DDo/56xPDZdDoyPDYZRSL4aOKO/FGKXTpzDyQJ8je8Qw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <!-- Swiper JS -->
            <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
            <script src="{{asset('js2/recorder.js')}}"></script>
            <script src="{{asset('js2/app.js')}}"></script>
      </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                @include('inc.messages')
                {{ $slot }}
            </main>
        </div>

        @stack('modals')
        @stack('js')
        <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
        <script src="{{asset('js/messenger.js')}}"></script>
        <script>
        const user_id = "{{Auth::id()}}"
          // Enable pusher logging - don't include this in production
          Pusher.logToConsole = true;
        
          var pusher = new Pusher('919d23b51605144faf79', {
            cluster: 'ap2',
            authEndpoint: "/broadcasting/auth",
          });
        
          var channel = pusher.subscribe(`presence-Messenger.${user_id}`);
          channel.bind('new-message', function(data) {
            let img = $('.img2 img').attr('src');
            $('#body-chat').append(
        
        
             `        <small dir="rtl" class="block"> just now</small>
             <div class="flex justify-start mb-4">
                    <img
                      src="${img}"
                      class="object-cover h-8 w-8 rounded-full"
                      alt=""
                    />
                    <div class="ml-2 py-3 px-4 bg-gray-400 rounded-br-3xl rounded-tr-3xl rounded-tl-xl text-white">
                      ${data.message.body}
        
        
                    </div>
                    
                  </div>`
        
        
                
            ) ;
            $('#msg').addClass('dot');
                const audio = new Audio("{{asset('not.mp3')}}");
               audio.play();
           // document.getElementById('scroll').scrollTo(6000, 8000, {queue:true});
        
        
            });
        </script>
        @livewireScripts
        <footer class="relative bg-black pt-8 pb-6">
            <div class="container mx-auto px-4">
              <div class="flex flex-wrap text-left lg:text-left">
                <div class="w-full lg:w-6/12 px-4">
                  <h4 class="text-3xl fonat-semibold text-white">Let's keep in touch!</h4>
                  <h5 class="text-lg mt-0 mb-2 text-white">
                    Find us on any of these platforms, we respond 1-2 business days.
                  </h5>
                  @php
                      $socials = App\Models\SocialMedia::get();
                  @endphp
                  <div class="mt-6 lg:mb-0 mb-6 flex">
                    @foreach ($socials as $s)
                    <a href="{{$s->link}}"><img src="{{asset("uploads/".$s->image)}}" class="h-7"></a>
 
                    @endforeach
                    
                  </div>
                </div>
                <div class="w-full lg:w-6/12 px-4">
                  <div class="flex flex-wrap items-top mb-6">
                    <div class="w-full lg:w-4/12 px-4 ml-auto">
                      <span class="block uppercase text-white text-sm font-semibold mb-2">Useful Links</span>
                      <ul class="list-unstyled">
                        <li>
                          <a class="text-white hover:text-gray-200 font-semibold block pb-2 text-sm" href="{{url('/aboutUs')}}">About Us</a>
                        </li>
                        <li>
                          <a class="text-white hover:text-gray-200 font-semibold block pb-2 text-sm" href="{{url('/blog')}}">Blog</a>
                        </li>
                      </ul>
                    </div>
                    <div class="w-full lg:w-4/12 px-4">
                      <span class="block uppercase text-white text-sm font-semibold mb-2">Other Resources</span>
                      <ul class="list-unstyled">
                        <li>
                          <a class="text-white hover:text-gray-200 font-semibold block pb-2 text-sm" href="{{url('terms&policy')}}">Terms &amp; Conditions</a>
                        </li>
                        <li>
                          <a class="text-white hover:text-gray-200 font-semibold block pb-2 text-sm" href="{{url('terms&policy')}}">Privacy Policy</a>
                        </li>
                        <li>
                          <a class="text-white hover:text-gray-200 font-semibold block pb-2 text-sm" href="contactUs">Contact Us</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <hr class="my-6 border-gray-300">
              <div class="flex flex-wrap items-center md:justify-between justify-center">
                <div class="w-full md:w-4/12 px-4 mx-auto text-center">
                  <div class="text-sm text-white font-semibold py-1">
                    Copyright © <span id="get-current-year">2022</span><a class="text-white hover:text-gray-800" target="_blank"> Chesigner</a>.
                  </div>
                </div>
              </div>
            </div>
          </footer>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </html>
