<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subsecription plan | My Orders') }}
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
        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
          <div class="text-center">
            <h2><strong class="text-black">{{ __('My Orders') }}</strong></h2>
          </div>
          <div class="w-full overflow-x-auto">
            <table class="w-full">
              <thead>
                <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                  <th class="px-4 py-3">{{ __('ID') }}</th>
                  <th class="px-4 py-3">{{ __('Order Explanition') }}</th>
                  <th class="px-4 py-3">{{ __('Title') }}</th>
                  <th class="px-4 py-3">{{ __('Type') }}</th>
                  <th class="px-4 py-3">{{ __('Client') }}</th>
                  <th class="px-4 py-3">{{ __('Deadline') }}</th>
                  <th class="px-4 py-3">{{ __('Work Status') }}</th>
                  <th class="px-4 py-3">{{ __('Created at') }}</th>
                  <th class="px-4 py-3">{{ __('Submit Work') }}</th>
                  <th class="px-4 py-3">{{ __('Rate') }}</th>

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
                            <img class="object-cover w-full h-full" src="{{asset('uploads/'.$order->image)}}">
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
                      {{$order->user->name}}

                    </td>
                    <td class="px-4 py-3 text-xs border-t">
                      {{$order->deadline}}

                    </td>
                    <td class="px-4 py-3 text-xs border-t">
                      @if ($order->work_status == 'edit')
                      <span class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-sm"> {{$order->work_status}} </span>  
                      @endif

                      @if ($order->work_status == 'under review')
                      <span class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-sm"> {{$order->work_status}} </span>  
                      @endif

                      @if ($order->work_status == 'Accepted')
                      <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"> {{$order->work_status}} </span>
                      @endif

                      @if ($order->work_status == 'working on')
                      <span class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-red-100 rounded-sm"> {{$order->work_status}}  </span> 
                      @endif

                    </td>
                    <td class="px-4 py-3 text-xs border-t">
                      {{$order->created_at}}

                    </td>
                  {{--  <td class="px-4 py-3 text-sm border-t"><a class="text-white px-4 py-3 w-auto h-10 bg-blue-600 rounded-full hover:bg-blue-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" href="">
                      {{ __('Show') }} --}}
                    </a></td>
                    <td class="px-4 py-3 text-sm border-t">
                          <a class="text-white px-4 py-3 w-auto h-10 bg-black rounded-full hover:bg-gray-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" href="{{ route('subscriptiondesignerresource.edit',$order->id) }}">
                            {{ __('Add Work') }}
                          </a>
                    </td> 
                    @if($order->evaluation)
                    <td style="text-align: center">rate:{{$order->evaluation->rate."/5"}}
                    {{$order->evaluation->body}}
                    </td>
                    @else
                    <td style="text-align: center">_
                      
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
