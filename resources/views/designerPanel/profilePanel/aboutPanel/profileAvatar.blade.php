<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-white">
            {{ __('Profile Avatar - Change images') }}
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
                    <script>
                        var showImg = function(event) {
                            var image = document.getElementById('imgUploded');
                            image.src = URL.createObjectURL(event.target.files[0]);
                        };
                        var showImg2 = function(event) {
                          var image2 = document.getElementById('imgUploded2');
                          image2.src = URL.createObjectURL(event.target.files[0]);
                        };
                    </script>
                    <div class="mt-5">
                        <form action="{{route('designer.avatar')}}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="md:space-y-2 mb-3">
                                <label class="text-xs font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('Profile Imgae') }}<abbr class="hidden" >*</abbr></label>
                                <div class="flex items-center py-6">
                                    
                                    <div class="w-12 h-12 mr-4 flex-none rounded-xl border overflow-hidden">
                                        <img class="w-12 h-12 mr-4 object-cover" id="imgUploded" >
                                        
                                    </div>
                                    <label class="cursor-pointer ">
                                    <span class="focus:outline-none text-white text-sm py-2 px-4 rounded-full bg-indigo-400 hover:bg-indigo-500 hover:shadow-lg">{{ __('Choose an image') }}</span>
                                    <input type="file" class="hidden" accept="image/x-png,image/jpg,image/jpeg" name="image" onchange="showImg(event)" >
                                 
                                </label>
                                </div>
                            </div>
                            <div class="md:space-y-2 mb-3">
                                <label class="text-xs font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('Background Imgae') }}<abbr class="hidden" >*</abbr></label>
                                <div class="flex items-center py-6">
                                    
                                    <div class="w-12 h-12 mr-4 flex-none rounded-xl border overflow-hidden">
                                        <img class="w-12 h-12 mr-4 object-cover" id="imgUploded2" >
                                    </div>
                                    <label class="cursor-pointer ">
                                    <span class="focus:outline-none text-white text-sm py-2 px-4 rounded-full bg-indigo-400 hover:bg-indigo-500 hover:shadow-lg">{{ __('Choose an image') }}</span>
                                    <input type="file" class="hidden" accept="image/x-png,image/jpg,image/jpeg" name="background" onchange="showImg2(event)" >
                                </label>
                                </div>
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
</x-app-layout>