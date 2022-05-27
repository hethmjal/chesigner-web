<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My clients') }}
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
            <div class="my-5">
            <a href="{{url('/panels/UserPanel/Challenges')}}" class="p-3 bg-black text-white rounded">{{ __('Back') }}</a>
          </div>
          <div class="text-center">
            <h2><strong class="text-black">{{ __('Client who requested to subscribe') }}</strong></h2>
          </div>
          <div class="w-full overflow-x-auto">
            <table class="w-full">
                <thead>
                  <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                    <th class="px-4 py-3">{{ __('ID') }}</th>
                    <th class="px-4 py-3">{{ __('Client name') }}</th>
                    <th class="px-4 py-3">{{ __('Package name') }}</th>
                    <th class="px-4 py-3">{{ __('#Of Challenges') }}</th>
                    <th class="px-4 py-3">{{ __('Request date') }}</th>
                    <th class="px-4 py-3">{{ __('Join in') }}</th>
                    <th class="px-4 py-3">{{ __('View profile') }}</th>
                    <th class="px-4 py-3"></th>
                    <th class="px-4 py-3"></th>
                  </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($requests as $req)
                        
                  <tr class="text-gray-700">
                      <td class="px-4 py-3 text-xs border-t">
                      {{$req->id}}
                      </td>
                      <td class="px-4 py-3 border-t">
                      <div class="flex items-center text-sm">
                          <div class="items-center text-sm">
                              <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                                  <img class="object-cover w-full h-full rounded-full" src="{{asset('uploads/'.$req->designer->profile_photo_path)}}">
                                  <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                              </div>
                          </div>
                          <div>
                            {{$req->user->name}}
                          </div>
                      </div>
                      </td>
                      <td class="px-4 py-3 text-xs border-t">
                        {{$req->package->name}}
                      </td>
                      <td class="px-4 py-3 text-xs border-t">
                        {{$req->user->challenges->count()}}
                      </td>
                      <td class="px-4 py-3 text-xs border-t">
                        {{$req->created_at}}
                      </td>
                      <td class="px-4 py-3 text-xs border-t">
                        {{$req->user->created_at}}
                      </td>
                      <td class="px-4 py-3 text-sm border-t"><a class="text-white px-4 py-3 w-auto h-10 bg-black rounded-full hover:bg-gray-800 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" href="">
                        {{ __('View') }}
                      </a>
                    </td>
                    <td class="px-4 py-3 text-sm border-t">
                   
                      <a class="text-white px-4 py-3 w-auto h-10 bg-green-600 rounded-full hover:bg-green-800 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" href="{{route('request.accept',$req->id)}}" onclick="return confirm('Are you sure you want to Accept?')">
                        {{ __('Accept') }}
                        </a>
                </td>
                <td class="px-4 py-3 text-sm border-t">
                
                      <a class="text-white px-4 py-3 w-auto h-10 bg-red-600 rounded-full hover:bg-red-800 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" href="{{route('request.reject',$req->id)}}" onclick="return confirm('Are you sure you want to Reject?')">
                        {{ __('Reject') }}
                      </a>
                  </td>
                  </tr>  

                  @endforeach

                </tbody>
              </table>
          </div>
          <br>
          <hr>
          <br>
          <div class="text-center">
            <h2><strong class="text-black">{{ __('List of clients') }}</strong></h2>
          </div>
         
          <div class="grid grid-cols-3 gap-4">
            @foreach($subs as $sub)

            <a href="{{url('/panels/DesignerPanel/MyClients/'.$sub->id)}}">
                <div class="c-card block bg-white shadow-md hover:shadow-xl rounded-lg overflow-hidden">
                    <img class="lg:h-60 xl:h-56 md:h-64 sm:h-72 xs:h-72 h-72 rounded w-full object-cover object-center mb-4"  src="{{asset('uploads/'.$sub->designer->background_photo_path)}}"/>
                    <div class="p-4">
                        <h3 class="text-indigo-500 text-xs font-medium title-font">
                        {{__('Subsecription date')}}{{$sub->created_at}}
                        </h3>
                        <h2 class="text-lg text-gray-900 font-medium title-font mb-1 whitespace-nowrap truncate">
                        {{$sub->package->name}}
                        </h2>
                        <p class="text-gray-600 font-light text-md whitespace-nowrap truncate">
                       
                        </p>
                        <p class="text-gray-600 font-light text-md whitespace-nowrap truncate">
                          {{$sub->package->price}} SAR / monthly
                        </p>
                        <div class="py-4 border-t border-b text-xs text-gray-700">
                        <div class="grid grid-cols-4 gap-1">
                            <div class="col-span-2">
                                {{__('Design done')}}:
                            <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white
                                bg-green-400 rounded-full">   {{$sub->done}}  
                            </span>
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
                        <img class="w-10 h-10 object-cover rounded-full" src="{{asset('uploads/'.$sub->user->profile_photo_path)}}"/>
                        <div class="pl-3">
                            <div class="font-medium"> {{$sub->user->name}}</div>
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
