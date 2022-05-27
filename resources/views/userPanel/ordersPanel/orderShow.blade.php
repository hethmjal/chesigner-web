<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }} | Show #{{$order->id}}
        </h2>
    </x-slot>

    <section class="container mx-auto p-6">
        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
          <div class="my-5">
            <a href="{{url('/panels/UserPanel/Orders')}}" class="p-3 bg-black text-white rounded">{{ __('Back') }}</a>
          </div>
          <div class="text-center">
            <h2><strong class="text-black">{{ __('Details') }}</strong></h2>
          </div>
          <div class="w-full overflow-x-auto">
            <table class="w-full">
              <thead>
                <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                  <th class="px-4 py-3">{{ __('Order Explanition') }}</th>
                  <th class="px-4 py-3">{{ __('Title') }}</th>
                  <th class="px-4 py-3">{{ __('Type') }}</th>
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
                </tr>
              </tbody>
            </table>
            <br>
            <div class="p-5">
                <p class="text-xl">{{ __('Details') }}</p>
                <p>
                  {{$order->description}}

                </p>
            </div>
            @if ($order->order_work)

            <div class="p-5">
              <p class="text-xl">{{ __('Work Submitted') }}</p>
              <img src="{{$order->order_work->image_order}}" alt="" width="50%">
              <br>
              <br>
              <p class="text-md">{{ __('File name') }}: {{$order->order_work->file_name}} </p>
              <p class="text-md">{{ __('File extintion') }}: {{$order->order_work->file_ext}} </p>
              <br>
              <div>

                @if ($order->order_work->status == 'Accepted')
                <a class="text-white px-4 py-3 w-auto h-10 bg-black rounded-full hover:bg-gray-700" href="{{asset($order->order_work->image)}}" download="{{asset($order->order_work->image)}}">
                  {{ __('Download image') }}
                </a>
                 
                    
               
              </div>
             
              <div>
                <a class="text-white px-4 py-3 w-auto h-10 bg-black rounded-full hover:bg-gray-700" href="{{$order->order_work->file_order}}" download="{{$order->order_work->file}}">
                {{ __('View File') }}
              </a>

              </div>
              <br>
              <hr>
              <br>
              <p class="text-xl">{{ __('Designer Note') }}</p>
              <p>
                  {{$order->order_work->designer_note}}
              </p>

              <br>
              <hr>
              <br>
              <div>
                @endif

                <form action="{{route('user.work',$order->order_work->id)}}" method="post">
                  @endif

                  @csrf
                  @if ($order->order_work)

                  @if($order->order_work->status!= "Accepted" && $order->order_work->status != 'working on')
                  <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                    <div class="mb-3 space-y-2 w-full text-xs">
                        <label class="font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('Type') }}<abbr title="required">*</abbr></label>
                        <select class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full dark:bg-gray-400" required="required" name="status" id="">
                            <option value="Accepted">{{ __('Accept') }}</option>
                            <option value="edit">{{ __('Need to edit') }}</option>
                        </select>
                    </div>
                  </div>
                  <div class="md:space-x-4 w-full text-xs">
                    <p class="font-semibold text-gray-600 py-5 dark:text-gray-100">{{ __('Note for designer') }}<abbr title="required">*</abbr></p>
                    <textarea name="user_note" rows="10" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 dark:bg-gray-400"> </textarea>
                  </div>
                  @endif
                  @endif
                  <div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
                     @if (Auth::user()->type != 'admin')
                     <a class="mb-2 md:mb-0 bg-black px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-white rounded-full hover:shadow-lg hover:bg-gray-700 " href="{{url("/messenger/{$conversation->id}")}}">
                      {{ __('Chat with Designer') }}  
                    </a>
                     @endif
                   
                      @if ($order->order_work)

                      @if($order->order_work->status!= "Accepted" && $order->order_work->status != 'working on')
                      <a class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100 dark:text-gray-100 dark:bg-gray-500  dark:hover:bg-gray-600" href="{{url('/panels/UserPanel/Orders')}}">
                        {{ __('Cancel') }}  
                      </a>

                      <button class="mb-2 md:mb-0 bg-green-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-500" type="submit">
                        {{ __('Save') }}
                      </button>
                  </div>
                  @endif
                  @endif
                </form>

              </div>
          </div>
          </div>
        </div>
    </section>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace( 'body' );
    </script>
</x-app-layout>
