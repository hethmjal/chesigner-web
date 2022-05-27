<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notification') }}
        </h2>
    </x-slot>

     
    @if (session('not')) 
    <div class="px-4 py-3 leading-normal text-green-700 bg-green-100 rounded-lg" role="alert">
      <p>    {{session('not')}}
      </p>
    </div>
      
    @endif
    <section class="container mx-auto p-6">
        <div class="w-full mb-8 overflow-hidden rounded-lg">
            <div class="my-3">
                <a class="text-white px-4 py-2 mb-3 w-auto h-10 bg-black rounded-lg hover:bg-gray-900 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" href="{{route('not.asread')}}">
                    <span>{{ __('Mark all as read') }}</span>
                </a>
            </div>
          <div class="w-full overflow-x-auto">

           @foreach ($notificationes as $notify)
               @if ($notify->data['status']  == 'rejected')
               <a href="{{$notify->data['action']}}">

            <div class="mb-4">
                <div class="flex w-10/12 bg-white shadow-md rounded-lg overflow-hidden mx-auto">
                    <div class="w-2 bg-red-600">
                    </div>
                    <div class="w-full flex justify-between items-start px-2 py-2">
                        <div class="flex ml-2">
                            <div>
                                <label class="text-gray-800">{{$notify->data['title']}}</label>
                                <p class="text-gray-500 ">{{$notify->data['body']}}</p>
                              {{--  <label class="text-gray-800">Your submission to order#23 was rejected</label>
                                <p class="text-gray-500 ">Client rejected the work because it didn't match what he/she orderd</p> --}}
                            </div>
                        </div>
                        <p class="text-xs text-gray-400">
                           {{$notify->created_at->diffForHumans()}}
                        </p>
                    </div>
                </div>
          </div>
               </a>
          @endif
          @if ($notify->data['status']  == 'accept')
          <a href="{{$notify->data['action']}}">

          <div class="mb-4">
                <div class="flex w-10/12 bg-white shadow-md rounded-lg overflow-hidden mx-auto">
                    <div class="w-2 bg-green-600">
                    </div>
                    <div class="w-full flex justify-between items-start px-2 py-2">
                        <div class="flex ml-2">
                            <div>
                                <label class="text-gray-800">{{$notify->data['title']}}</label>
                                <p class="text-gray-500 ">   {{$notify->data['body']}} </p>
                               {{-- <label class="text-gray-800">Congrats! you won the challenge#7</label>
                                <p class="text-gray-500 ">You got the best design from client Khaled Ali</p>--}}
                            </div>
                        </div>
                        <p class="text-xs text-gray-400">
                            {{$notify->created_at->diffForHumans()}}
                        </p>
                    </div>
                </div>
            </div>
          </a>
            @endif
          @if ($notify->data['status']  == 'new order')
          <a href="{{$notify->data['action']}}">

          <div class="mb-4">
                <div class="flex w-10/12 bg-white shadow-md rounded-lg overflow-hidden mx-auto">
                    <div class="w-2 bg-green-600">
                    </div>
                    <div class="w-full flex justify-between items-start px-2 py-2">
                        <div class="flex ml-2">
                            <div>
                                <label class="text-gray-800">{{$notify->data['title']}}</label>
                                <p class="text-gray-500 ">   {{$notify->data['body']}} </p>
                               {{-- <label class="text-gray-800">Congrats! you won the challenge#7</label>
                                <p class="text-gray-500 ">You got the best design from client Khaled Ali</p>--}}
                            </div>
                        </div>
                        <p class="text-xs text-gray-400">
                            {{$notify->created_at->diffForHumans()}}
                        </p>
                    </div>
                </div>
            </div>
          </a>
            @endif

          @if ($notify->data['status']  == 'won')
          <a href="{{$notify->data['action']}}">

          <div class="mb-4">
                <div class="flex w-10/12 bg-white shadow-md rounded-lg overflow-hidden mx-auto">
                    <div class="w-2 bg-green-600">
                    </div>
                    <div class="w-full flex justify-between items-start px-2 py-2">
                        <div class="flex ml-2">
                            <div>
                                <label class="text-gray-800">{{$notify->data['title']}}</label>
                                <p class="text-gray-500 ">   {{$notify->data['body']}} </p>
                               {{-- <label class="text-gray-800">Congrats! you won the challenge#7</label>
                                <p class="text-gray-500 ">You got the best design from client Khaled Ali</p>--}}
                            </div>
                        </div>
                        <p class="text-xs text-gray-400">
                            {{$notify->created_at->diffForHumans()}}
                        </p>
                    </div>
                </div>
            </div>
          </a>
            @endif
            @if ($notify->data['status']  == 'accept')
            <a href="{{$notify->data['action']}}">
  
            <div class="mb-4">
                  <div class="flex w-10/12 bg-white shadow-md rounded-lg overflow-hidden mx-auto">
                      <div class="w-2 bg-green-600">
                      </div>
                      <div class="w-full flex justify-between items-start px-2 py-2">
                          <div class="flex ml-2">
                              <div>
                                  <label class="text-gray-800">{{$notify->data['title']}}</label>
                                  <p class="text-gray-500 ">   {{$notify->data['body']}} </p>
                                 {{-- <label class="text-gray-800">Congrats! you won the challenge#7</label>
                                  <p class="text-gray-500 ">You got the best design from client Khaled Ali</p>--}}
                              </div>
                          </div>
                          <p class="text-xs text-gray-400">
                              {{$notify->created_at->diffForHumans()}}
                          </p>
                      </div>
                  </div>
              </div>
            </a>
              @endif

            @if ($notify->data['status']  == 'ask')
            <a href="{{$notify->data['action']}}">

            <div class="mb-4">
                <div class="flex w-10/12 bg-white shadow-md rounded-lg overflow-hidden mx-auto">
                    <div class="w-2 bg-yellow-600">
                    </div>
                    <div class="w-full flex justify-between items-start px-2 py-2">
                        <div class="flex ml-2">
                            <div>
                                
                                <label class="text-gray-800">{{$notify->data['title']}}</label>
                                <p class="text-gray-500 ">{{$notify->data['body']}}</p>
                             {{--  <label class="text-gray-800">Client asked to do some changes on order#74</label>
                                <p class="text-gray-500 ">Order#74 needs some changes, please go to orders->details to see what the changes are</p>--}}
                            </div>
                        </div>
                        <p class="text-xs text-gray-400">
                            {{$notify->created_at->diffForHumans()}}
                        </p>
                    </div>
                </div>
            </div>
            </a>
       @endif

       @if ($notify->data['status']  == 'new features')
       <a href="{{$notify->data['action']}}">

            <div class="mb-4">
                <div class="flex w-10/12 bg-white shadow-md rounded-lg overflow-hidden mx-auto">
                    <div class="w-2 bg-gray-600">
                    </div>
                    <div class="w-full flex justify-between items-start px-2 py-2">
                        <div class="flex ml-2">
                            <div>
                                <label class="text-gray-800">{{$notify->data['title']}}</label> 
                                <p class="text-gray-500 ">{{$notify->data['body']}}</p>

                              {{--  <label class="text-gray-800">We have some new features</label>
                                <p class="text-gray-500 ">Now you can add challenges even...</p>--}}
                            </div>
                        </div>
                        <p class="text-xs text-gray-400">
                            {{$notify->created_at->diffForHumans()}}
                        </p>
                    </div>
                </div>
            </div>
       </a>
       @endif
            @endforeach

        
        </div>
        </div>
    </section>
</x-app-layout>
