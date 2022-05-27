<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }} | Show #1
        </h2>
    </x-slot>

    <section class="container mx-auto p-6">
        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
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
                  <th class="px-4 py-3">{{ __('Client') }}</th>
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
                      {{$order->user->name}}
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
          </div>
        </div>
    </section>
</x-app-layout>
