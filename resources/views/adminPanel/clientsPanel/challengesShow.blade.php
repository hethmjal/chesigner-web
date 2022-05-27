<x-app-layout>
    <x-slot name="header">     
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mohammd's {{ __('Challenges') }}
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
      <div class="mt-3">
        <a class="text-white px-4 py-2 mb-3 w-auto h-10 bg-black rounded-full hover:bg-gray-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" href="{{ url('/panels/AdminPanel/clientsPanel') }}">
          <span>{{ __('Back') }}</span>
        </a>
      </div>
      <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
          <div class="text-center">
            <h2><strong class="text-black">{{ __('Challenges') }}</strong></h2>
          </div>
          <div class="w-full overflow-x-auto">
            <table class="w-full">
              <thead>
                <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                  <th class="px-4 py-3">{{ __('ID') }}</th>
                  <th class="px-4 py-3">{{ __('Challenges Explanition') }}</th>
                  <th class="px-4 py-3">{{ __('Title') }}</th>
                  <th class="px-4 py-3">{{ __('Type') }}</th>
                  <th class="px-4 py-3">{{ __('Designers') }}</th>
                  <th class="px-4 py-3">{{ __('Status') }}</th>
                  <th class="px-4 py-3">{{ __('Work Submitted') }}</th>
                  <th class="px-4 py-3">{{ __('Deadline') }}</th>
                  <th class="px-4 py-3">{{ __('Created at') }}</th>
                  <th class="px-4 py-3">{{ __('Details') }}</th>
                  <th class="px-4 py-3">{{ __('Edit') }}</th>
                </tr>
              </thead>
              <tbody class="bg-white">
                @foreach ($challenges as $challenge)
                    
                <tr class="text-gray-700">
                    <td class="px-4 py-3 text-xs border-t">
                    {{$challenge->id}}
                    </td>
                    <td class="px-4 py-3 border-t">
                    <div class="items-center text-sm">
                        <div class="relative w-32 h-32 mr-3 md:block">
                            <img class="object-cover w-full h-full" src="{{asset('uploads/'.$challenge->image)}}">
                        </div>
                    </div>
                    </td>
                    <td class="px-4 py-3 text-xs border-t">
                      {{$challenge->title}}
                    </td>
                    <td class="px-4 py-3 text-xs border-t">
                      {{$challenge->design_type}}
                    </td>                           
                    <td class="px-4 py-3 text-xs border-t">
                      @php
                    
                      //number of designer submit work
                          $a=0;
                          $b=0;
                          $c=0;
                      $expert = $challenge->expert;
                      $professional=$challenge->professional;
                      $ordinary=$challenge->ordinary;
                          foreach($challenge->works as $work){
                     
                     if ($work->designer->degree == "Expert"){
                      if ($work->submit_work == 'yes') {
                        ++$a;
                      }

                      }   
                     
                    if($work->designer->degree == "Professional") {
                      if ($work->submit_work == 'yes') {
                        ++$b;
                      }                    
                    } 

                     
                     if($work->designer->degree == "Ordinary") {
                       
                       if ($work->submit_work == 'yes') {
                        ++$c;
                      }
                      }  
                       
                    }
                                
                      @endphp

                      <p>{{__('Expert designers')}} : {{$challenge->remainderofexpert}}/{{$challenge->expert}}</p>
                      <p>{{__('Professional designers')}} : {{$challenge->remainderofprofessional}}/{{$challenge->professional}}</p>
                      <p>{{__('Ordinary designers')}} : {{$challenge->remainderofordinary}}/{{$challenge->ordinary}}</p>

                                      
                    </td>
                    <td class="px-4 py-3 text-xs border-t">
                      @if ($challenge->adminstatus == "Active")
                      <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"> 
                        {{__($challenge->adminstatus)}}  
                        </span>
                      @else 
                      <span class="px-2 py-1 font-semibold leading-tight text-white bg-red-600 rounded-sm"> 
                        {{__($challenge->adminstatus)}}  
                        </span>
                      @endif
                    </td>
                    <td class="px-4 py-3 text-xs border-t">
                      <p>{{__('Expert designers')}} : {{$a}}/{{$challenge->expert}}</p>
                      <p>{{__('Professional designers')}} : {{$b}}/{{$challenge->professional}}</p>
                      <p>{{__('Ordinary designers')}} : {{$c}}/{{$challenge->ordinary}}</p>
                    </td>
                    <td class="px-4 py-3 text-xs border-t">
                      {{$challenge->created_at}}                   </td>
                    <td class="px-4 py-3 text-xs border-t">
                      {{$challenge->deadline}}                        </td>
                    <td class="px-4 py-3 text-sm border-t"><a class="text-white px-4 py-3 w-auto h-10 bg-black rounded-full hover:bg-gray-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" href="{{ url("/panels/UserPanel/Challenges/{$challenge->id}/show") }}">
                      {{ __('Show') }}
                    </a></td>
                    <td class="px-4 py-3 text-sm border-t"><a class="text-white px-4 py-3 w-auto h-10 bg-blue-600 rounded-full hover:bg-blue-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" onclick="openModal('status{{$challenge->id}}')">
                      {{ __('Edit') }}
                    </a></td>
                </tr>
                <dialog id="status{{$challenge->id}}" class="bg-transparent z-0 relative w-screen h-screen">
                  <form action="{{route('updatechallenge2',$work->challenge->id)}}" method="post">
                    @csrf
      <input type="hidden" name="id" value="{{$challenge->user_id}}">
                    <div class="py-3 sm:max-w-xl sm:mx-auto">
                      <div class="bg-white min-w-1xl flex flex-col rounded-xl shadow-lg">
                        <div class="px-12 py-5">
                          <h2 class="text-gray-800 text-3xl font-semibold">{{$challenge->title}}</h2>
                        </div>
                        <div class="bg-gray-200 w-full flex flex-col items-center">
                          <div class="flex flex-col items-center py-6 space-y-3">
                            <span class="text-lg text-gray-800">{{__('Change the status')}}</span>
                            <div class="flex space-x-3">
                              <select name="adminstatus" id="" class="p-2 text-gray-500 rounded-xl resize-none">
                                  <option value="Not active">{{__('Not active')}}</option>
                                  <option value="Active">{{__('Active')}}</option>
                              </select>
                            </div>
                          </div>
  
                          <div class="w-3/4 flex flex-col">
                            <button class="py-3 my-8 text-lg bg-gradient-to-r from-purple-500 to-indigo-600 rounded-xl text-white">{{__('Change')}}</button>
                          </div>
                        </div>
                        <div class="h-20 flex items-center justify-center">
                          <a onclick="modalClose('status{{$challenge->id}}')" class="text-gray-600">{{__('Cancel')}}</a>
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
