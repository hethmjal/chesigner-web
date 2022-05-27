<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Challenges') }} | Show #{{$challenge->id}}
        </h2>
    </x-slot>
    @if (session('success')) 
    <div class="px-4 py-3 leading-normal text-green-700 bg-green-100 rounded-lg" role="alert">
      <p class="font-bold">Success!</p>
      <p>    {{session('success')}}
      </p>
    </div>
      
    @endif
    @if (session('error')) 
    <div class="px-4 py-3 leading-normal text-red-700 bg-green-100 rounded-lg" role="alert">
      <p class="font-bold">Error!</p>
      <p>    {{session('error')}}
      </p>
    </div>
      
    @endif
    <section class="container mx-auto p-6">
        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
          <div class="my-5">
            <a href="{{url('/panels/UserPanel/Challenges')}}" class="p-3 bg-black text-white rounded">{{ __('Back') }}</a>
          </div>
          <div class="text-center">
            <h2><strong class="text-black">{{ __('Designers request to join') }}</strong></h2>
          </div>
          <div class="w-full overflow-x-auto">
            <table class="w-full">
                <thead>
                  <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                    <th class="px-4 py-3">{{ __('ID') }}</th>
                    <th class="px-4 py-3">{{ __('Designer name') }}</th>
                    <th class="px-4 py-3">{{ __('Rates') }}</th>
                    <th class="px-4 py-3">{{ __('package') }}</th>
                    <th class="px-4 py-3">{{ __('Experience') }}</th>
                    <th class="px-4 py-3">{{ __('Number of works') }}</th>
                    <th class="px-4 py-3">{{ __('Join in') }}</th>
                    <th class="px-4 py-3">{{ __('View profile') }}</th>
                    <th class="px-4 py-3"></th>
                    <th class="px-4 py-3"></th>
                  </tr>
                </thead>
                <tbody class="bg-white">
                   @foreach ($challenge->orders as $order)
                       
                  <tr class="text-gray-700">
                      <td class="px-4 py-3 text-xs border-t">
                      {{$order->id}}
                      </td>
                      <td class="px-4 py-3 border-t">
                      <div class="flex items-center text-sm">
                          <div class="items-center text-sm">
                              <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                                  <img class="object-cover w-full h-full rounded-full" src="{{asset('uploads/'.$order->designer->profile_photo_path)}}">
                                  <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                              </div>
                          </div>
                          @php
                          $rate =   App\Models\Evaluation::where('designer_id',$order->designer_id)->get();
                              $rate_avg =   App\Models\Evaluation::where('designer_id',$order->designer_id)->avg('rate');
                          @endphp

                          <div>
                            {{$order->designer->name}}
                          </div>
                      </div>
                      </td>
                      <td class="px-4 py-3 text-xs border-t">
                      {{$rate_avg}}/5 <small class="text-sm">({{count($rate)}} rates)</small>
                      </td>
                      <td class="px-4 py-3 text-xs border-t">
                          Package
                      </td>
                      <td class="px-4 py-3 text-xs border-t">{{$order->designer->degree}}</td>
                      <td class="px-4 py-3 text-xs border-t">
                        {{count($order->designer->orders_work)}}
                      </td>
                      <td class="px-4 py-3 text-xs border-t">
                        {{$order->created_at}}
                      </td>
                      <td class="px-4 py-3 text-sm border-t"><a class="text-white px-4 py-3 w-auto h-10 bg-black rounded-full hover:bg-gray-800 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" href="{{route('viewDesigner',$order->designer_id)}}">
                        {{ __('View') }}
                      </a>
                    </td>
                    <td class="px-4 py-3 text-sm border-t">
                   
                          <a class="text-white px-4 py-3 w-auto h-10 bg-green-600 rounded-full hover:bg-green-800 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" href="{{route('order.accept',$order->id)}}" onclick="return confirm('Are you sure you want to Accept?')">
                          {{ __('Accept') }}
                          </a>
                  </td>
                  <td class="px-4 py-3 text-sm border-t">
                  
                        <a class="text-white px-4 py-3 w-auto h-10 bg-red-600 rounded-full hover:bg-red-800 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" href="{{route('order.reject',$order->id)}}" onclick="return confirm('Are you sure you want to Reject?')">
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
            <h2><strong class="text-black">{{ __('Details') }}</strong></h2>
          </div>
          <div class="w-full overflow-x-auto">
            <table class="w-full">
              <thead>
                <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                  <th class="px-4 py-3">{{ __('Challenge Explanition') }}</th>
                  <th class="px-4 py-3">{{ __('Title') }}</th>

                  <th class="px-4 py-3">{{ __('Design Type') }}</th>
                  <th class="px-4 py-3">{{ __('Designer') }}</th>
                  <th class="px-4 py-3">{{ __('Status') }}</th>
                  <th class="px-4 py-3">{{ __('Work Submitted') }}</th>
                  <th class="px-4 py-3">{{ __('Deadline') }}</th>
                  <th class="px-4 py-3">{{ __('Created at') }}</th>
                </tr>
              </thead>
              <tbody class="bg-white">
                <tr class="text-gray-700">
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
                      {{$challenge->deadline}}  days                 </td>
                    <td class="px-4 py-3 text-xs border-t">
                      {{$challenge->created_at}}                        </td>
                </tr>
              </tbody>
            </table>
            <br>
            <div class="p-5">
                <p class="text-xl">{{ __('Details') }}</p>
                <p>
                  {!!$challenge->description !!}
                </p>
                <p>
                  @if ($challenge->data)
                      
                     Formal {{$challenge->data->Formal}} | Unformal {{$challenge->data->Unformal}}  ,    Symbolic {{$challenge->data->Symbolic}} | Text {{$challenge->data->Text}} ,
                     Geometreic {{$challenge->data->Geometreic}} | Free {{$challenge->data->Free}} ,   Classic {{$challenge->data->Classic}} | Modern {{$challenge->data->Modern}} ,
                     Luxury {{$challenge->data->Luxury}} | Economy {{$challenge->data->Economy}} ,
                  @endif

                </p>
            </div>
            @if ($challenge->audio_file)
                                    
            <div class="container row col-4 audio_input">
              <h5>detailes voice:</h5>
             <audio class="" controls src="{{asset('uploads/'.$challenge->audio_file)}}"></audio>
            </div>
           
            @endif
            @if ($challenge->video)

            <div class="container row col-6  audio_input">
              <h5>detailes video:</h5>

              <video id="blah" class="col-6"   width="500" height="500" controls>
                  <source  src="{{asset('uploads/'.$challenge->video)}}" type="video/mp4">
                  Your browser does not support the video tag.
                </video>
          </div>
          @endif
            <div class="p-5">
              <p class="text-xl">{{ __('Work Submitted') }}</p>
              <br>
              <div class="grid grid-cols-3 gap-4">
              
              @foreach ($challenge->works as $work)
                  @if ($work->submit_work == 'yes')
                  <div class="c-card block bg-white shadow-md hover:shadow-xl rounded-lg overflow-hidden">
                    <img class="lg:h-60 xl:h-56 md:h-64 sm:h-72 xs:h-72 h-72 rounded w-full object-cover object-center mb-4" src="{{asset('uploads/'.$work->image)}}"/>
                    <div class="p-4">
                        <h3 class="text-indigo-500 text-xs font-medium title-font">
                            {{__('Submission date')}} {{$work->updated_at}}
                        </h3>                  
                        <div class="flex items-center mt-2">
                            <img class="w-10 h-10 object-cover rounded-full" src="{{asset('uploads/'.$work->designer->profile_photo_path)}}"/>
                            <div class="pl-3">
                              <div class="font-medium">{{$work->designer->name}}</div>
                              <div class="text-gray-600 text-sm">{{__($work->designer->degree)}}</div>
                            </div>
                        </div>
                        <div class="mt-4 pl-2 mb-2 flex justify-between ">
                          <div>
                            <p class="text-lg font-semibold text-gray-900 mb-0">{{__('Likes')}}</p>
                            <div class="flex">
                              <p class="text-md text-gray-800 mt-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 group-hover:opacity-70" fill="red" viewBox="0 0 24 24" stroke="red">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                              </p>
                              <p class="num{{$work->id}}">{{count($work->likes)}}</p>
                            </div>
                          </div>
                          @if(Auth::check())
                              
                          <div class="flex flex-col-reverse mb-1 mr-4 group cursor-pointer">
                            @php
                                $like = App\Models\Like::where('user_id',Auth::id())->where('work_id',$work->id)->first();
                            @endphp
                            @if ($like)
                            <a  style="visibility: visible" class="dislike{{$work->id}}" onclick="callAjax2({{ $challenge->id }},{{$work->id}})">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:opacity-70" fill="red" viewBox="0 0 24 24" stroke="red">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                              </svg>
                            </a> 
                           
                            <a  class="like{{$work->id}}" style="visibility: hidden"  onclick="callAjax({{ $challenge->id }},{{$work->id}})">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:opacity-70" fill="none" viewBox="0 0 24 24" stroke="gray">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                              </svg>
                            </a>  
                            @else

                            <a  style="visibility: hidden" class="dislike{{$work->id}}" onclick="callAjax2({{ $challenge->id }},{{$work->id}})">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:opacity-70" fill="red" viewBox="0 0 24 24" stroke="red">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                              </svg>
                            </a> 
                            <a  class="like{{$work->id}}"  onclick="callAjax({{ $challenge->id }},{{$work->id}})">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:opacity-70" fill="none" viewBox="0 0 24 24" stroke="gray">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                              </svg>
                            </a>  
                            @endif
                                        
                          </div>
                          @endif


                        </div>
                        @if (Auth::id() == $challenge->user_id)
                        <form action="{{route('user.putrank',$work->id)}}" method="post"> 
                          @csrf
                        <div class="items-center mt-2">
                          <div class="mb-3 space-y-2 w-full text-xs">
                            <label class="font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('The Best') }}<abbr title="required">({{__(' Out of')}} 1)</abbr></label>
                            <select class="select block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full dark:bg-gray-400"  name="rank" id="">
                           
                             @if ($work->rank)
                             <option value="{{$work->rank}}">{{$work->rank}}</option>

                              @else 
                              @php
                              $i=1;
                          @endphp
                              <option value="">Rate</option>
                           
                                           
                              @foreach ($challenge->works as $item)

                           
                              <option value="{{$i}}">{{$i++}}</option>


                               

                              @endforeach 
                               
                             @endif
                             
                              
                            </select>
                            
                            @error('rank')
                            <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
                                <p class="ml-6">{{$message}}</p>
                              </div>
                            @enderror
                        </div>
                          <div>
                            <input type="submit" class="bg-green-400 hover:bg-green-600 text-white rounded p-2 w-full" value="{{__('Save')}}">
                          </div>
                          {{-- Rate the designer --}}
                          @if ($work->evaluation)
                              rate:{{$work->evaluation->rate."/5"}}
                              {{$work->evaluation->body}}
                          @else
                          <div class="mt-2">
                            <a type="button" onclick="openModal('rate{{$work->id}}')" class="bg-yellow-600 hover:bg-yellow-700 text-white rounded p-2 w-full text-center">{{__('Rate')}}</a>
                          </div>
                          @endif
                         
                       
                      </div>
                    </form>
                  @php
                      $id = $work->id;
                  @endphp
                     
                      @endif
 
                    </div>
                </div>
                  @endif
               
                        
                  <dialog id="rate{{$work->id}}" class=" bg-transparent z-0 relative w-screen h-screen">
                    <form action="{{route('challenge.reviews',$work->id)}}" method="POST">
                     
                      @csrf
                    <div class="py-3 sm:max-w-xl sm:mx-auto">
                      <div class="bg-white min-w-1xl flex flex-col rounded-xl shadow-lg">
                        <div class="px-12 py-5">
                          <h2 class="text-gray-800 text-3xl font-semibold">{{$challenge->title}}</h2>
                          <p>rate{{$work->id}}</p>
                        </div>
                        <div class="bg-gray-200 w-full flex flex-col items-center">
                          <div class="flex flex-col items-center py-6 space-y-3">
                            <span class="text-lg text-gray-800">{{__('Rate the designer')}} - {{$work->designer->name}}</span>
                            <div class="flex space-x-3">
                              <div class="star-rating">

                              <input type="radio" name="stars" id="star-a{{$work->id}}" value="5"/>
                              <label for="star-a{{$work->id}}"></label>
                        
                              <input type="radio" name="stars" id="star-b{{$work->id}}" value="4"/>
                              <label for="star-b{{$work->id}}"></label>
                          
                              <input type="radio" name="stars" id="star-c{{$work->id}}" value="3"/>
                              <label for="star-c{{$work->id}}"></label>
                          
                              <input type="radio" name="stars" id="star-d{{$work->id}}" value="2"/>
                              <label for="star-d{{$work->id}}"></label>
                          
                              <input type="radio" name="stars" id="star-e{{$work->id}}" value="1"/>
                              <label for="star-e{{$work->id}}"></label>
                            </div>
                          </div>
                          </div>
                          <div class="w-3/4 flex flex-col">
                            <textarea rows="3" name="body" class="p-4 text-gray-500 rounded-xl resize-none" placeholder="Leave a comment, if you want"></textarea>
                            <button class="py-3 my-8 text-lg bg-gradient-to-r from-purple-500 to-indigo-600 rounded-xl text-white">{{__('Rate now')}}</button>
                          </div>
                        </div>
                        <div class="h-20 flex items-center justify-center">
                          <a onclick="modalClose('rate{{$work->id}}')" class="text-gray-600">Maybe later</a>
                        </div>
                      </div>
                    </div>
                  </form>
                </dialog>
                @endforeach
             
              </div>
            </div>
          </div>
        </div>
    </section>
    <div class="p-5">
      <h3 class="mb-4 text-lg font-semibold text-gray-900">{{__('Comments')}}</h3>
      @if(Auth::check())

      <form id="commentform" class="w-full bg-white rounded-lg px-4 pt-2 pb-1">
     
        <input type="hidden" id="challenge_id" value="{{$challenge->id}}" name="">
        <div class="flex flex-wrap -mx-3 mb-6">
           <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">{{__('Add a new comment')}}</h2>
           <div class="w-full md:w-full px-3 mb-2 mt-2">
              <textarea id="body"  class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" name="body" placeholder='Type Your Comment' required></textarea>
           </div>
           <div class="w-full md:w-full flex items-start px-3">
              <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto">

              </div>
              <div class="-mr-1">
                <button  id="" class="text-white px-4 py-3 w-auto bg-black rounded-full hover:bg-gray-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none">
                  {{ __('Post comment') }}
                </button>
              </div>
              <br>
           </div>
        </div>
      </form>
      @endif
      <div id="comment" class="space-y-4">
        {{--
        <div class="flex">
          <div class="flex-shrink-0 mr-3">
            <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10" src="https://images.unsplash.com/photo-1604426633861-11b2faead63c?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=200&h=200&q=80" alt="">
          </div>
          <div class="flex-1 border rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
            <strong>Sarah</strong> <span class="text-xs text-gray-400">3:34 PM</span>
            <p class="text-sm">
              Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
              sed diam nonumy eirmod tempor invidunt ut labore et dolore
              magna aliquyam erat, sed diam voluptua.
            </p>
            <div class="mt-4 flex items-center">
              <div class="flex -space-x-2 mr-2">
                <img class="rounded-full w-6 h-6 border border-white" src="https://images.unsplash.com/photo-1554151228-14d9def656e4?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=100&h=100&q=80" alt="">
                <img class="rounded-full w-6 h-6 border border-white" src="https://images.unsplash.com/photo-1513956589380-bad6acb9b9d4?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=100&h=100&q=80" alt="">
              </div>
              <div class="text-sm text-gray-500 font-semibold">
                5 Replies
              </div>
            </div>
            <div class="mt-4 flex items-center">
              <div class="flex mr-2">
                <div>
                  <button type="button" class="flex items-center px-5 py-2.5 font-medium tracking-wide text-black capitalize rounded-md  hover:bg-red-200 hover:fill-current hover:text-red-600  focus:outline-none  transition duration-300 transform active:scale-95 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px">
                      <path d="M0 0h24v24H0V0z" fill="none"></path>
                      <path d="M8 9h8v10H8z" opacity=".3"></path>
                      <path d="M15.5 4l-1-1h-5l-1 1H5v2h14V4zM6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM8 9h8v10H8V9z"></path>
                    </svg>
                    <span class="pl-2 mx-1">Delete</span>
                </button>
                </div>
                <div>
                  <button type="button" class="flex items-center px-5 py-2.5 font-medium tracking-wide text-black capitalize rounded-md  hover:bg-yellow-200 hover:fill-current hover:text-yellow-600  focus:outline-none  transition duration-300 transform active:scale-95 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg"height="24px" width="24px" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    <span class="pl-2 mx-1">{{__('Report')}}</span>
                </button>
                </div>
              </div>
              <div class="text-sm text-gray-500 font-semibold">
                <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
                  <div class="bg-gray-200 flex w-full">
                    <form action="{{route('reply',1)}}" method="post">
                      @csrf
                      <input
                          type="text"
                          name="body"
                          placeholder="Replay.."
                          class="w-full py-2 px-4 rounded">
                      <button class="bg-black hover:bg-gray-700 py-2 px-4">
                          <p class="font-semibold text-white uppercase">{{__('Reply')}}</p>
                      </button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> --}}
        @foreach ($challenge->comments as $comment)
        <div class="flex">
          <div class="flex-shrink-0 mr-3">
            <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10" src="{{asset('uploads/'.$comment->user->profile_photo_path)}}" alt="">
          </div>
          <div class="flex-1 border rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
            <strong>{{$comment->user->name}}</strong> <span class="text-xs text-gray-400">{{$comment->created_at}} PM</span>
            <p class="text-sm">
              {{$comment->body}}
            </p>



            @if ($challenge->user_id == Auth::id())

            <div class="flex mr-2">
              <div>
                <form method="POST" action="{{route('deletecomment',$comment->id)}}">
                  @csrf
                <button type="submit" onclick="return confirm('Are you sure you want to delete?')" class="flex items-center px-5 py-2.5 font-medium tracking-wide text-black capitalize rounded-md  hover:bg-red-200 hover:fill-current hover:text-red-600  focus:outline-none  transition duration-300 transform active:scale-95 ease-in-out">
                  <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px">
                    <path d="M0 0h24v24H0V0z" fill="none"></path>
                    <path d="M8 9h8v10H8z" opacity=".3"></path>
                    <path d="M15.5 4l-1-1h-5l-1 1H5v2h14V4zM6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM8 9h8v10H8V9z"></path>
                  </svg>
                  <span class="pl-2 mx-1">Delete</span>
              </button>
                </form>
              </div>
              <div>
                <form>
                  @csrf
                  <input type="hidden" class="comment_id" value="{{$comment->id}}" name="comment_id">
                <button type="button" class="flex items-center px-5 py-2.5 font-medium tracking-wide text-black capitalize rounded-md  hover:bg-yellow-200 hover:fill-current hover:text-yellow-600  focus:outline-none  transition duration-300 transform active:scale-95 ease-in-out">
                  <svg xmlns="http://www.w3.org/2000/svg"height="24px" width="24px" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                  </svg>
                  <span class="pl-2 mx-1">{{__('Report')}}</span>
              </button>
                </form>
              </div>
            </div>
            @endif





            <h4 class="my-5 uppercase tracking-wide text-gray-400 font-bold text-xs">Replies</h4>
    
            <div  class="space-y-4">
              @foreach ($comment->replies as $reply)
                  
              <div class="flex">
                <div class="flex-shrink-0 mr-3">
                  <img class="mt-3 rounded-full w-6 h-6 sm:w-8 sm:h-8" src="{{asset('uploads/'.$reply->user->profile_photo_path)}}" alt="">
                </div>
                <div class="flex-1 bg-gray-100 rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
                  <strong>{{$reply->user->name}}</strong> <span class="text-xs text-gray-400">{{$reply->created_at}} PM</span>
                  <p class="text-xs sm:text-sm">
                    {{$reply->body}}
                  </p>
                  @if ($challenge->user_id == Auth::id())

            <div class="flex mr-2">
              <div>
                <form method="POST" action="{{route('deletereply',$reply->id)}}">
                  @csrf
                <button type="submit" onclick="return confirm('Are you sure you want to delete a reply?')" class="flex items-center px-5 py-2.5 font-medium tracking-wide text-black capitalize rounded-md  hover:bg-red-200 hover:fill-current hover:text-red-600  focus:outline-none  transition duration-300 transform active:scale-95 ease-in-out">
                  <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px">
                    <path d="M0 0h24v24H0V0z" fill="none"></path>
                    <path d="M8 9h8v10H8z" opacity=".3"></path>
                    <path d="M15.5 4l-1-1h-5l-1 1H5v2h14V4zM6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM8 9h8v10H8V9z"></path>
                  </svg>
                  <span class="pl-2 mx-1">Delete</span>
              </button>
                </form>
              </div>
              <div>
                <form>
                  @csrf
                  <input type="hidden" class="comment_id" value="{{$comment->id}}" name="comment_id">
                <button type="button" class="flex items-center px-5 py-2.5 font-medium tracking-wide text-black capitalize rounded-md  hover:bg-yellow-200 hover:fill-current hover:text-yellow-600  focus:outline-none  transition duration-300 transform active:scale-95 ease-in-out">
                  <svg xmlns="http://www.w3.org/2000/svg"height="24px" width="24px" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                  </svg>
                  <span class="pl-2 mx-1">{{__('Report')}}</span>
              </button>
                </form>
              </div>
            </div>
