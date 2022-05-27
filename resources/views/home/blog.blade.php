<x-app-layout>
    <x-slot name="header">
     
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blog page') }}
        </h2>
      
    </x-slot>
    <div class="p-5 grid grid-cols-3">
@foreach ($blogs as $blog)
    
        <div class="mx-auto">
            <div class="bg-white shadow-md border border-gray-200 rounded-lg max-w-sm mb-5">
                <a href="#">
                    <img class="rounded-t-lg" src="{{asset('uploads/'.$blog->image)}}" alt="">
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="text-gray-900 font-bold text-2xl tracking-tight mb-2">{{$blog->entitle}}</h5>
                    </a>
                    <p class="font-normal text-gray-700 mb-3">{{strip_tags(Str::words($blog->endescription,30))}}</p>
                    <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center" href="{{route('showblog',$blog->id)}}">
                        {{__('Read more')}}
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    

</x-app-layout>
