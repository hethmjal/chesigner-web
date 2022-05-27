<x-app-layout>
    <x-slot name="header">
     
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Designers') }}
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
            <h2><strong class="text-black">{{ __('Designers') }}</strong></h2>
          </div>
          <div class="w-full overflow-x-auto">
            <table class="w-full">
                <thead>
                  <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                    <th class="px-4 py-3">{{ __('ID') }}</th>
                    <th class="px-4 py-3">{{ __('Designer name') }}</th>
                    <th class="px-4 py-3">{{ __('Rates') }}</th>
                    <th class="px-4 py-3">{{ __('Experience') }}</th>
                    <th class="px-4 py-3">{{ __('Number of works') }}</th>
                    <th class="px-4 py-3">{{ __('Join in') }}</th>
                    <th class="px-4 py-3">{{ __('View profile') }}</th>
                    <th class="px-4 py-3"></th>
                  </tr>
                </thead>
                <tbody class="bg-white">
                    
                  @foreach ($favorites as $fav)
                      
                  <tr class="text-gray-700">
                    <td class="px-4 py-3 text-xs border-t">
                      {{$fav->designer->id}}
                      </td>
                      <td class="px-4 py-3 border-t">
                      <div class="flex items-center text-sm">
                          <div class="items-center text-sm">
                              <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                                  <img class="object-cover w-full h-full rounded-full" src="{{asset('uploads/'.$fav->designer->profile_photo_path)}}">
                                  <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                              </div>
                          </div>
                          <div>
                            {{$fav->designer->name}}
                          </div>
                      </div>
                      </td>
                      <td class="px-4 py-3 text-xs border-t">
                        @php
                        $rate =   App\Models\Evaluation::where('designer_id',$fav->designer->id)->avg('rate');
                        $r =   App\Models\Evaluation::where('designer_id',$fav->designer->id)->get();

                      @endphp
                      {{$rate}}/5 <small class="text-sm">({{count( $r )}} rates)</small>
                      </td>
                     
                      <td class="px-4 py-3 text-xs border-t"> {{$fav->designer->degree}}</td>
                      <td class="px-4 py-3 text-xs border-t">
                        @php
                        $work =   App\Models\SubOrder::where('designer_id',$fav->designer->id)->get();
                        $work2 =   App\Models\Order_Work::where('designer_id',$fav->designer->id)->get();
                        $numOfWorks = count($work)+count($work2);
                      @endphp
                        {{ $numOfWorks}}
                      </td>
                      <td class="px-4 py-3 text-xs border-t">
                        {{$fav->designer->created_at}}
                      </td>
                      <td class=" text-sm border-t"><a class="text-white px-4 py-3 w-auto h-10 bg-black rounded-full hover:bg-gray-800 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" href="{{route('viewDesigner',$fav->designer->id)}}">
                        {{ __('View') }}
                      </a>
                    </td>
                    <td class="text-sm border-t"><a class="text-red-600 px-4 py-3 w-auto h-10 bg-white rounded-full border-2 border-red-600 hover:bg-red-300 active:shadow-lg hover:text-white mouse shadow transition ease-in duration-200 focus:outline-none" href="{{route('user.removeFromFavorite',$fav->id)}}">
                        {{ __('Remove') }}
                      </a></td>
                  </tr>  
                  @endforeach

                </tbody>
              </table>
          </div>
        </div>
    </section>
</x-app-layout>