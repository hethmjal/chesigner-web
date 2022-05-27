<x-app-layout>
    <x-slot name="header">
     
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Challenges') }}
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
                  <th class="px-4 py-3">{{ __('User') }}</th>
                  <th class="px-4 py-3">{{ __('Created at') }}</th>
                  <th class="px-4 py-3">{{ __('Details') }}</th>
                  <th class="px-4 py-3">{{ __('Subscribe') }}</th>
                  <th class="px-4 py-3"></th>
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
                      @if ($challenge->status == "Active")
                      <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"> 
                        {{__($challenge->status)}}  
                        </span>
                      @else 
                      <span class="px-2 py-1 font-semibold leading-tight text-white bg-red-600 rounded-sm"> 
                        {{__($challenge->status)}}  
                        </span>
                      @endif
                    </td>
                    <td class="px-4 py-3 text-xs border-t">
                      <p>{{__('Expert designers')}} : {{$a}}/{{$challenge->expert}}</p>
                      <p>{{__('Professional designers')}} : {{$b}}/{{$challenge->professional}}</p>
                      <p>{{__('Ordinary designers')}} : {{$c}}/{{$challenge->ordinary}}</p>
                    </td>
                    <td class="px-4 py-3 text-xs border-t">
                      {{$challenge->deadline}} days     
                    
                    </td>
                   
                    <td class="px-4 py-3 text-xs border-t">
                      {{$challenge->user->name}}
                    </td>
                    <td class="px-4 py-3 text-xs border-t">
                      {{$challenge->created_at}} 
                    </td>
                    <td class="px-4 py-3 text-sm border-t"><a class="text-white px-4 py-3 w-auto h-10 bg-black rounded-full hover:bg-gray-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" href="{{ url("/panels/DesignerPanel/Challenges/{$challenge->id}/show") }}">
                      {{ __('Show') }}
                    </a>
                  </td>
                
                  <td class="px-4 py-3 text-sm border-t">
                    @if (!$challenge->designer_order($challenge->id))
                        
                    @if (!$challenge->designer_work($challenge->id))
                    @if (!$challenge->expert == $challenge->remainderofexpert && Auth::user()->degree == 'Expert')
                    <a class="text-white px-4 py-3 w-auto h-10 bg-blue-600 rounded-full hover:bg-gray-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" 
                    href="{{ route("designer.request",$challenge->id) }}" onclick="return confirm('Are you sure you want to Subscribe in this challenge?')">
                    {{ __('join') }}
                  </a>  
                    @endif
                   
                    @if (!$challenge->professional == $challenge->remainderofprofessional  && Auth::user()->degree == 'Professional')
                    <a class="text-white px-4 py-3 w-auto h-10 bg-blue-600 rounded-full hover:bg-gray-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" 
                    href="{{ route("designer.request",$challenge->id) }}" onclick="return confirm('Are you sure you want to Subscribe in this challenge?')">
                    {{ __('join') }}
                  </a>  
                    @endif

                    @if (!$challenge->ordinary == $challenge->remainderofordinary  && Auth::user()->degree == 'Ordinary')
                    <a class="text-white px-4 py-3 w-auto h-10 bg-blue-600 rounded-full hover:bg-gray-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" 
                    href="{{ route("designer.request",$challenge->id) }}" onclick="return confirm('Are you sure you want to Subscribe in this challenge?')">
                    {{ __('join') }}
                  </a>  
                    @endif

                  @endif
                  @endif

                </td>
                <td class="px-4 py-3 text-sm border-t"><a class="text-red-600 px-4 py-3 w-auto h-10 bg-white rounded-full border-2 border-red-600 hover:bg-red-300 active:shadow-lg hover:text-white mouse shadow transition ease-in duration-200 focus:outline-none" href="{{route('favorite',$challenge->id)}}">
                  {{ __('favorites') }}
                </a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
    </section>
</x-app-layout>
