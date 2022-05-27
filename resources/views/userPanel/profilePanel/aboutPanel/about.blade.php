<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Profile') }}
        </h2>
    </x-slot>
    
    <section class="mx-auto">
        <div class="w-full mb-8 overflow-hidden rounded-lg">
                <main class="w-full">
                  <div class="container mx-auto px-4">
                    <img src="{{asset('uploads/'.Auth::user()->background_photo_path)}}"  alt="">
                  </div>
                    <section class="relative py-16">
                      <div class="container mx-auto px-4">
                        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-16">
                          <div class="px-6">
                            <div class="flex flex-wrap justify-center">
                              <div class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center">
                                <div>
                                  <img src="{{asset('uploads/'.Auth::user()->profile_photo_path)}}" class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 w-32">
                                </div>
                              </div>
                              <div class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center">
                                <div class="py-6 px-3 mt-32 sm:mt-0">
                                  <a class="bg-black active:bg-gray-800 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150" href="{{url('/panels/UserPanel/MyProfile/profileavatar')}}">
                                    {{ __('Edit profile photo and header') }}
                                  </a>
                                </div>
                              </div>
                              <div class="w-full lg:w-4/12 px-4 lg:order-1">
                                <div class="flex justify-center py-4 lg:pt-4 pt-8">
                                
                                 
                                  <div class="lg:mr-4 p-3 text-center">
                                    <span class="text-xl font-bold block uppercase tracking-wide text-gray-600">{{count(Auth::user()->challenges)}}</span><span class="text-sm text-gray-400">{{__('Challenge')}}</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="text-center mt-12">
                              <h3 class="text-4xl font-semibold leading-normal text-gray-700 mb-2">
                                {{Auth::user()->name}}
                              </h3>
                              <div class="text-sm leading-normal mt-0 mb-2 text-gray-400 font-bold uppercase">
                                <i class="fas fa-map-marker-alt mr-2 text-lg text-gray-400"></i>
                                Riyadh, Saudi Arabia
                              </div>
                            </div>
                          </div>
                          <div class="mt-10 py-10 border-t border-gray-200 text-center">
                          
                                <p class="mb-2 text-3xl text-gray-700 font-bold">{{ __('My challenges') }}</p>
                               
                                <br>


                                    <section class="container mx-auto p-6">
                                      <div class="mt-3">
                                        <a class="text-white px-4 py-2 mb-3 w-auto h-10 bg-green-600 rounded-full hover:bg-green-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" href="{{ url('/panels/UserPanel/Challenges/newChallenge') }}">
                                          <span>{{ __('Add new challenge') }}</span>
                                        </a>
                                      </div>
                                      <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                                       
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
                                                @foreach (Auth::user()->challenges as $challenge)
                                                    
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
                                                      {{$challenge->created_at}}                   </td>
                                                    <td class="px-4 py-3 text-xs border-t">
                                                      {{$challenge->deadline}}                        </td>
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



                            
                                <br>
                             
                          </div>
                        </div>
                      </div>
                    </section>
                  </main>
        </div>
    </section>
</x-app-layout>
