<x-app-layout>
  <x-slot name="header">
   
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Designers Panel') }}
      </h2>
    
  </x-slot>
  @if (session('success')) 
  <div class="px-4 py-3 leading-normal text-green-700 bg-green-100 rounded-lg" role="alert">
    <p class="font-bold">Success!</p>
    <p>    {{session('success')}}
    </p>
  </div>
    
  @endif

  <section class="container mx-auto p-6">
    <div class="mt-3"></div>
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
        <div class="text-center">
          <h2><strong class="text-black">{{ __('Clients') }}</strong></h2>
        </div>
        <div class="w-full overflow-x-auto">
          <table class="w-full">
            <thead>
              <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                <th class="px-4 py-3">{{ __('ID') }}</th>
                <th class="px-4 py-3">{{ __('Name') }}</th>
                <th class="px-4 py-3">{{ __('Email') }}</th>
                <th class="px-4 py-3">{{ __('Phone') }}</th>
                <th class="px-4 py-3">{{ __('Status') }}</th>
                <th class="px-4 py-3">{{ __('Profile') }}</th>
                <th class="px-4 py-3">{{ __('Orders') }}</th>
                <th class="px-4 py-3">{{ __('Challenges') }}</th>
                <th class="px-4 py-3">{{ __('Subscriptions') }}</th>
                <th class="px-4 py-3">{{ __('Reports') }}</th>
                <th class="px-4 py-3">{{ __('Join in') }}</th>
                <th class="px-4 py-3">{{ __('Change Status') }}</th>
              </tr>
            </thead>
            <tbody class="bg-white">
              @foreach ($designers as $designer)
                  
              <tr class="text-gray-700 text-center">
                  <td class="px-4 py-3 text-xs border-t">
                    {{$designer->id}}
                  </td>
                  <td class="px-4 py-3 border-t">
                  <div class="items-center text-sm flex">
                      <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                          <img class="object-cover w-full h-full rounded-full" src="{{asset('uploads/'.$designer->profile_photo_path)}}">
                          <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                      </div>
                      <div>
                        {{$designer->name}}
                      </div>
                  </div>
                  </td>
                  <td class="px-4 py-3 text-xs border-t">
                    <a href="mailto:mohammad@test.test">{{$designer->email}}</a>
                  </td>
                  <td class="px-4 py-3 text-xs border-t">
                    {{$designer->phone}}
                  </td>                           
                  <td class="px-4 py-3 text-xs border-t">
                    @if ($designer->status == "Active")
                    <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"> {{__($designer->status)}} </span>

                    @else
                    <span class="px-2 py-1 font-semibold leading-tight text-white bg-red-700 rounded-sm"> {{__($designer->status)}} </span>

                    @endif
                  </td>
                  <td class="px-4 py-3 text-sm border-t"><a class="text-white px-4 py-3 w-auto h-10 bg-black rounded-full hover:bg-gray-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" href="{{route('designer.profile',$designer->id)}}">
                      {{ __('profile') }}
                    </a>
                  </td>
                  <td class="px-4 py-3 text-sm border-t"><a class="text-white px-4 py-3 w-auto h-10 bg-black rounded-full hover:bg-gray-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" href="{{ url("/panels/AdminPanel/DesignersPanel/{$designer->id}/Orders") }}">
                      {{ __('orders') }}
                    </a>
                  </td>
                  <td class="px-4 py-3 text-sm border-t"><a class="text-white px-4 py-3 w-auto h-10 bg-black rounded-full hover:bg-gray-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" href="{{ url("/panels/AdminPanel/DesignersPanel/{$designer->id}/Challenges") }}">
                      {{ __('challenges') }}
                    </a>
                  </td>
                  <td class="px-4 py-3 text-sm border-t"><a class="text-white px-4 py-3 w-auto h-10 bg-black rounded-full hover:bg-gray-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" href="{{ url("/panels/AdminPanel/DesignersPanel/{$designer->id}/Subscription") }}">
                      {{ __('subscriptions') }}
                    </a>
                  </td>
                  <td class="px-4 py-3 text-sm border-t"><a class="text-white px-4 py-3 w-auto h-10 bg-black rounded-full hover:bg-gray-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" href="{{ url("/panels/AdminPanel/reportsPanel/{$designer->id}/showDesigner") }}">
                      {{ __('reports') }}
                    </a></td>
                  <td class="px-4 py-3 text-xs border-t">
                    {{$designer->created_at}}
                  </td>
                  <td class="px-4 py-3 text-sm border-t"><a class="text-white px-4 py-3 w-auto h-10 bg-blue-600 rounded-full hover:bg-blue-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" onclick="openModal('statusEdit{{$designer->id}}')">
                    {{ __('Edit') }}
                  </a></td>
              </tr>
              <dialog id="statusEdit{{$designer->id}}" class="bg-transparent z-0 relative w-screen h-screen">
                <form action="{{route('designer.changestatus',$designer->id)}}" enctype="multipart/form-data" method="post">
                  @csrf
                <div class="py-3 sm:max-w-xl sm:mx-auto">
                  <div class="bg-white min-w-1xl flex flex-col rounded-xl shadow-lg">
                    <div class="px-12 py-5">
                      <h2 class="text-gray-800 text-3xl font-semibold">{{$designer->name}}</h2>
                    </div>
                    <div class="bg-gray-200 w-full flex flex-col items-center">
                      <div class="flex flex-col items-center py-6 space-y-3">
                        <span class="text-lg text-gray-800">{{__('Edit client account')}} - {{$designer->email}}</span>
                        <div class="flex space-x-3">
                          <select name="status" id="" class="p-2 text-gray-500 rounded-xl resize-none">
                              <option value="unActive">{{__('Not active')}}</option>
                              <option value="Active">{{__('Active')}}</option>
                          </select>
                        </div>
                      </div>
                      <div class="w-3/4 flex flex-col">
                          <button class="py-3 my-8 text-lg bg-gradient-to-r from-purple-500 to-indigo-600 rounded-xl text-white">{{__('Change')}}</button>
                        </div>
                    </div>
                    
                    <div class="h-20 flex items-center justify-center">
                      <a onclick="modalClose('statusEdit{{$designer->id}}')" class="text-gray-600">{{__('Close')}}</a>
                    </div>
                  </div>
                </div>
              </form>
            </dialog>
              @endforeach

            
            </tbody>
          </table>
          
        </div>
      </div>
  </section>
  <script src="{{asset('/js/modalpopup.js')}}"></script>
</x-app-layout>
