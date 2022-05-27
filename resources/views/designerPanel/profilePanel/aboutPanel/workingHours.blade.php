<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Working Hours') }}
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
            <h2><strong class="text-black">{{ __('Working Hours') }}</strong></h2>
          </div>
          <div class="mb-3">
            <a class="text-white px-4 py-2 mb-3 w-auto h-10 bg-black rounded-lg hover:bg-gray-900 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" href="{{ url('/panels/DesignerPanel/MyProfile/about') }}">
              <span>{{ __('Back') }}</span>
            </a>
        </div>
          <div class="w-full overflow-x-auto">
            <table class="w-full">
              <thead>
                <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                  <th class="px-4 py-3">{{ __('ID') }}</th>
                  <th class="px-4 py-3">{{ __('Working Hours / Day') }}</th>
                  <th class="px-4 py-3">{{ __('Created at') }}</th>
                  <th class="px-4 py-3">{{ __('Edit') }}</th>
                </tr>
              </thead>
              <tbody class="bg-white">
                @foreach ($hours as $hour)
                    
                
                <tr class="text-gray-700">
                    <td class="px-4 py-3 text-xs border-t">
                    {{$hour->id}}
                    </td>
                    <td class="px-4 py-3 text-xs border-t">
                       {{$hour->hours}} / {{ __('Day') }}
                    </td>
                    <td class="px-4 py-3 text-xs border-t">
                        {{$hour->created_at}}
                    </td>
                    <td class="px-4 py-3 text-sm border-t"><a class="text-white px-4 py-3 w-auto h-10 bg-blue-600 rounded-full hover:bg-blue-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" href="{{route('workinghourdesignerresource.edit',$hour->id) }}">
                      {{ __('Edit') }}
                    </a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        @if ($hours->count()>0)
             @else 
        <div class="mt-3">
            <a class="text-white px-4 py-2 mb-3 w-auto h-10 bg-green-600 rounded-full hover:bg-green-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" href="{{ url('/panels/DesignerPanel/MyProfile/workinghours/newWorkinghour') }}">
             <span>{{ __('Add new') }}</span>
            </a>
          </div>
             @endif
             
       
    </section>
</x-app-layout>