<x-app-layout>
    <x-slot name="header">     
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Challenges') }}
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
        <a class="text-white px-4 py-2 mb-3 w-auto h-10 bg-green-600 rounded-full hover:bg-green-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" href="{{ url('/panels/UserPanel/Challenges/newChallenge') }}">
          <span>{{ __('Add new challenge') }}</span>
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
                  <th class="px-4 py-3">{{ __('Delete') }}</th>
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
                      {{$challenge->deadline}}  days                  </td>
                    <td class="px-4 py-3 text-xs border-t">
                      {{$challenge->created_at}}                        </td>
                    <td class="px-4 py-3 text-sm border-t"><a class="text-white px-4 py-3 w-auto h-10 bg-black rounded-full hover:bg-gray-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" href="{{ url("/panels/UserPanel/Challenges/{$challenge->id}/show") }}">
                      {{ __('Show') }}
                    </a></td>
                    <td class="px-4 py-3 text-sm border-t"><a class="text-white px-4 py-3 w-auto h-10 bg-blue-600 rounded-full hover:bg-blue-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" href="{{ url("/panels/UserPanel/Challenges/{$challenge->id}/editChallenge") }}">
                      {{ __('Edit') }}
                    </a></td>
                    @if (count($challenge->works)==0)
                        
                    <td class="px-4 py-3 text-sm border-t">
                        <form action="{{route('challengeuseresource.destroy',$challenge->id)}}" method="post">
                          @method('delete')
                          @csrf
                            <button class="text-white px-4 w-auto h-10 bg-red-600 rounded-full hover:bg-red-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" type="submit" onclick="return confirm('Are you sure you want to delete?')">
                            {{ __('Delete') }}
                            </button>
                        </form>
                    </td>
                    @endif

                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
    </section>
</x-app-layout>
