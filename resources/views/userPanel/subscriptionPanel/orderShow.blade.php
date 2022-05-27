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
                      {{$order->designer->name}}
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
                
           
            <div class="p-5">
              @if ( $order->work_status == 'Accepted' || $order->work_status  == 'under review')

              <p class="text-xl">{{ __('Work Submitted') }}</p>
              <img src="{{asset('uploads/'.$order->work_image)}}" alt="" width="50%">
              <br>
              <br>

              <p class="text-md">{{ __('File name') }}: {{$order->file_name}} </p>
              <p class="text-md">{{ __('File extintion') }}:{{$order->file_ext}}  </p>
              <br>
              @endif
              <div>
                @if ( $order->work_status == 'Accepted' )

                <a class="text-white px-4 py-3 w-auto h-10 bg-black rounded-full hover:bg-gray-700" href="{{asset($order->work_image)}}" download="{{asset($order->work_image)}}">
                  {{ __('Download image') }}
                </a>
                 
                    
               
              </div>
             <br>
             <br>
              <div>
                <a class="text-white px-4 py-3 w-auto h-10 bg-black rounded-full hover:bg-gray-700" href="{{$order->work_file}}" download="{{$order->work_file}}">
                {{ __('View File') }}
              </a>

              </div>
              <br>
              <hr>
              <br>
              <p class="text-xl">{{ __('Designer Note') }}</p>
              <p>
                  {{$order->designer_note}}
              </p>

              <br>
              <hr>
              <br>
              @endif
              <div>

                <form action="{{route('sub.check',$order->id)}}" method="post">

                  @csrf
                  @if ($order->work_status == 'under review')

                  <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                    <div class="mb-3 space-y-2 w-full text-xs">
                        <label class="font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('Type') }}<abbr title="required">*</abbr></label>
                        <select class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full dark:bg-gray-400" required="required" name="work_status" id="">
                            <option value="Accepted">{{ __('Accept') }}</option>
                            <option value="need to edit">{{ __('Need to edit') }}</option>
                        </select>
                    </div>
                  </div>

                  <div class="md:space-x-4 w-full text-xs">
                    <p class="font-semibold text-gray-600 py-5 dark:text-gray-100">{{ __('Note for designer') }}<abbr title="required">*</abbr></p>
                    <textarea name="user_note" rows="10" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 dark:bg-gray-400"> </textarea>
                  </div>
                 @endif
                  <div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
                      <a class="mb-2 md:mb-0 bg-black px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-white rounded-full hover:shadow-lg hover:bg-gray-700 " href="{{url("/messenger/{$conversation->id}")}}">
                        {{ __('Chat with Designer') }}  
                      </a>
                      @if ($order->work_status == 'under review')

                      <a class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100 dark:text-gray-100 dark:bg-gray-500  dark:hover:bg-gray-600" href="{{url('/panels/UserPanel/Orders')}}">
                        {{ __('Cancel') }}  
                      </a>
                      <button class="mb-2 md:mb-0 bg-green-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-500" type="submit">
                        {{ __('Save') }}
                      </button>
                      @endif

                  </div>
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
