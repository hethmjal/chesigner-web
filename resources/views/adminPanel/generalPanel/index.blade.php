<x-app-layout>
    <x-slot name="header">
     
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('General panel') }}
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
      <div class="mt-3">
        <a class="text-white px-4 py-2 mb-3 w-auto h-10 bg-green-600 rounded-full hover:bg-green-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" onclick="openModal('newImage')">
            <span>{{ __('Add new image') }}</span>
          </a>
      </div>
      <dialog id="newImage" class="bg-transparent z-0 relative w-screen h-screen">
       
        <div class="py-3 sm:max-w-xl sm:mx-auto">
          <div class="bg-white min-w-1xl flex flex-col rounded-xl shadow-lg">
            <div class="px-12 py-5">
              <h2 class="text-gray-800 text-3xl font-semibold">{{__('New image')}}</h2>
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
                        <form action="{{route('slideshow')}}" method="post" enctype="multipart/form-data">
                           
                          @csrf
                            <br>
                            <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                                <div class="mb-3 space-y-2 w-full text-xs">
                                <label class="font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('Arabic Title') }}<abbr title="required">*</abbr></label>
                                <br>
                                <input type="text" class="appearance-none rounded-lg block w-full bg-grey-lighter text-grey-darker border border-grey-lighter" name="artitle" id="title">
                                    @error('artitle')
                                    <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert" >
                                        <p class="ml-6">{{$message}}</p>
                                      </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                              <div class="mb-3 space-y-2 w-full text-xs">
                              <label class="font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('English Title') }}<abbr title="required">*</abbr></label>
                              <br>
                              <input type="text" class="appearance-none rounded-lg block w-full bg-grey-lighter text-grey-darker border border-grey-lighter" name="entitle" id="title">
                                  @error('entitle')
                                  <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert" >
                                      <p class="ml-6">{{$message}}</p>
                                    </div>
                                  @enderror
                              </div>
                          </div>
                            <div class="md:space-y-2 mb-3">
                                <label class="text-xs font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('Details Imgae') }}<abbr class="hidden" >*</abbr></label>
                                <div class="flex items-center py-6">
                                    
                                    <div class="w-12 h-12 mr-4 flex-none rounded-xl border overflow-hidden">
                                        <img class="w-12 h-12 mr-4 object-cover"  id="imgUploded" >
                                        
                                    </div>
                                    <label class="cursor-pointer ">
                                    <span class="focus:outline-none text-white text-sm py-2 px-4 rounded-full bg-indigo-400 hover:bg-indigo-500 hover:shadow-lg">{{ __('Choose an image') }}</span>
                                    <input type="file" class="hidden" accept="image/x-png,image/jpg,image/jpeg" name="image" onchange="showImg(event)" >
                                 
                                </label>
                                </div>
                                @error('image')
                                <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
                                    
                                    <p class="ml-6">{{$message}}</p>
                                  </div>
                                @enderror
                            </div>
                            <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                                <div class="mb-3 space-y-2 w-full text-xs">
                                <label class="font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('Link') }}<abbr title="required">*</abbr></label>
                                <br>
                                <input type="text" class="appearance-none rounded-lg block w-full bg-grey-lighter text-grey-darker border border-grey-lighter" name="link">
                                    @error('link')
                                    <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert" >
                                        <p class="ml-6">{{$message}}</p>
                                      </div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                                <div class="mb-3 space-y-2 w-full text-xs">
                                    <label class="font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('Color') }}<abbr title="required">*</abbr></label>
                                    <input  class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 dark:bg-gray-400" name="color"  type="color">
                                    @error('color')
                                    <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
                                        
                                        <p class="ml-6">{{$message}}</p>
                                      </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="md:space-x-4 w-full text-xs">
                                <p class="font-semibold text-gray-600 py-5 dark:text-gray-100">{{ __('Description') }}<abbr title="required">*</abbr></p>
                                <textarea name="description" rows="10" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 dark:bg-gray-400"> </textarea>
                                @error('description')
                                <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
                                    
                                    <p class="ml-6">{{$message}}</p>
                                  </div>
                                @enderror
                            </div>
                            <div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
                                <a class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100 dark:text-gray-100 dark:bg-gray-500  dark:hover:bg-gray-600" onclick="modalClose('newImage')">{{ __('Cancel') }}  </a>
                                <button class="mb-2 md:mb-0 bg-green-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-500" type="submit">{{ __('Save') }}</button>
                            </div>
                           
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
        </dialog>
      <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
          <div class="text-center">
            <h2><strong class="text-black">{{ __('SlideShow images panel') }}</strong></h2>
          </div>
          <div class="w-full overflow-x-auto">
            <table class="w-full">
              <thead>
                <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                  <th class="px-4 py-3">{{ __('ID') }}</th>
                  <th class="px-4 py-3">{{ __('Title') }}</th>
                  <th class="px-4 py-3">{{ __('link') }}</th>
                  <th class="px-4 py-3">{{ __('description') }}</th>
                  <th class="px-4 py-3">{{ __('Color') }}</th>
                  <th class="px-4 py-3">{{ __('Admin') }}</th>
                  <th class="px-4 py-3">{{ __('Date') }}</th>
                  <th class="px-4 py-3">{{ __('Delete') }}</th>
                </tr>
              </thead>
              <tbody class="bg-white">
                @foreach ($slides as $slide)
                    
                <tr class="text-gray-700 text-center">
                    <td class="px-4 py-3 text-xs border-t">
                    {{$slide->id}}
                    </td>
                    <td class="px-4 py-3 border-t">
                        <div class="items-center text-sm flex">
                            <div class="relative w-20 h-20 mr-3 md:block">
                                <img class="object-cover w-full h-full" src="{{asset("uploads/".$slide->image)}}">
                            </div>
                            <div>
                              {{$slide->artitle}}
                                <br>
                                {{$slide->entitle}}
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3 text-xs border-t">
                      {{$slide->link}}
                    </td>   
                    <td class="px-4 py-3 text-xs border-t">
                      {{$slide->description}}                    </td>     
                    <td class="px-4 py-3 text-xs border-t">
                        <span class="px-2 py-1 font-semibold leading-tight text-gray-300 rounded-sm" style="background-color: {{$slide->color}}"> {{$slide->color}}</span>
                    </td>                      
                    <td class="px-4 py-3 text-xs border-t">
                      {{$slide->admin_id}}
                    </td>
                    <td class="px-4 py-3 text-xs border-t">
                      {{$slide->created_at}}
                    </td>
                    <td class="px-4 py-3 text-sm border-t">
                        <form action="{{route('deleteslide',$slide->id)}}" method="post">
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
        <hr>
        <br>
        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
            <div class="mt-3">
                <a class="text-white px-4 py-2 mb-3 w-auto h-10 bg-green-600 rounded-full hover:bg-green-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" onclick="openModal('TermsAndPolicy')">
                    <span>{{ __('Add') }}</span>
                  </a>
              </div>
            <div class="text-center">
              <h2><strong class="text-black">{{ __('Terms & Policy') }}</strong></h2>
            </div>
            <div class="w-full overflow-x-auto">
              <table class="w-full">
                <thead>
                  <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                    <th class="px-4 py-3">{{ __('Description in Arabic') }}</th>
                    <th class="px-4 py-3">{{ __('Description in English') }}</th>
                    <th class="px-4 py-3">{{ __('Admin') }}</th>
                    <th class="px-4 py-3">{{ __('Date') }}</th>
                    <th class="px-4 py-3">{{ __('Edit') }}</th>
                  </tr>
                </thead>
                <tbody class="bg-white">
                  @foreach ($terms as $term)
                      
                  <tr class="text-gray-700 text-center">
                      <td class="px-4 py-3 text-xs border-t">
                        {{$term->ardes}}
                      </td>   
                      <td class="px-4 py-3 text-xs border-t">
                        {{$term->endes}}

                      </td>                          
                      <td class="px-4 py-3 text-xs border-t">
                        {{$term->admin_id}}

                      </td>
                      <td class="px-4 py-3 text-xs border-t">
                        {{$term->created_at}}

                    </td>
                      <td class="px-4 py-3 text-sm border-t"><a class="text-white px-4 py-3 w-auto h-10 bg-black rounded-full hover:bg-gray-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" onclick="openModal('update{{$term->id}}')">
                          {{ __('Edit') }}
                        </a>
                      </td>
                  </tr>
                  <dialog id="update{{$term->id}}" class="bg-transparent z-0 relative w-screen h-screen">
                   
                    <div class="py-3 sm:max-w-xl sm:mx-auto">
                      <div class="bg-white min-w-1xl flex flex-col rounded-xl shadow-lg">
                        <div class="flex flex-col ">
                            <div class="bg-white shadow-md rounded-3xl p-5 dark:bg-gray-900">
                                <div class="flex flex-col sm:flex-row items-center">
                                    <div class="w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0"></div>
                                </div>
                                <div class="mt-5">
                                    <form action="{{route('updateterms',$term->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <br>
                                        <div class="md:space-x-4 w-full text-xs">
                                            <p class="font-semibold text-gray-600 py-5 dark:text-gray-100">{{ __('Description in arabic') }}<abbr title="required">*</abbr></p>
                                            <textarea name="ardes" rows="10" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 dark:bg-gray-400"> {{$term->ardes}}</textarea>
                                            @error('ardes')
                                            <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
                                                
                                                <p class="ml-6">{{$message}}</p>
                                              </div>
                                            @enderror
                                        </div>
                                        <div class="md:space-x-4 w-full text-xs">
                                            <p class="font-semibold text-gray-600 py-5 dark:text-gray-100">{{ __('Description in english') }}<abbr title="required">*</abbr></p>
                                            <textarea name="endes" rows="10" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 dark:bg-gray-400">{{$term->endes}} </textarea>
                                            @error('endes')
                                            <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
                                                
                                                <p class="ml-6">{{$message}}</p>
                                              </div>
                                            @enderror
                                        </div>
                                        <div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
                                            <a class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100 dark:text-gray-100 dark:bg-gray-500  dark:hover:bg-gray-600" onclick="modalClose('TermsAndPolicy')">{{ __('Cancel') }}  </a>
                                            <button class="mb-2 md:mb-0 bg-green-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-500" type="submit">{{ __('Save') }}</button>
                                        </div>
                                       
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </dialog>
                  @endforeach

                </tbody>
              </table>
            </div>
          </div>
          <dialog id="TermsAndPolicy" class="bg-transparent z-0 relative w-screen h-screen">
          
            <div class="py-3 sm:max-w-xl sm:mx-auto">
              <div class="bg-white min-w-1xl flex flex-col rounded-xl shadow-lg">
                <div class="flex flex-col ">
                    <div class="bg-white shadow-md rounded-3xl p-5 dark:bg-gray-900">
                        <div class="flex flex-col sm:flex-row items-center">
                            <div class="w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0"></div>
                        </div>
                        <div class="mt-5">
                            <form action="{{route('termsandpolicy')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <br>
                                <div class="md:space-x-4 w-full text-xs">
                                    <p class="font-semibold text-gray-600 py-5 dark:text-gray-100">{{ __('Description in arabic') }}<abbr title="required">*</abbr></p>
                                    <textarea name="ardes" rows="10" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 dark:bg-gray-400"> </textarea>
                                    @error('ardes')
                                    <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
                                        
                                        <p class="ml-6">{{$message}}</p>
                                      </div>
                                    @enderror
                                </div>
                                <div class="md:space-x-4 w-full text-xs">
                                    <p class="font-semibold text-gray-600 py-5 dark:text-gray-100">{{ __('Description in english') }}<abbr title="required">*</abbr></p>
                                    <textarea name="endes" rows="10" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 dark:bg-gray-400"> </textarea>
                                    @error('endes')
                                    <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
                                        
                                        <p class="ml-6">{{$message}}</p>
                                      </div>
                                    @enderror
                                </div>
                                <div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
                                    <a class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100 dark:text-gray-100 dark:bg-gray-500  dark:hover:bg-gray-600" onclick="modalClose('TermsAndPolicy')">{{ __('Cancel') }}  </a>
                                    <button class="mb-2 md:mb-0 bg-green-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-500" type="submit">{{ __('Save') }}</button>
                                </div>
                               
                            </form>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            </dialog>
           
     
            <br>
            <hr>
            <br>
            <div class="mt-3">
                <a class="text-white px-4 py-2 mb-3 w-auto h-10 bg-green-600 rounded-full hover:bg-green-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" onclick="openModal('newSocial')">
                    <span>{{ __('Add new link') }}</span>
                  </a>
              </div>
              <dialog id="newSocial" class="bg-transparent z-0 relative w-screen h-screen">
               
                <div class="py-3 sm:max-w-xl sm:mx-auto">
                  <div class="bg-white min-w-1xl flex flex-col rounded-xl shadow-lg">
                    <div class="flex flex-col ">
                        <div class="bg-white shadow-md rounded-3xl p-5 dark:bg-gray-900">
                            <div class="flex flex-col sm:flex-row items-center">
                                <div class="w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0"></div>
                            </div>
                            <script>
                                var showImg2 = function(event) {
                                    var image2 = document.getElementById('imgUploded2');
                                    image2.src = URL.createObjectURL(event.target.files[0]);
                                };
                                </script>
                            <div class="mt-5">
                                <form action="{{route('socialmedia')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <br>
                                    <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                                        <div class="mb-3 space-y-2 w-full text-xs">
                                        <label class="font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('Title') }}<abbr title="required">*</abbr></label>
                                        <br>
                                        <input type="text" class="appearance-none rounded-lg block w-full bg-grey-lighter text-grey-darker border border-grey-lighter" name="title" id="title">
                                            @error('title')
                                            <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert" >
                                                <p class="ml-6">{{$message}}</p>
                                              </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="md:space-y-2 mb-3">
                                        <label class="text-xs font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('Details Imgae') }}<abbr class="hidden" >*</abbr></label>
                                        <div class="flex items-center py-6">
                                            
                                            <div class="w-12 h-12 mr-4 flex-none rounded-xl border overflow-hidden">
                                                <img class="w-12 h-12 mr-4 object-cover" id="imgUploded2" >
                                                
                                            </div>
                                            <label class="cursor-pointer ">
                                            <span class="focus:outline-none text-white text-sm py-2 px-4 rounded-full bg-indigo-400 hover:bg-indigo-500 hover:shadow-lg">{{ __('Choose an image') }}</span>
                                            <input type="file" class="hidden" accept="image/x-png,image/jpg,image/jpeg" name="image" onchange="showImg2(event)" >
                                         
                                        </label>
                                        </div>
                                        @error('image')
                                        <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
                                            
                                            <p class="ml-6">{{$message}}</p>
                                          </div>
                                        @enderror
                                    </div>
                                    <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                                        <div class="mb-3 space-y-2 w-full text-xs">
                                        <label class="font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('Link') }}<abbr title="required">*</abbr></label>
                                        <br>
                                        <input type="text" class="appearance-none rounded-lg block w-full bg-grey-lighter text-grey-darker border border-grey-lighter" name="link">
                                            @error('link')
                                            <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert" >
                                                <p class="ml-6">{{$message}}</p>
                                              </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <br>
                                    <div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
                                        <a class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100 dark:text-gray-100 dark:bg-gray-500  dark:hover:bg-gray-600" onclick="modalClose('newSocial')">{{ __('Cancel') }}  </a>
                                        <button class="mb-2 md:mb-0 bg-green-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-500" type="submit">{{ __('Save') }}</button>
                                    </div>
                                   
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                </dialog>
              <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                  <div class="text-center">
                    <h2><strong class="text-black">{{ __('Social media panel') }}</strong></h2>
                  </div>
                  <div class="w-full overflow-x-auto">
                    <table class="w-full">
                      <thead>
                        <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                          <th class="px-4 py-3">{{ __('ID') }}</th>
                          <th class="px-4 py-3">{{ __('Image') }}</th>
                          <th class="px-4 py-3">{{ __('Title') }}</th>
                          <th class="px-4 py-3">{{ __('link') }}</th>
                          <th class="px-4 py-3">{{ __('Admin') }}</th>
                          <th class="px-4 py-3">{{ __('Date') }}</th>
                          <th class="px-4 py-3">{{ __('Delete') }}</th>
                        </tr>
                      </thead>
                      <tbody class="bg-white">
                        @foreach ($socials as $social)                            
                        <tr class="text-gray-700 text-center">
                            <td class="px-4 py-3 text-xs border-t">
                              {{$social->id}}

                            </td>
                            <td class="px-4 py-3 border-t">
                                <div class="items-center text-sm flex">
                                    <div class="relative w-20 h-20 mr-3 md:block">
                                        <img class="object-cover w-full h-full" src="{{asset("uploads/".$social->image)}}">
                                    </div>
                                   
                                </div>
                            </td>
                            <td class="px-4 py-3 text-xs border-t"> 
                              {{$social->title}}

                          </td>
                            <td class="px-4 py-3 text-xs border-t">
                              {{$social->link}}

                            </td>                       
                            <td class="px-4 py-3 text-xs border-t">
                              {{$social->admin_id}}

                            </td>
                            <td class="px-4 py-3 text-xs border-t">
                                {{$social->created_at}}
                            </td>
                          
                            <td class="px-4 py-3 text-sm border-t">
                                <form action="{{route('deletesocialmedia',$social->id)}}" method="post">
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
            <hr>
            <br>
            <div class="mt-3"></div>
              <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                  <div class="text-center">
                    <h2><strong class="text-black">{{ __('About Us') }}</strong></h2>
                  </div>
                  <div class="w-full">
                    <div class="mt-5 p-5 bg-white">
                      <form action="{{route('addaboutus')}}" method="post" enctype="">
                          @csrf
                          <br>
                          <div class="md:space-x-4 w-full text-xs">
                              <p class="font-semibold text-gray-600 py-5 dark:text-gray-100">{{ __('About Us in arabic') }}<abbr title="required">*</abbr></p>
                              <textarea name="arbody" rows="10" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 dark:bg-gray-400">@if ($aboutus){!!$aboutus->arbody!!}   @endif </textarea>
                              @error('arbody')
                              <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
                                  
                                  <p class="ml-6">{{$message}}</p>
                                </div>
                              @enderror
                          </div>
                          <div class="md:space-x-4 w-full text-xs">
                              <p class="font-semibold text-gray-600 py-5 dark:text-gray-100">{{ __('About Us in english') }}<abbr title="required">*</abbr></p>
                              <textarea name="enbody" rows="10" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 dark:bg-gray-400">@if ($aboutus){!!$aboutus->enbody!!}   @endif </textarea>
                              @error('enbody')
                              <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
                                  
                                  <p class="ml-6">{{$message}}</p>
                                </div>
                              @enderror
                          </div>
                          <div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
                              <a class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100 dark:text-gray-100 dark:bg-gray-500  dark:hover:bg-gray-600" onclick="modalClose('TermsAndPolicy')">{{ __('Cancel') }}  </a>
                              <button class="mb-2 md:mb-0 bg-green-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-500" type="submit">{{ __('Save') }}</button>
                          </div>
                         
                      </form>
                  </div>
                  </div>
                </div>
            <br>
            <hr>
            <br>
            <div class="mt-3">
              <a class="text-white px-4 py-2 mb-3 w-auto h-10 bg-green-600 rounded-full hover:bg-green-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" onclick="openModal('newBlog')">
                  <span>{{ __('Add new blog') }}</span>
                </a>
            </div>
            <dialog id="newBlog" class="bg-transparent z-0 relative w-screen h-screen">
             
              <div class="py-3 sm:max-w-xl sm:mx-auto">
                <div class="bg-white min-w-1xl flex flex-col rounded-xl shadow-lg">
                  <div class="flex flex-col ">
                      <div class="bg-white shadow-md rounded-3xl p-5 dark:bg-gray-900">
                          <div class="flex flex-col sm:flex-row items-center">
                              <div class="w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0"></div>
                          </div>
                          <script>
                              var showImg3 = function(event) {
                                  var image3 = document.getElementById('imgUploded3');
                                  image3.src = URL.createObjectURL(event.target.files[0]);
                              };
                              </script>
                          <div class="mt-5">
                              <form action="{{route('addblog')}}" method="post" enctype="multipart/form-data">
                                  @csrf
                                  <br>
                                  <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                                      <div class="mb-3 space-y-2 w-full text-xs">
                                      <label class="font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('Title in arabic') }}<abbr title="required">*</abbr></label>
                                      <br>
                                      <input type="text" class="appearance-none rounded-lg block w-full bg-grey-lighter text-grey-darker border border-grey-lighter" name="artitle" id="title">
                                          @error('artitle')
                                          <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert" >
                                              <p class="ml-6">{{$message}}</p>
                                            </div>
                                          @enderror
                                      </div>

                                      <div class="mb-3 space-y-2 w-full text-xs">
                                        <label class="font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('Title in english') }}<abbr title="required">*</abbr></label>
                                        <br>
                                        <input type="text" class="appearance-none rounded-lg block w-full bg-grey-lighter text-grey-darker border border-grey-lighter" name="entitle" id="titleen">
                                            @error('entitle')
                                            <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert" >
                                                <p class="ml-6">{{$message}}</p>
                                              </div>
                                            @enderror
                                        </div>
                                  </div>
                                  <div class="md:space-y-2 mb-3">
                                      <label class="text-xs font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('Imgae') }}<abbr class="hidden" >*</abbr></label>
                                      <div class="flex items-center py-6">
                                          
                                          <div class="w-12 h-12 mr-4 flex-none rounded-xl border overflow-hidden">
                                              <img class="w-12 h-12 mr-4 object-cover" id="imgUploded3" >
                                              
                                          </div>
                                          <label class="cursor-pointer ">
                                          <span class="focus:outline-none text-white text-sm py-2 px-4 rounded-full bg-indigo-400 hover:bg-indigo-500 hover:shadow-lg">{{ __('Choose an image') }}</span>
                                          <input type="file" class="hidden" accept="image/x-png,image/jpg,image/jpeg" name="image" onchange="showImg3(event)" >
                                       
                                      </label>
                                      </div>
                                      @error('image')
                                      <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
                                          
                                          <p class="ml-6">{{$message}}</p>
                                        </div>
                                      @enderror
                                  </div>
                                  <div class="md:space-x-4 w-full text-xs">
                                    <p class="font-semibold text-gray-600 py-5 dark:text-gray-100">{{ __('Description in arabic') }}<abbr title="required">*</abbr></p>
                                    <textarea name="ardescription" rows="10" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 dark:bg-gray-400"> </textarea>
                                      @error('ardescription')
                                      <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
                                          
                                          <p class="ml-6">{{$message}}</p>
                                        </div>
                                      @enderror
                                  </div>
                                  <div class="md:space-x-4 w-full text-xs">
                                      <p class="font-semibold text-gray-600 py-5 dark:text-gray-100">{{ __('Description in english') }}<abbr title="required">*</abbr></p>
                                      <textarea name="endescription" rows="10" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 dark:bg-gray-400"> </textarea>
                                      @error('endescription')
                                      <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
                                          
                                          <p class="ml-6">{{$message}}</p>
                                        </div>
                                      @enderror
                                  </div>
                                  <br>
                                  <div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
                                      <a class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100 dark:text-gray-100 dark:bg-gray-500  dark:hover:bg-gray-600" onclick="modalClose('newBlog')">{{ __('Cancel') }}  </a>
                                      <button class="mb-2 md:mb-0 bg-green-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-500" type="submit">{{ __('Save') }}</button>
                                  </div>
                                 
                              </form>
                          </div>
                      </div>
                  </div>
                  </div>
              </div>
              </dialog>
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
              <div class="text-center">
                <h2><strong class="text-black">{{ __('Blog panel') }}</strong></h2>
              </div>
              <div class="w-full overflow-x-auto">
                <table class="w-full">
                  <thead>
                    <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                      <th class="px-4 py-3">{{ __('ID') }}</th>
                      <th class="px-4 py-3">{{ __('Image') }}</th>
                      <th class="px-4 py-3">{{ __('Title') }}</th>
                      <th class="px-4 py-3">{{ __('Description in Arabic') }}</th>
                      <th class="px-4 py-3">{{ __('Description in English') }}</th>
                      <th class="px-4 py-3">{{ __('Admin') }}</th>
                      <th class="px-4 py-3">{{ __('Date') }}</th>
                      <th class="px-4 py-3">{{ __('Edit') }}</th>
                      <th class="px-4 py-3">{{ __('Delete') }}</th>
                    </tr>
                  </thead>
                  <tbody class="bg-white"> 
                    @foreach ($blogs as $blog)
                        
                    <tr class="text-gray-700 text-center">
                        <td class="px-4 py-3 text-xs border-t">
                          {{$blog->id}}
                        </td>
                        <td class="px-4 py-3 border-t">
                            <div class="items-center text-sm flex">
                                <div class="relative w-20 h-20 mr-3 md:block">
                                    <img class="object-cover w-full h-full" src="{{asset("uploads/".$blog->image)}}">
                                </div>
                               
                            </div>
                        </td>
                        <td class="px-4 py-3 text-xs border-t"> 
                          {{$blog->entitle}} |  {{$blog->artitle}}

                      </td>
                        <td class="px-4 py-3 text-xs border-t">
                          {!!$blog->ardescription!!}
                        </td>                       
                        <td class="px-4 py-3 text-xs border-t">
                          {!!$blog->endescription!!}
                        </td>
                        <td class="px-4 py-3 text-xs border-t">
                          {{$blog->admin->name}}
                      </td>
                        <td class="px-4 py-3 text-xs border-t">
                            {{$blog->created_at}}
                        </td>
                        <td class="px-4 py-3 text-sm border-t">
                          <a class="text-white px-4 py-2 mb-3 w-auto h-10 bg-green-600 rounded-full hover:bg-green-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" onclick="openModal('updateBlog{{$blog->id}}')">
                            <span>{{ __('Edit') }}</span>
                          </a>
                        </td>
                        <td class="px-4 py-3 text-sm border-t">
                            <form action="{{route('deleteblog',$blog->id)}}" method="post">
                              @csrf
                                <button class="text-white px-4 w-auto h-10 bg-red-600 rounded-full hover:bg-red-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none" type="submit" onclick="return confirm('Are you sure you want to delete?')">
                                {{ __('Delete') }}
                                </button>
                            </form>
                          
                        </td>
                    </tr>
                    <dialog id="updateBlog{{$blog->id}}" class="bg-transparent z-0 relative w-screen h-screen">
             
                      <div class="py-3 sm:max-w-xl sm:mx-auto">
                        <div class="bg-white min-w-1xl flex flex-col rounded-xl shadow-lg">
                          <div class="flex flex-col ">
                              <div class="bg-white shadow-md rounded-3xl p-5 dark:bg-gray-900">
                                  <div class="flex flex-col sm:flex-row items-center">
                                      <div class="w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0"></div>
                                  </div>
                                  <script>
                                      var showImg3 = function(event) {
                                          var image3 = document.getElementById('imgUploded3');
                                          image3.src = URL.createObjectURL(event.target.files[0]);
                                      };
                                      </script>
                                  <div class="mt-5">
                                      <form action="{{route('updateblog',$blog->id)}}" method="post" enctype="multipart/form-data">
                                          @csrf
                                          <br>
                                          <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                                              <div class="mb-3 space-y-2 w-full text-xs">
                                              <label class="font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('Title in arabic') }}<abbr title="required">*</abbr></label>
                                              <br>
                                              <input type="text" value="{{$blog->artitle}}" class="appearance-none rounded-lg block w-full bg-grey-lighter text-grey-darker border border-grey-lighter" name="artitle" id="title">
                                                  @error('artitle')
                                                  <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert" >
                                                      <p class="ml-6">{{$message}}</p>
                                                    </div>
                                                  @enderror
                                              </div>
        
                                              <div class="mb-3 space-y-2 w-full text-xs">
                                                <label class="font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('Title in english') }}<abbr title="required">*</abbr></label>
                                                <br>
                                                <input type="text" value="{{$blog->entitle}}" class="appearance-none rounded-lg block w-full bg-grey-lighter text-grey-darker border border-grey-lighter" name="entitle" id="titleen">
                                                    @error('entitle')
                                                    <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert" >
                                                        <p class="ml-6">{{$message}}</p>
                                                      </div>
                                                    @enderror
                                                </div>
                                          </div>
                                          <div class="md:space-y-2 mb-3">
                                              <label class="text-xs font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('Imgae') }}<abbr class="hidden" >*</abbr></label>
                                              <div class="flex items-center py-6">
                                                  
                                                  <div class="w-12 h-12 mr-4 flex-none rounded-xl border overflow-hidden">
                                                      <img class="w-12 h-12 mr-4 object-cover" src="{{asset('uploads/'.$blog->image)}}" id="imgUploded3" >
                                                      
                                                  </div>
                                                  <label class="cursor-pointer ">
                                                  <span class="focus:outline-none text-white text-sm py-2 px-4 rounded-full bg-indigo-400 hover:bg-indigo-500 hover:shadow-lg">{{ __('Choose an image') }}</span>
                                                  <input type="file" class="hidden" accept="image/x-png,image/jpg,image/jpeg" name="image" onchange="showImg3(event)" >
                                               
                                              </label>
                                              </div>
                                              @error('image')
                                              <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
                                                  
                                                  <p class="ml-6">{{$message}}</p>
                                                </div>
                                              @enderror
                                          </div>
                                          <div class="md:space-x-4 w-full text-xs">
                                            <p class="font-semibold text-gray-600 py-5 dark:text-gray-100">{{ __('Description in arabic') }}<abbr title="required">*</abbr></p>
                                            <textarea name="ardescription" rows="10" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 dark:bg-gray-400">{!!$blog->ardescription!!} </textarea>
                                              @error('ardescription')
                                              <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
                                                  
                                                  <p class="ml-6">{{$message}}</p>
                                                </div>
                                              @enderror
                                          </div>
                                          <div class="md:space-x-4 w-full text-xs">
                                              <p class="font-semibold text-gray-600 py-5 dark:text-gray-100">{{ __('Description in english') }}<abbr title="required">*</abbr></p>
                                              <textarea name="endescription" rows="10" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 dark:bg-gray-400">{!!$blog->endescription!!} </textarea>
                                              @error('endescription')
                                              <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
                                                  
                                                  <p class="ml-6">{{$message}}</p>
                                                </div>
                                              @enderror
                                          </div>
                                          <br>
                                          <div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
                                              <a class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100 dark:text-gray-100 dark:bg-gray-500  dark:hover:bg-gray-600" onclick="modalClose('updateBlog{{$blog->id}}')">{{ __('Cancel') }}  </a>
                                              <button class="mb-2 md:mb-0 bg-green-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-500" type="submit">{{ __('Save') }}</button>
                                          </div>
                                         
                                      </form>
                                  </div>
                              </div>
                          </div>
                          </div>
                      </div>
                      </dialog>
                    @endforeach                         

                  </tbody>
                </table>
                
              </div>
            </div>
    </section>
    <script src="{{asset('/js/modalpopup.js')}}"></script>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'arbody' );
        CKEDITOR.replace( 'enbody' );
        CKEDITOR.replace( 'ardescription' );
        CKEDITOR.replace( 'endescription' );
    </script>
</x-app-layout>
