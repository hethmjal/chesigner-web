<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subscription plans') }}
        </h2>
    </x-slot>

    <section class="container mx-auto p-6">
        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
          <div class="text-center">
            <h2><strong class="text-black">{{ __('List of designers') }}</strong></h2>
          </div>
            <div class="mb-3">
                <a class="text-white px-4 py-2 mb-3 w-auto h-10 bg-black rounded-lg hover:bg-gray-900 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" href="{{ url('/panels/UserPanel/MyProfile') }}">
                    <span>{{ __('Back') }}</span>
                </a>
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
                  <th class="px-4 py-3">{{ __('Subscribed') }}</th>
                </tr>
              </thead>
              <tbody class="bg-white">
              @foreach ($designers as $designer)
                  
                <tr class="text-gray-700">
                    <td class="px-4 py-3 text-xs border-t">
                    {{$designer->id}}
                    </td>
                    <td class="px-4 py-3 border-t">
                    <div class="flex items-center text-sm">
                        <div class="items-center text-sm">
                            <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                                <img class="object-cover w-full h-full rounded-full" src="{{asset("uploads/".$designer->user->profile_photo_path)}}">
                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                            </div>
                        </div>
                        <div>
                          {{$designer->user->name}}
                        </div>
                    </div>
                    </td>
                    <td class="px-4 py-3 text-xs border-t">
                    3.4/5 <small class="text-sm">(20 rates)</small>
                    </td>
                    <td class="px-4 py-3 text-xs border-t">

                        {{$designer->package->name}}

                    </td>
                    <td class="px-4 py-3 text-xs border-t"></td>
                    <td class="px-4 py-3 text-xs border-t">
                      {{$designer->package->number_of_works}}
                    </td>
                    <td class="px-4 py-3 text-xs border-t">
                      {{$designer->user->created_at}}
                    </td>
                    <td class="px-4 py-3 text-sm border-t"><a class="text-white px-4 py-3 w-auto h-10 bg-black rounded-full hover:bg-gray-800 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" href="{{ url("/viewDesigner/{$designer->user->id}") }}">
                      {{ __('View') }}
                    </a>
                  </td>
                  <td class="px-4 py-3 text-xs border-t">
                  <form action="{{route('subscribe.request')}}" method="POST">
                    @csrf
                    <input type="hidden" name="package_id" value="{{$designer->package->id}}">
                    <input type="hidden" name="designer_id" value="{{$designer->user->id}}">
                    <input type="hidden" name="designer_package_id" value="{{$designer->id}}">

                        <button class="text-white px-4 w-auto h-10 bg-green-600 rounded-full hover:bg-green-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" type="submit" >
                        {{ __('Subscribed') }}
                    </button>
                  </form>
                    </td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
    </section>
</x-app-layout>
