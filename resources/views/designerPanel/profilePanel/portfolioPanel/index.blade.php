<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Portfolio') }}
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
            <h2><strong class="text-black">{{ __('Portfolio Projects') }}</strong></h2>
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
                  <th class="px-4 py-3">{{ __('Project photo') }}</th>
                  <th class="px-4 py-3">{{ __('Project name') }}</th>
                  <th class="px-4 py-3">{{ __('Created at') }}</th>
                  <th class="px-4 py-3">{{ __('Edit') }}</th>
                  <th class="px-4 py-3">{{ __('Delete') }}</th>
                </tr>
              </thead>
              <tbody class="bg-white">
                @foreach ($portfolios as $portfolio)
                <tr class="text-gray-700">
                    <td class="px-4 py-3 text-xs border-t">
                    1
                    </td>
                    <td class="px-4 py-3 border-t">
                    <div class="items-center text-sm">
                        <div class="relative w-32 h-32 mr-3 md:block">
                            <img class="object-cover w-full h-full" src="{{$portfolio->image_portfolio}}">
                        </div>
                    </div>
                    </td>
                    <td class="px-4 py-3 text-xs border-t">
                      {{$portfolio->project_name}}
                    </td>
                    <td class="px-4 py-3 text-xs border-t">
                      {{$portfolio->created_at}}
                    </td>
                    <td class="px-4 py-3 text-sm border-t"><a class="text-white px-4 py-3 w-auto h-10 bg-blue-600 rounded-full hover:bg-blue-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" href="{{ url("/panels/DesignerPanel/MyProfile/portfolio/{$portfolio->id}/editPortfolio") }}">
                      {{ __('Edit') }}
                    </a></td>
                    <td class="px-4 py-3 text-sm border-t">
                    <form action="{{route('portfoliodesignerresource.destroy',$portfolio->id)}}" method="post">
                      @method('delete')
                      @csrf

                        <button class="text-white px-4 w-auto h-10 bg-red-600 rounded-full hover:bg-red-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" type="submit" onclick="return confirm('Are you sure you want to delete?')">
                        {{ __('Delete') }}
                    </button>
                    </form>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <br>
        <div class="mb-3">
            <a class="text-white px-4 py-2 mb-3 w-auto h-10 bg-green-600 rounded-full hover:bg-green-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" href="{{ url('/panels/DesignerPanel/MyProfile/portfolio/newPortfolio') }}">
              <span>{{ __('Add new Project') }}</span>
            </a>
        </div>
    </section>
</x-app-layout>
