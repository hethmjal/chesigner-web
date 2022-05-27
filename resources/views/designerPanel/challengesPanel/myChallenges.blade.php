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
      <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
        <div class="text-center">
          <h2><strong class="text-black">{{ __('My Challenges') }}</strong></h2>
        </div>
        <div class="w-full overflow-x-auto">
          <table class="w-full">
            <thead>
              <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                <th class="px-4 py-3">{{ __('ID') }}</th>
                <th class="px-4 py-3">{{ __('Challenge Explanition') }}</th>
                <th class="px-4 py-3">{{ __('Title') }}</th>
                <th class="px-4 py-3">{{ __('Design Type') }}</th>
                <th class="px-4 py-3">{{ __('Client') }}</th>
                <th class="px-4 py-3">{{ __('Deadline') }}</th>
                <th class="px-4 py-3">{{ __('Status') }}</th>
                <th class="px-4 py-3">{{ __('Submited Works') }}</th>
                <th class="px-4 py-3">{{ __('Rank') }}</th>
                <th class="px-4 py-3">{{ __('Created at') }}</th>
                <th class="px-4 py-3">{{ __('Details') }}</th>
                <th class="px-4 py-3">{{ __('Submit Work') }}</th>
              </tr>
            </thead>
            <tbody class="bg-white">
                  @foreach ($challenges as $challenge)
                      
              <tr class="text-gray-700">
                  <td class="px-4 py-3 text-xs border-t">
                  {{$challenge->challenge->id}}
                  </td>
                  <td class="px-4 py-3 border-t">
                  <div class="items-center text-sm">
                      <div class="relative w-32 h-32 mr-3 md:block">
                          <img class="object-cover w-full h-full" src="{{asset('uploads/'.$challenge->challenge->image)}}">
                      </div>
                  </div>
                  </td>
                  <td class="px-4 py-3 text-xs border-t">
                    {{$challenge->challenge->title}}

                  </td>
                  <td class="px-4 py-3 text-xs border-t">
                    {{$challenge->challenge->design_type}}

                  </td>
                  <td class="px-4 py-3 text-xs border-t">
                    {{$challenge->challenge->user->name}}

                  </td>
               
                  <td class="px-4 py-3 text-xs border-t">
                    {{$challenge->challenge->deadline}} days
                  </td>
                  <td class="px-4 py-3 text-xs border-t">
                    @if ($challenge->challenge->status == "Active")
                      <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"> 
                        {{__($challenge->challenge->status)}}  
                        </span>
                      @else 
                      <span class="px-2 py-1 font-semibold leading-tight text-white bg-red-600 rounded-sm"> 
                        {{__($challenge->challenge->status)}}  
                        </span>
                      @endif
                  </td>
                  @php
                    
                  //number of designer submit work
                      $a=0;
                      $b=0;
                      $c=0;
                  $expert = $challenge->challenge->expert;
                  $professional=$challenge->challenge->professional;
                  $ordinary=$challenge->challenge->ordinary;
                      foreach($challenge->challenge->works as $work){
                 
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

                  <td class="px-4 py-3 text-xs border-t">
                    <p>{{__('Expert designers')}} : {{$a}}/{{$challenge->challenge->expert}}</p>
                    <p>{{__('Professional designers')}} : {{$b}}/{{$challenge->challenge->professional}}</p>
                    <p>{{__('Ordinary designers')}} : {{$c}}/{{$challenge->challenge->ordinary}}</p>
                  </td>

                  <td class="px-4 py-3 text-xs border-t">
                    @if ($challenge->rank)
                    {{$challenge->rank}}
                    @else
                                      __
                    @endif
                  </td>
                  <td class="px-4 py-3 text-xs border-t">
                    {{$challenge->challenge->created_at}}
                  </td>
                  <td class="px-4 py-3 text-sm border-t"><a class="text-white px-4 py-3 w-auto h-10 bg-blue-600 rounded-full hover:bg-blue-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" href="{{ url("/panels/DesignerPanel/Challenges/{$challenge->challenge->id}/show") }}">
                    {{ __('Show') }}
                  </a></td>
                  <td class="px-4 py-3 text-sm border-t">

                  @if ($challenge->challenge->status == "Active")
                    <form action="" method="post">
                      <a class="text-white px-4 py-3 w-auto h-10 bg-black rounded-full hover:bg-gray-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" href="{{ url("/panels/DesignerPanel/Challenges/MyChallenges/{$challenge->id}/submitWork") }}">
                        {{ __('Add') }}
                      </a>
                    </form>
                  @endif
                </td>  

                  
              </tr>
              @endforeach

            </tbody>
          </table>
        </div>
      </div>
  </section>
</x-app-layout>
