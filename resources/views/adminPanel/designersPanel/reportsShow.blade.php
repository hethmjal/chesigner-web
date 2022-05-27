<x-app-layout>
    <x-slot name="header">
     
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reports panel') }} | Mohammad
        </h2>
      
    </x-slot>

    <section class="container mx-auto p-6">
      <div class="mt-3">
        <a class="text-white px-4 py-2 mb-3 w-auto h-10 bg-black rounded-full hover:bg-gray-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" href="{{ url('/panels/AdminPanel/DesignersPanel') }}">
            <span>{{ __('Back') }}</span>
          </a>
      </div>
     
      <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
        <div class="text-center">
          <h2><strong class="text-black">{{ __('Reports from') }} {{$user->name}}</strong></h2>
        </div>
        <div class="w-full overflow-x-auto">
          <table class="w-full">
            <thead>
              <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                <th class="px-4 py-3">{{ __('ID') }}</th>
                <th class="px-4 py-3">{{ __('title') }}</th>
                <th class="px-4 py-3">{{ __('Type') }}</th>
                <th class="px-4 py-3">{{ __('Message') }}</th>
                <th class="px-4 py-3">{{ __('Order / Challenge ID') }}</th>
                <th class="px-4 py-3">{{ __('Date') }}</th>
                <th class="px-4 py-3">{{ __('Show') }}</th>
              </tr>
            </thead>
            <tbody class="bg-white">
              @foreach ($reportsFrom as $report)
                  
              @endforeach
              <tr class="text-gray-700 text-center">
                  <td class="px-4 py-3 text-xs border-t">
                  {{$report->id}}
                  </td>
                  <td class="px-4 py-3 border-t">
                    {{$report->title}}
                  </td>
                  <td class="px-4 py-3 text-xs border-t">
                      <span class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-100 rounded-sm"> {{__($report->type)}} </span>
                  </td>
                  <td class="px-4 py-3 text-xs border-t">
                    {{$report->message}}                    </td>     
                    @if ($report->order_id)
                     
                    <td class="px-4 py-3 text-xs border-t">
                      {{$report->order_id}}
                  </td>
                    @else
                    <td class="px-4 py-3 text-xs border-t">
                      {{$report->challenge_id}}
                  </td> 
                    @endif                      
                
                  <td class="px-4 py-3 text-xs border-t">
                    {{$report->created_at}}
                  </td>
                  <td class="px-4 py-3 text-sm border-t">
                    @if ($report->challenge_id)
                      <a class="text-white px-4 py-3 w-auto h-10 bg-black rounded-full hover:bg-gray-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" href="{{route('designer.showchallenge',$report->challenge_id)}}">
                        {{ __('Show') }}
                      </a>
                      @else
                      <a class="text-white px-4 py-3 w-auto h-10 bg-black rounded-full hover:bg-gray-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" href="{{route('designer.showorder',$report->order_id)}}">
                        {{ __('Show') }}
                      </a> 
                      @endif
                  </td>
              </tr>
            </tbody>
          </table>
          
        </div>
      </div>

        <br>
        <hr>
        <br>
        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
          <div class="text-center">
            <h2><strong class="text-black">{{ __('Reports on') }} {{$user->name}}</strong></h2>
          </div>
          <div class="w-full overflow-x-auto">
            <table class="w-full">
              <thead>
                <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                  <th class="px-4 py-3">{{ __('ID') }}</th>
                  <th class="px-4 py-3">{{ __('title') }}</th>
                  <th class="px-4 py-3">{{ __('Type') }}</th>
                  <th class="px-4 py-3">{{ __('Message') }}</th>
                  <th class="px-4 py-3">{{ __('Order / Challenge ID') }}</th>
                  <th class="px-4 py-3">{{ __('Date') }}</th>
                  <th class="px-4 py-3">{{ __('Show') }}</th>
                </tr>
              </thead>
              <tbody class="bg-white">
                @foreach ($reportsTo as $report)
                    
                @endforeach
                <tr class="text-gray-700 text-center">
                    <td class="px-4 py-3 text-xs border-t">
                      {{$report->id}}
                    </td>
                    <td class="px-4 py-3 border-t">
                      {{$report->title}} 
                                         </td>
                    <td class="px-4 py-3 text-xs border-t">
                        <span class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-100 rounded-sm"> {{__($report->type)}} </span>
                    </td>
                    <td class="px-4 py-3 text-xs border-t">
                      {{$report->message}}   
                                       </td>                           
                                       @if ($report->order_id)
                     
                                       <td class="px-4 py-3 text-xs border-t">
                                         {{$report->order_id}}
                                     </td>
                                       @else
                                       <td class="px-4 py-3 text-xs border-t">
                                         {{$report->challenge_id}}
                                     </td> 
                                       @endif 
                    <td class="px-4 py-3 text-xs border-t">
                      {{$report->created_at}}
                  </td>
                    <td class="px-4 py-3 text-sm border-t">
                      @if ($report->challenge_id)
                      <a class="text-white px-4 py-3 w-auto h-10 bg-black rounded-full hover:bg-gray-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" href="{{route('designer.showchallenge',$report->challenge_id)}}">
                        {{ __('Show') }}
                      </a>
                      @else
                      <a class="text-white px-4 py-3 w-auto h-10 bg-black rounded-full hover:bg-gray-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" href="{{route('designer.showorder',$report->order_id)}}">
                        {{ __('Show') }}
                      </a> 
                      @endif
                    </td>
                </tr>
              </tbody>
            </table>
            
          </div>
        </div>
    </section>
</x-app-layout>
