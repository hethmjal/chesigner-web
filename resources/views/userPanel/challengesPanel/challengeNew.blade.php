<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-white">
            {{ __('Add new challenge') }}
        </h2>
      
    </x-slot>
   
    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mb-5">
                <a href="{{url('/panels/UserPanel/MyChallenges')}}" class="p-3 bg-black text-white rounded">{{ __('Back') }}</a>
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
                        <form action="{{route('challengeuseresource.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <br>
                            <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                                <div class="mb-3 space-y-2 w-full text-xs">
                                    <label class="font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('Title') }}<abbr title="required">*</abbr></label>
                                    <input type="text" value="{{old('title')}}" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg" name="title" id="">
                                    @error('title')
                                    <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
                                        <p class="ml-6">{{$message}}</p>
                                      </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                                <div class="mb-3 space-y-2 w-full text-xs">
                                    <label class="font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('Challenge Type') }}<abbr title="required">*</abbr></label>
                                    <select id="type" class=" block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full dark:bg-gray-400"  name="challenge_type" id="">
                                        <option value="Public">{{ __('Public Challenge') }}</option>
                                        <option value="Favorite">{{ __('Favorite Designers Challenge') }}</option>
                                    </select>
                                    @error('challenge_type')
                                    <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
                                        
                                        <p class="ml-6">{{$message}}</p>
                                      </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                                <div class="mb-3 space-y-2 w-full text-xs">
                                    <label class="font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('Design Type') }}<abbr title="required">*</abbr></label>
                                    <select class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full dark:bg-gray-400"  name="design_type" id="">
                                        <option value="Graphic design">{{ __('Graphic design') }}</option>
                                        <option value="Motion Graphic">{{ __('Motion Graphic') }}</option>
                                        <option value="Video Editing">{{ __('Video Editing') }}</option>
                                        <option value="Animation">{{ __('Animation') }}</option>
                                    </select>
                                    @error('type')
                                    <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
                                        
                                        <p class="ml-6">{{$message}}</p>
                                      </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="md:space-y-2 mb-3">
                                <label class="text-xs font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('Details Imgae') }}<abbr class="hidden" >*</abbr></label>
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
                            <label class="font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('Video') }}</label>

                            <div class="md:space-y-2 mb-3">
                                <div class="flex items-center py-6">
                                    
                                    <div class=" mr-4 flex-none rounded-xl border overflow-hidden">
                                            <video id="blah"  class="hidden" width="240" height="240" controls>
                                                <source  src="" type="video/mp4">
                                                Your browser does not support the video tag.
                                              </video>
                                    </div>
                                    <label class="cursor-pointer ">
                                        <span class="focus:outline-none text-white text-sm py-2 px-4 rounded-full bg-indigo-400 hover:bg-indigo-500 hover:shadow-lg">{{ __('Choose an video') }}</span>
                                        <input type="file" class="hidden" name="video" id="imgInp" >
                                     
                                    </label>
                                </div>
                              
                            </div>

                            <label class="font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('Voice') }}</label>

                            <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                                <div class="mb-3 space-y-2 w-full text-xs">
                                   
                                    <div id="controls">
                                        <button class="mb-2 md:mb-0 bg-green-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-500" id="recordButton">Record</button>
                                        <input  type="hidden" class="mb-2 md:mb-0 bg-green-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-blue-500" id="pauseButton" disabled/>
                                        <button class="mb-2 md:mb-0 bg-green-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:red-500" id="stopButton" disabled>Stop</button>
                                     </div>
                                     <div id="formats"></div>
                                       <p><strong>Recordings:</strong></p>
                                       <ol id="recordingsList"></ol>
                                </div>
                            </div>



                            <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                                <div class="mb-3 space-y-2 w-full text-xs">
                                    <label class="font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('Expert Designer') }}<abbr title="required">*</abbr></label>
                                    <input type="number" value="{{old('expert')}}" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg" name="expert" min="0" id="">
                                    @error('expert')
                                    <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
                                        <p class="ml-6">{{$message}}</p>
                                      </div>
                                    @enderror
                                </div>
                                <div class="mb-3 space-y-2 w-full text-xs">
                                    <label class="font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('Professional Designer') }}<abbr title="required">*</abbr></label>
                                    <input type="number" value="{{old('professional')}}"  class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg" name="professional" min="0" id="">
                                    @error('professional')
                                    <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
                                        <p class="ml-6">{{$message}}</p>
                                      </div>
                                    @enderror
                                </div>
                                <div class="mb-3 space-y-2 w-full text-xs">
                                    <label class="font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('Ordinary Designer') }}<abbr title="required">*</abbr></label>
                                    <input type="number" value="{{old('ordinary')}}"   class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg" name="ordinary" min="0" id="">
                                    @error('ordinary')
                                    <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
                                        <p class="ml-6">{{$message}}</p>
                                      </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                                <div class="mb-3 space-y-2 w-full text-xs">
                                    <label class="font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('Designers') }}<abbr title="required">*</abbr></label>
                                   
                                    <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 dark:bg-gray-400 search" type="text" name="" placeholder="Search for designer">
                                    @error('designer_id')
                                    <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
                                        
                                        <p class="ml-6">{{$message}}</p>
                                      </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                                <div id="designer" class="w-full grid grid-cols-1 md:grid-cols-3 gap-6 div_designer">
                                   {{--  <div class="bg-gray-100 rounded-lg p-6">
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
                                    </div> --}}
                                   

                                    
                                </div>
                            </div>
                            <br>
                            <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                              
                                <div class="mb-3 space-y-2 w-full text-xs">
                                    <label class="font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('Deadline') }}(number of days)<abbr title="required">*</abbr></label>
                                    <input value="{{old('deadline')}}" min="2" max="10"  class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 dark:bg-gray-400" name="deadline"  type="number">
                                    @error('deadline')
                                    <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
                                        
                                        <p class="ml-6">{{$message}}</p>
                                      </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="md:space-x-4 w-full text-xs">
                                <p class="font-semibold text-gray-600 py-5 dark:text-gray-100">{{ __('Description') }}<abbr title="required">*</abbr></p>
                                <textarea name="description" rows="10" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 dark:bg-gray-400" name="description"> {{old('description')}}  </textarea>
                                @error('description')
                                <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
                                    
                                    <p class="ml-6">{{$message}}</p>
                                  </div>
                                @enderror
                            </div>
                            <br>
                            <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                                <div class="mb-3 space-y-2 w-full text-xs">
                                    <label class="font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('Modern') }}</label>
                                    <input   name="data1" class="rounded-lg overflow-hidden appearance-none bg-gray-400 h-3 w-128" type="range"  min="0" max="100" step="5" value="{{old('data1',50)}}" />
                                    <label class="font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('Classic') }}</label>
                                </div>
                                <div class="mb-3 space-y-2 w-full text-xs">
                                    <label class="font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('Text') }}</label>
                                    <input   name="data2" class="rounded-lg overflow-hidden appearance-none bg-gray-400 h-3 w-128" type="range"  min="0" max="100" step="5" value="{{old('data2',50)}}" />
                                    <label class="font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('Symbolic') }}</label>
                                </div>
                                <div class="mb-3 space-y-2 w-full text-xs">
                                    <label class="font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('Formal') }}</label>
                                    <input   name="data3" class="rounded-lg overflow-hidden appearance-none bg-gray-400 h-3 w-128" type="range"   min="0" max="100" step="5" value="{{old('data3',50)}}" />
                                    <label class="font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('Unfromal') }}</label>
                                </div>
                            </div>
                            <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                                <div class="mb-3 space-y-2 w-full text-xs">
                                    <label class="font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('Luxury') }}</label>
                                    <input  name="data4" class="rounded-lg overflow-hidden appearance-none bg-gray-400 h-3 w-128" type="range"  min="0" max="100" step="5" value="{{old('data4',50)}}" />
                                    <label class="font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('Economy') }}</label>
                                </div>
                                <div class="mb-3 space-y-2 w-full text-xs">
                                    <label class="font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('Free') }}</label>
                                    <input  name="data5" class="rounded-lg overflow-hidden appearance-none bg-gray-400 h-3 w-128" type="range"   min="0" max="100" step="5" value="{{old('data5',50)}}" />
                                    <label class="font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('Geometreic') }}</label>
                                </div>
                                <div class="mb-3 space-y-2 w-full text-xs">

                                </div>
                            </div>
                            <input id="file_id" type="hidden" name="file_id">
                            <div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
                                <a class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100 dark:text-gray-100 dark:bg-gray-500  dark:hover:bg-gray-600" href="{{url('/panels/UserPanel/MyChallenges')}}">{{ __('Cancel') }}  </a>
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
                <input type="checkbox" name="designers_id[]" id="" value=`+data[i]['id'] +`>
                                        <div class="flex items-center space-x-6 mb-4">
                                            <img class="h-28 w-28 object-cover object-center rounded-full" 
                                            src=`+"'/images/no-photo.png'"  + `alt="photo">
                                            <div>
                                                <p class="text-xl text-gray-700 font-normal mb-1">`+data[i]['name']+`</p>
                                                <p class="text-base text-blue-600 font-normal">${data[i]['degree']}</p>
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
    </script>

    <script>
        CKEDITOR.replace( 'description' );
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#type").on('change',function(){
                $(this).find("option:selected").each(function(){

                    var optionValue = $(this).attr("value");
                    if(optionValue == 'Public'){
                        $("#designer").hide();
                        $(".search").hide();

                    } else{
                        $("#designer").show();
                        $(".search").show();


                    }
                });
            }).change();
        });
        </script>
        <script>
            var  _token = "{{csrf_token()}}" ;
          </script>
          <script src="{{asset('js2/recorder.js')}}"></script>
          <script src="{{asset('js2/app.js')}}"></script>
          <script>
            imgInp.onchange = evt => {
                     const [file] = imgInp.files
                     if (file) {
                        $("#blah").even().removeClass( "hidden" );
                       blah.src = URL.createObjectURL(file)
                     }
                   }
        </script>
</x-app-layout>