@endif
                </div>
                
              </div>
              @endforeach
              <div id="reply{{$comment->id}}">

              </div>
              @if(Auth::check())

              <div class="text-sm text-gray-500 font-semibold mt-2">
                <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
                  <div class="bg-gray-200 flex w-1/3">
                    <form>
                      @csrf
                      <input type="hidden" class="comment_id" value="{{$comment->id}}" name="comment_id">
                      <input
                          type="text"
                          name="replybody"
                          placeholder="Replay.."
                          class="replybody w-full py-2 px-4 rounded">
                      <button type="button" class="reply bg-black hover:bg-gray-700 py-2 px-4">
                          <p class="font-semibold btn_reply text-white uppercase">{{__('Reply')}}</p>
                      </button>
                    </form>
                  </div>
                </div>
              </div>
              @endif
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>

    <script src="{{asset('/js/modalpopup.js')}}"></script>
   



    <script>
      function callAjax(challengeId,work_id) {
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          })
      
          $.ajax({
              type: 'POST',
              url: '{{ route('like') }}',
              data: {_method: 'POST', challengeId: challengeId, work_id: work_id}
          })
          .done(function (data) {
            console.log("data:");
              console.log(data);
              console.log(data.work['id']);

                $(".like"+data.work['id']).hide();
              
                $(".like"+data.work['id']).css("visibility", "hidden");

                $(".dislike"+data.work['id']).css("visibility", "visible");

              text = $(".num"+data.work['id']).text();
              num = parseInt(text);
              $(".num"+data.work['id']).text(num+1);
           });
      }
      
      </script>



