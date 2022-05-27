<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Education') }}
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
            <h2><strong class="text-black">{{ __('Education list') }}</strong></h2>
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
                  <th class="px-4 py-3">{{ __('Specialization') }}</th>
                  <th class="px-4 py-3">{{ __('Type') }}</th>
                  <th class="px-4 py-3">{{ __('From (Date)') }}</th>
                  <th class="px-4 py-3">{{ __('To (Date)') }}</th>
                  <th class="px-4 py-3">{{ __('University / College /Institute name') }}</th>
                  <th class="px-4 py-3">{{ __('Created at') }}</th>
                  <th class="px-4 py-3">{{ __('Edit') }}</th>
                  <th class="px-4 py-3">{{ __('Delete') }}</th>
                </tr>
              </thead>
              <tbody class="bg-white">
                @foreach ($educations as $education)
                    
                <tr class="text-gray-700">
                    <td class="px-4 py-3 text-xs border-t">
                    {{$education->id}}
                    </td>
                    <td class="px-4 py-3 text-xs border-t">
                        {{$education->specialization}}
                    </td>
                    <td class="px-4 py-3 text-xs border-t">
                        {{$education->degree}}
                    </td>
                    <td class="px-4 py-3 text-xs border-t">
                      {{$education->from}}
                    </td>
                    <td class="px-4 py-3 text-xs border-t">
                      {{$education->to}}
                    </td>
                    <td class="px-4 py-3 text-xs border-t">
                      {{$education->university}}
                    </td>
                    <td class="px-4 py-3 text-xs border-t">
                      {{$education->created_at}}
                    </td>
                    <td class="px-4 py-3 text-sm border-t"><a class="text-white px-4 py-3 w-auto h-10 bg-blue-600 rounded-full hover:bg-blue-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" href="{{ url("/panels/DesignerPanel/MyProfile/education/{$education->id}/editEducation") }}">
                      {{ __('Edit') }}
                    </a></td>
                    <td class="px-4 py-3 text-sm border-t">
                    <form action="{{route('educationdesignerresource.destroy',$education->id)}}" method="POST">
                      @method('DELETE')
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
        <div class="mt-3">
            <a class="text-white px-4 py-2 mb-3 w-auto h-10 bg-green-600 rounded-full hover:bg-green-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" href="{{ url('/panels/DesignerPanel/MyProfile/education/newEducation') }}">
              <span>{{ __('Add new') }}</span>
            </a>
        </div>
    </section>
</x-app-layout>
