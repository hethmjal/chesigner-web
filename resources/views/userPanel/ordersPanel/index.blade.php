<x-app-layout>
    <x-slot name="header">
     
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
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
        <a class="text-white px-4 py-2 mb-3 w-auto h-10 bg-green-600 rounded-full hover:bg-green-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" href="{{ url('/panels/UserPanel/Orders/newOrder') }}">
          <span>{{ __('Add new order') }}</span>
        </a>
      </div>
      <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
          <div class="text-center">
            <h2><strong class="text-black">{{ __('Orders') }}</strong></h2>
          </div>
          <div class="w-full overflow-x-auto">
            <table class="w-full">
              <thead>
                <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                  <th class="px-4 py-3">{{ __('ID') }}</th>
                  <th class="px-4 py-3">{{ __('Order Explanition') }}</th>
                  <th class="px-4 py-3">{{ __('Title') }}</th>
                  <th class="px-4 py-3">{{ __('Type') }}</th>
                  <th class="px-4 py-3">{{ __('Designer') }}</th>
                  <th class="px-4 py-3">{{ __('Status') }}</th>
                  <th class="px-4 py-3">{{ __('Work Submitted') }}</th>
                  <th class="px-4 py-3">{{ __('Deadline') }}</th>
                  <th class="px-4 py-3">{{ __('Created at') }}</th>
                  <th class="px-4 py-3">{{ __('Details') }}</th>
                  <th class="px-4 py-3">{{ __('Edit') }}</th>
                  <th class="px-4 py-3"></th>
                </tr>
              </thead>
              <tbody class="bg-white">
                @foreach ($orders as $order)
                <tr class="text-gray-700">
                    <td class="px-4 py-3 text-xs border-t">
                    {{$order->id}}
                    </td>
                    <td class="px-4 py-3 border-t">
                    <div class="items-center text-sm">
                        <div class="relative w-32 h-32 mr-3 md:block">
                            <img class="object-cover w-full h-full" src="{{$order->image_order}}">
                        </div>
                    </div>
                    </td>
                    <td class="px-4 py-3 text-xs border-t">
                      {{$order->title}}
                    </td>
                    <td class="px-4 py-3 text-xs border-t">
                      {{$order->type}}
                    </td>                           
                    <td class="px-4 py-3 text-xs border-t">
                      {{$order->designer_name}}
                    </td>
                    <td class="px-4 py-3 text-xs border-t">
                      @if ($order->status == 'waiting to response')
                      <span class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-sm"> {{$order->status}} </span>  
                      @endif

                      @if ($order->status == 'Accepted')
                      <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"> {{$order->status}} </span>
                      @endif

                      @if ($order->status == 'Rejected')
                      <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-sm"> {{$order->status}}  </span> 
                      @endif


                      
                    </td>
                    <td class="px-4 py-3 text-xs border-t">
                      @if ($order->work_submitted == 'submitted')
                      <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"> {{$order->work_submitted}}</span> 
                      @endif
                      
                      @if ($order->work_submitted == 'working on')
                      <span class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-sm">  {{$order->work_submitted}} </span>
                      @endif
                      
                      @if ($order->work_submitted == 'Delayed')
                      <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-sm">  {{$order->work_submitted}} </span>
                      @endif


                    </td>
                    <td class="px-4 py-3 text-xs border-t">
                      {{$order->deadline}}
                    </td>
                    <td class="px-4 py-3 text-xs border-t">
                      {{$order->created_at}}
                    </td>
                    <td class="px-4 py-3 text-sm border-t"><a class="text-white px-4 py-3 w-auto h-10 bg-black rounded-full hover:bg-gray-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" href="{{ url("/panels/UserPanel/Orders/{$order->id}/show") }}">
                      {{ __('Show') }}
                    </a></td>
                    <td class="px-4 py-3 text-sm border-t"><a class="text-white px-4 py-3 w-auto h-10 bg-blue-600 rounded-full hover:bg-blue-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" href="{{ url("/panels/UserPanel/Orders/{$order->id}/editOrder") }}">
                      {{ __('Edit') }}
                    </a></td>
                    @if($order->status !== 'Accepted')

                    <td class="px-4 py-3 text-sm border-t">
                        <form action="{{route('orderuserresource.destroy',$order->id)}}" method="post">
                          @csrf
                          @method('delete')
                            <button class="text-white px-4 w-auto h-10 bg-red-600 rounded-full hover:bg-red-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" type="submit" onclick="return confirm('Are you sure you want to delete?')">
                            {{ __('Delete') }}
                            </button>
                        </form>
                    </td>
                    @elseif($order->status == 'Accepted' && $order->work_submitted == 'submitted') 
                    @if($order->evaluation)
                    <td style="text-align: center" class="border-t">rate:{{$order->evaluation->rate."/5"}}
                    {{$order->evaluation->body}}
                    </td>
                    @else
                    <td class="px-4 py-3 text-sm border-t"><a class="text-white px-4 py-3 w-auto h-10 bg-yellow-600 rounded-full hover:bg-yellow-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" onclick="openModal('rate{{$order->id}}')">
                      {{ __('Rate') }}
                    </a></td>
                      
    
                    @endif
                  
                    @endif
                </tr>
                     
                <dialog id="rate{{$order->id}}" class="bg-transparent z-0 relative w-screen h-screen">
                  <form action="{{route('order.reviews',$order->id)}}" enctype="multipart/form-data" method="post">
                    @csrf
                  <div class="py-3 sm:max-w-xl sm:mx-auto">
                    <div class="bg-white min-w-1xl flex flex-col rounded-xl shadow-lg">
                      <div class="px-12 py-5">
                        <h2 class="text-gray-800 text-3xl font-semibold">{{$order->title}}</h2>
                      </div>
                      <div class="bg-gray-200 w-full flex flex-col items-center">
                        <div class="flex flex-col items-center py-6 space-y-3">
                          <span class="text-lg text-gray-800">{{__('Rate the designer')}} - {{$order->designer_name}}</span>
                          <div class="flex space-x-3">
                            <div class="star-rating">
                              <input type="radio" name="stars" id="star-a{{$order->id}}" value="5"/>
                              <label for="star-a{{$order->id}}"></label>
                        
                              <input type="radio" name="stars" id="star-b{{$order->id}}" value="4"/>
                              <label for="star-b{{$order->id}}"></label>
                          
                              <input type="radio" name="stars" id="star-c{{$order->id}}" value="3"/>
                              <label for="star-c{{$order->id}}"></label>
                          
                              <input type="radio" name="stars" id="star-d{{$order->id}}" value="2"/>
                              <label for="star-d{{$order->id}}"></label>
                          
                              <input type="radio" name="stars" id="star-e{{$order->id}}" value="1"/>
                              <label for="star-e{{$order->id}}"></label>
                        </div>
                          </div>
                        </div>

                        <div class="w-3/4 flex flex-col">
                          <textarea rows="3" name="body" class="p-4 text-gray-500 rounded-xl resize-none" placeholder="Leave a comment, if you want"></textarea>
                          <button class="py-3 my-8 text-lg bg-gradient-to-r from-purple-500 to-indigo-600 rounded-xl text-white">Rate now</button>
                        </div>
                      </div>
                      <div class="h-20 flex items-center justify-center">
                        <a onclick="modalClose('rate{{$order->id}}')" class="text-gray-600">Maybe later</a>
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