<script>
  function callAjax2(challengeId,work_id) {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      })
  
      $.ajax({
          type: 'POST',
          url: '{{ route('dislike') }}',
          data: {_method: 'POST',  challengeId: challengeId, work_id: work_id}
      })
      .done(function (data) {
        console.log("data:");
          console.log(data);
          console.log(data.id);

            $(".like"+data.id).show();
            $(".like"+data.id).css("visibility", "visible");


            $(".dislike"+data.id).css("visibility", "hidden");

          text = $(".num"+data.id).text();
          num = parseInt(text);
          $(".num"+data.id).text(num-1);
       });
  }
  
  </script>












   <script type="text/javascript">

  $('#commentform').on('submit',function(e){
    e.preventDefault();

    let body = $('#body').val();
    let challenge_id = $('#challenge_id').val();


    $.ajax({
      url: "/challenge/comment",
      type:"POST",
      data:{
        "_token": "{{ csrf_token() }}",
        body:body,
        challenge_id:challenge_id,
      },
      success:function(data){
        console.log(data);
        id= data.id;
        console.log(data.user['name']);
        $("#comment").prepend(
          `  <div class="flex">
          <div class="flex-shrink-0 mr-3">
            <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10" src="{{asset('uploads/')}}/${data.user['profile_photo_path']}" alt="">
          </div>
          <div class="flex-1 border rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
            <strong>${data.user['name']}</strong> <span class="text-xs text-gray-400">${data.created_at} PM</span>
            <p class="text-sm">
              ${data.body}
            </p>
            <div class="flex mr-2">
              <div>
                <form method="POST" action="/challenge/comment/delete/${data.id}">
                  @csrf
                <button type="submit" onclick="return confirm('Are you sure you want to delete a comment?')" class="flex items-center px-5 py-2.5 font-medium tracking-wide text-black capitalize rounded-md  hover:bg-red-200 hover:fill-current hover:text-red-600  focus:outline-none  transition duration-300 transform active:scale-95 ease-in-out">
                  <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px">
                    <path d="M0 0h24v24H0V0z" fill="none"></path>
                    <path d="M8 9h8v10H8z" opacity=".3"></path>
                    <path d="M15.5 4l-1-1h-5l-1 1H5v2h14V4zM6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM8 9h8v10H8V9z"></path>
                  </svg>
                  <span class="pl-2 mx-1">Delete</span>
              </button>
                </form>
              </div>
            </div>
            <h4 class="my-5 uppercase tracking-wide text-gray-400 font-bold text-xs">Replies</h4>
    
            <div class="space-y-4">
          
              <div class="text-sm text-gray-500 font-semibold mt-2">
                <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
                  <div class="bg-gray-200 flex w-1/3">
                    <form>
                        @csrf
                        <input type="hidden" class="comment_id" value="${data.id}" name="comment_id">

                        <input
                          type="text"
                          name="replybody"
                          placeholder="Replay.."
                          class="replybody w-full py-2 px-4 rounded">
                      <button type="button" class="reply bg-black hover:bg-gray-700 py-2 px-4">
                          <p class="font-semibold btn_reply  text-white uppercase">{{__('Reply')}}</p>
                      </button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>`
        );
        $('#body').val("")
      },
     });
    });
  </script>

  <script>
     $(document).ready(function() {
	var comment_id;
	var body;

	$('.reply').click(function(e) {
		e.preventDefault();
		
		$(this).siblings().each(function(){
			if($(this).hasClass("replybody")){
				body = $(this).val();
				console.log(body);
			}
			if($(this).hasClass("comment_id")){
				comment_id = $(this).val();
				console.log(comment_id);
			}
		
		});
	//	alert("comment_id: " +comment_id+ " body: " +body);
    $.ajax({
      url: "/challenge/reply",
      type:"POST",
      data:{
        "_token": "{{ csrf_token() }}",
        body:body,
        comment_id:comment_id
      },
      success:function(data){
        console.log(data);

        console.log(data.user['name']);
        $('.replybody').val("")
        
        $("#reply"+data.comment_id).append(
          ` <div class="flex">
                <div class="flex-shrink-0 mr-3">
                  <img class="mt-3 rounded-full w-6 h-6 sm:w-8 sm:h-8" src="{{asset('uploads/')}}/${data.user['profile_photo_path']}" alt="">
                </div>
                <div class="flex-1 bg-gray-100 rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
                  <strong>${data.user['name']}</strong> <span class="text-xs text-gray-400"> ${data.created_at} PM</span>
                  <p class="text-xs sm:text-sm">
                    ${data.body}
                  </p>
         
                </div>
                
              </div>
              <div class="flex mr-2">
              <div>
                <form method="POST" action="/challenge/reply/delete/${data.id}">
                  @csrf
                <button type="submit" onclick="return confirm('Are you sure you want to delete a reply?')" class="flex items-center px-5 py-2.5 font-medium tracking-wide text-black capitalize rounded-md  hover:bg-red-200 hover:fill-current hover:text-red-600  focus:outline-none  transition duration-300 transform active:scale-95 ease-in-out">
                  <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px">
                    <path d="M0 0h24v24H0V0z" fill="none"></path>
                    <path d="M8 9h8v10H8z" opacity=".3"></path>
                    <path d="M15.5 4l-1-1h-5l-1 1H5v2h14V4zM6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM8 9h8v10H8V9z"></path>
                  </svg>
                  <span class="pl-2 mx-1">Delete</span>
              </button>
                </form>
              </div>
            </div>`
        );

      },
     });
	});

});
   </script>
</x-app-layout>
