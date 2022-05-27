<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Designers') }}
        </h2>
    </x-slot>
    @if (session('status')) 
    <div class="px-4 py-3 leading-normal text-green-700 bg-green-100 rounded-lg" role="alert">
      <p class="font-bold">Success!</p>
      <p>    {{session('status')}}
      </p>
    </div>
      
    @endif
    <section class="container mx-auto p-6">
        <div class="w-full mb-8 overflow-hidden rounded-lg">
          <div class="text-center">
            <h2><strong class="text-black">{{ __('List of designers') }}</strong></h2>
          </div>

              
          <div class="grid grid-cols-3 gap-4">
            @foreach ($subs as $sub)

              <a href="{{route('myDesignersOrders',$sub->id)}}">
                <div class="c-card block bg-white shadow-md hover:shadow-xl rounded-lg overflow-hidden">
                    <img class="lg:h-60 xl:h-56 md:h-64 sm:h-72 xs:h-72 h-72 rounded w-full object-cover object-center mb-4" src="{{asset('uploads/'.$sub->user->background_photo_path)}}"/>
                    <div class="p-4">
                        <h3 class="text-indigo-500 text-xs font-medium title-font">
                            {{__('Subsecription date')}} {{$sub->created_at}}
                        </h3>
                        <h2 class="text-lg text-gray-900 font-medium title-font mb-1 whitespace-nowrap truncate">
                            {{$sub->package->name }}
                        </h2>
                        <p class="text-gray-600 font-light text-md whitespace-nowrap truncate">
                        </p>
                        <p class="text-gray-600 font-light text-md whitespace-nowrap truncate">
                            {{$sub->package->price}}  SAR / monthly
                        </p>
                        <div class="py-4 border-t border-b text-xs text-gray-700">
                            <div class="grid grid-cols-4 gap-1">
                                <div class="col-span-2">
                                    {{__('Design done')}}:
                                    <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white
                                    bg-green-400 rounded-full"> {{$sub->done}}  </span>
                            </div>
                            
                            <div class="col-span-2">
                                {{__('Design left')}}:
                                <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white bg-blue-400 rounded-full">
                                    {{$sub->left}}   
                                    </sup></span
                            >
                        </div>
                    </div>
                        </div>
                        
                        <div class="flex items-center mt-2">
                            <img class="w-10 h-10 object-cover rounded-full" src="{{asset('uploads/'.$sub->designer->profile_photo_path)}}"/>
                            <div class="pl-3">
                                <div class="font-medium">{{$sub->designer->name}}</div>
                                <div class="text-gray-600 text-sm">{{__('Professional')}}</div>
                        </div>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach

        </div>
        </div>
    </section>
</x-app-layout>
