<x-app-layout>
    <x-slot name="header">
     
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('About Us') }}
        </h2>
      
    </x-slot>
    <div class='flex items-center justify-center min-h-screen'>
        <section class="text-center mx-6 lg:w-2/3">
           <img class="m-auto w-full lg:w-full" src="{{asset('/images/chesigner-logo.png')}}" />
           <h1 class="mt-2 mb-1 text-2xl lg:text-3xl">We'll be back soon!</h1>
           <div>
               <p>
                 {!!$about->enbody!!}
                   <a class="text-blue-700 font-semibold hover:underline hover:decoration-wavy" href="https://twitter.com/_pharmawala">Twitter</a> for more updates.
               </p>
               <p class="mt-4">Team Pharmawala</p>
           </div>
           <div>
            <p>
              {!!$about->arbody!!}
                <a class="text-blue-700 font-semibold hover:underline hover:decoration-wavy" href="https://twitter.com/_pharmawala">Twitter</a> for more updates.
            </p>
            <p class="mt-4">Team Pharmawala</p>
        </div>
       </section>
    </div>
    

</x-app-layout>
