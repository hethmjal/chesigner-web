<x-app-layout>
    <x-slot name="header">
     
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blog') }} | {{$blog->entitle}}
        </h2>
      
    </x-slot>
    <section class="font-mono bg-gray-50 container mx-auto px-5">
        <div class="flex flex-col items-center py-8">
          <div class="flex flex-col w-full mb-12 text-left">
            <div class="w-full mx-auto lg:w-1/2">
              <h1 class="mx-auto mb-6 text-2xl font-semibold text-black lg:text-3xl">{{$blog->entitle}}</h1>
              <img class="rounded-sm" src="{{asset('uploads/'.$blog->image)}}" />
              <p class="mx-auto text-base font-medium leading-relaxed text-gray-800">{!!$blog->endescription!!}</p>
            </div>
      
            <div class="p-4 mt-4 bg-white border rounded-lg w-full mx-auto lg:w-1/2">
              <div class="flex py-2 mb-4 w-1/2">
                <img width="50px" src="{{asset('uploads/'.$blog->admin->profile_photo_path)}}" />
                <div>
                  <p class="text-sm font-semibold tracking-tight text-black">  {{  $blog->admin->name}}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
    

</x-app-layout>

