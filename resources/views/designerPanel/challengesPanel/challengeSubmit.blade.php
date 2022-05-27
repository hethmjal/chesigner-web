<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-white">
            {{ __('Challenge - Submit Work') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mb-5">
                <a href="{{url('/panels/DesignerPanel/MyChallenges')}}" class="p-3 bg-black text-white rounded">{{ __('Back') }}</a>
            </div>
            <div class="flex flex-col ">
                <div class="bg-white shadow-md rounded-3xl p-5 dark:bg-gray-900">
                    <div class="flex flex-col sm:flex-row items-center">
                        <div class="w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0"></div>
                    </div>
                    <script>
                        var showImg = function(event) {
                            var image = document.getElementById('imgUploded');
                            image.src = URL.createObjectURL(event.target.files[0]);
                        };
                        </script>
                    <div class="mt-5">
                        <form action="{{route('challengedesignerresource.update',$work->id)}}" method="post" enctype="multipart/form-data">
                            @method('put')
                            @csrf

                            <div class="md:space-y-2 mb-3 flex flex-col inline-block flex">
                                <label class="text-xs font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('Profile Image') }}<abbr class="hidden" title="required">*</abbr></label>
                                <div class="flex items-center py-6 block table">
                                    <div class="w-12 h-12 mr-4 flex-none rounded-xl border overflow-hidden">
                                        <img class="w-12 h-12 mr-4 object-cover"  id="imgUploded" src="{{asset('uploads/'.$work->image)}}">
                                    </div>
                                    <br>
                                    @if (!$work->image)

                                    <label class="cursor-pointer ">
                                    <span class="focus:outline-none text-white text-sm py-2 px-4 rounded-full bg-indigo-400 hover:bg-indigo-500 hover:shadow-lg">{{ __('Choose an image') }}</span>
                                  <input type="file" class="hidden" accept="image/x-png,image/jpg,image/jpeg" name="image" onchange="showImg(event)" required>
  
                                  @endif 
                                    @error('image')
                                    <p class="text-red-600">{{$message}}</p>
                                    @enderror
                                </label>
                                </div>
                            </div>
                            <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                                <div class="mb-3 space-y-2 w-full text-xs">
                                    <label class="font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('Files') }}</label>
                                    @if (!$work->file)

                                    <input type="file" accept="" name="file">
                                    @else 
                                    {{$work->file}}
                                    @endif
                                <small>{{ __('Such as') }} | PDF - PSD Only</small>
                                </div>
                            </div>
                            @if (!$work->file)

                            <div class="md:space-x-4 w-full text-xs">
                                <p class="font-semibold text-gray-600 py-5 dark:text-gray-100">{{ __('Note') }}<abbr title="required">*</abbr></p>
                                <textarea name="note" rows="10" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 dark:bg-gray-400"> </textarea>
                            </div>
                            <div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
                                <a class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100 dark:text-gray-100 dark:bg-gray-500  dark:hover:bg-gray-600" href="{{url('/panels/DesignerPanel/MyChallenges')}}">{{ __('Cancel') }}  </a>
                                <button class="mb-2 md:mb-0 bg-green-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-500" type="submit">{{ __('Save') }}</button>
                            </div>
                            @endif
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