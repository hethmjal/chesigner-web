<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-white">
            {{ __('Edit order') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mb-5">
                <a href="{{url('/panels/UserPanel/Orders')}}" class="p-3 bg-black text-white rounded">{{ __('Back') }}</a>
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
                        <form action="{{   route('orderuserresource.update',$order->id) }}" method="post" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <br>
                            <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                                <div class="mb-3 space-y-2 w-full text-xs">
                                    <label class="font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('Title') }}<abbr title="required">*</abbr></label>
                          <br>
                                    <input type="text" value="{{$order->title}}" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter" name="title" id="title">
                                    @error('title')
                                    <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert" >
                                        
                                        <p class="ml-6">{{$message}}</p>
                                      </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="md:space-y-2 mb-3">
                                <label class="text-xs font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('Details Imgae') }}<abbr class="hidden" title="required">*</abbr></label>
                                <div class="flex items-center py-6">
                                    
                                    <div class="w-12 h-12 mr-4 flex-none rounded-xl border overflow-hidden">
                                        <img class="w-12 h-12 mr-4 object-cover" src="{{$order->image_order}}" id="imgUploded" >
                                    </div>
                                    <label class="cursor-pointer ">
                                    <span class="focus:outline-none text-white text-sm py-2 px-4 rounded-full bg-indigo-400 hover:bg-indigo-500 hover:shadow-lg">{{ __('Choose an image') }}</span>
                                    <input type="file" class="hidden" accept="image/x-png,image/jpg,image/jpeg" name="image" onchange="showImg(event)" >
                                    </label>
                                </div>
                                @error('image')
                                <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert" >
                                    
                                    <p class="ml-6">{{$message}}</p>
                                  </div>
                                @enderror
                            </div>
                            <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                                <div class="mb-3 space-y-2 w-full text-xs">
                                    <label class="font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('Type') }}<abbr title="required">*</abbr></label>
                                    <select class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full dark:bg-gray-400" required="required" name="type" id="">
                                        <option value="Graphic design">{{ __('Graphic design') }}</option>
                                        <option value="Motion Graphic">{{ __('Motion Graphic') }}</option>
                                        <option value="Video Editing">{{ __('Video Editing') }}</option>
                                        <option value="Animation">{{ __('Animation') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                                <div class="mb-3 space-y-2 w-full text-xs">
                                    <label class="font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('Designers') }}<abbr title="required">*</abbr></label>
                                    <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 dark:bg-gray-400 search" type="text" name="" placeholder="Search for designer">
                                </div>
                                @error('image')
                                <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert" >
                                    
                                    <p class="ml-6">{{$message}}</p>
                                  </div>
                                @enderror
                            </div>
                            <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                                <div class="w-full grid grid-cols-1 md:grid-cols-3 gap-6 div_designer">
                                   
                                        
                                     <div class="bg-gray-100 rounded-lg p-6">
                                        <div class="flex items-center space-x-6 mb-4">
                                            <img class="h-28 w-28 object-cover object-center rounded-full" 
                                            src="{{asset("/images/no-photo.png")}}" alt="photo">
                                            <div>
                                                <p class="text-xl text-gray-700 font-normal mb-1">{{$designer->name}}</p>
                                                <p class="text-base text-blue-600 font-normal">Professional</p>
                                            </div>
                                        </div>
                                        <div class="flex justify-center items-center">
                                            <div class="flex items-center mt-2 mb-4">
                                              @foreach ($designer->skills as $skill)
                                              <div>
                                                <span class="px-2 py-1 mx-1 font-semibold leading-tight text-blue-700 bg-blue-100 rounded-sm">
                                                    {{ __($skill->skills) }} 
                                                </span>
                                            </div>
                                              @endforeach
                                             
                                            </div>
                                        </div>
                                        <div class="flex justify-center items-center">
                                            <div class="flex items-center mt-2 mb-4">
                                              <svg class="mx-1 w-4 h-4 fill-current text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                              <svg class="mx-1 w-4 h-4 fill-current text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                              <svg class="mx-1 w-4 h-4 fill-current text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                              <svg class="mx-1 w-4 h-4 fill-current text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                              <svg class="mx-1 w-4 h-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            </div>
                                        </div>
                                    </div> 
                                   

                                    
                                </div>
                            </div>
                         
                           
                            <br>
                            <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                                <div class="mb-3 space-y-2 w-full text-xs">
                                    <label class="font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('Deadline') }}<abbr title="required">*</abbr></label>
                                    <input  class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 dark:bg-gray-400" value="{{$order->date}}" name="deadline" required="required" type="datetime-local">
                                    @error('deadline')
                                   
                                    @enderror
                                </div>
                            </div>
                            <div class="md:space-x-4 w-full text-xs">
                                <p class="font-semibold text-gray-600 py-5 dark:text-gray-100">{{ __('Description') }}<abbr title="required">*</abbr></p>
                                <textarea name="description" rows="10" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 dark:bg-gray-400">{{$order->description}}</textarea>
                                @error('description')
                                <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert" >
                                    
                                   {{----}} <p class="ml-6">{{$message}}</p>
                                  </div>
                                @enderror
                            </div>
                            <div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
                                <a class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100 dark:text-gray-100 dark:bg-gray-500  dark:hover:bg-gray-600" href="{{url('/panels/UserPanel/Orders')}}">{{ __('Cancel') }}  </a>
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
        /*
        $('.search').on('keyup', function(){
            search();
        });

        search();
        function search(){
             var keyword = $('.search').val();
             $.post('{{ route("search") }}',
              {
                 _token: $('meta[name="csrf-token"]').attr('content'),
                 keyword:keyword
               },
               function(data){
                   // table_post_row(data);
                  console.log(data);
                  let =div_designer ='';
                  let =div_skills ='';
               for (let i = 0; i < data.length; i++) {
               // console.log('hh');
                    for (let l = 0; l < data[i]['skills'].length; l++) {
                        console.log( data[i]['skills'][l]['skills']);             
                         div_skills +=    ` <div>
                                          <span class="px-2 py-1 mx-1 font-semibold leading-tight text-blue-700 bg-blue-100 rounded-sm">`+
                                                    data[i]['skills'][l]['skills']
                                          +` </span>
                                     </div>`
                         }
                           
             div_designer +=  `<div class="bg-gray-100 rounded-lg p-6">
                <input type="checkbox" name="designer_id[]" id="" value=`+data[i]['id'] +`>
                                        <div class="flex items-center space-x-6 mb-4">
                                            <img class="h-28 w-28 object-cover object-center rounded-full" 
                                            src=`+"'/images/no-photo.png'"  + `alt="photo">
                                            <div>
                                                <p class="text-xl text-gray-700 font-normal mb-1">`+data[i]['name']+`</p>
                                                <p class="text-base text-blue-600 font-normal">Professional</p>
                                            </div>
                                        </div>
                                        <div class="flex justify-center items-center">
                                            <div class="flex items-center mt-2 mb-4">`+
                                            div_skills
                                             
                                            +`</div>
                                        </div>
                                        <div class="flex justify-center items-center">
                                            <div class="flex items-center mt-2 mb-4">
                                              <svg class="mx-1 w-4 h-4 fill-current text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                              <svg class="mx-1 w-4 h-4 fill-current text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                              <svg class="mx-1 w-4 h-4 fill-current text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                              <svg class="mx-1 w-4 h-4 fill-current text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                              <svg class="mx-1 w-4 h-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            </div>
                                        </div>
                                    </div>  `
                                    div_skills ='';
                            //   console.log(div_designer);
                                }
              //   console.log(div_designer);
                $('.div_designer').html(div_designer);
               });
        }
        */
    </script>

    <script>
        CKEDITOR.replace( 'body' );
    </script>
</x-app-layout>