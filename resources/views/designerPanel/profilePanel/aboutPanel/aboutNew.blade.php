<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-white">
          
            @if ($about)
            {{ __('About - Update') }}

            @else
            {{ __('About - Add New') }}

            @endif
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mb-5">
                <a href="{{url('/panels/DesignerPanel/MyProfile/about')}}" class="p-3 bg-black text-white rounded">{{ __('Back') }}</a>
            </div>
            <div class="flex flex-col ">
                <div class="bg-white shadow-md rounded-3xl p-5 dark:bg-gray-900">
                    <div class="flex flex-col sm:flex-row items-center">
                        <div class="w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0"></div>
                    </div>

                    <div class="mt-5">
                        <form action="{{route('aboutdesignerresource.store')}}" method="post">
                            @csrf
                            @error('body')
                            <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
                                
                                <p class="ml-6">{{$message}}</p>
                              </div>
                            @enderror
                            <div class="md:space-x-4 w-full text-xs">
                                <p class="font-semibold text-gray-600 py-5 dark:text-gray-100">{{ __('About') }}<abbr title="required">*</abbr></p>
                                <textarea name="body" rows="10" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 dark:bg-gray-400"> 
                                     @if ($about)
                                     {!!$about->body!!}
                                @else
                                    
                                @endif</textarea>
                              
                            </div>
                            <div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
                                <a class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100 dark:text-gray-100 dark:bg-gray-500  dark:hover:bg-gray-600" href="{{url('/panels/DesignerPanel/MyProfile/about')}}">{{ __('Cancel') }}  </a>
                                <button class="mb-2 md:mb-0 bg-green-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-500" type="submit">{{ __('Save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace( 'body' );
    </script>
</x-app-layout>