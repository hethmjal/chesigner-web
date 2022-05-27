<x-app-layout>
    <x-slot name="header">
      
        @if (session('status')) 
        <div class="px-4 py-3 leading-normal text-green-700 bg-green-100 rounded-lg" role="alert">
          <p class="font-bold">Success!</p>
          <p>    {{session('status')}}
          </p>
        </div>
          
        @endif
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Profile') }}
        </h2>
    </x-slot>
    
    <section class="mx-auto">
        <div class="w-full mb-8 overflow-hidden rounded-lg">
                <main class="w-full">
                  <div class="container mx-auto px-4">
                    <img src="{{asset('uploads/'.$designer->background_photo_path)}}" width="3000px" alt="">
                  </div>
                    <section class="relative py-16">
                      <div class="container mx-auto px-4">
                        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-16">
                          <div class="px-6">
                            <div class="flex flex-wrap justify-center">
                              <div class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center">
                                <div>
                                  <img src="{{asset('uploads/'.$designer->profile_photo_path)}}" class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 w-32">
                                </div>
                              </div>
                              <div class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center">
                                <div class="py-6 px-3 mt-32 sm:mt-0">
                                  <a class="bg-black active:bg-gray-800 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150" href="{{url('/panels/DesignerPanel/MyProfile/profileavatar')}}">
                                    {{ __('Edit profile photo and header') }}
                                  </a>
                                </div>
                              </div>
                              <div class="w-full lg:w-4/12 px-4 lg:order-1">
                                <div class="flex justify-center py-4 lg:pt-4 pt-8">
                                  <div class="mr-4 p-3 text-center">
                                    @php
                                      $rate =   App\Models\Evaluation::where('designer_id',$designer->id)->avg('rate');
                                    @endphp
                                    <span class="text-xl font-bold block uppercase tracking-wide text-gray-600">{{count($designer->orders_work)}}</span><span class="text-sm text-gray-400">Orders</span>
                                  </div>
                                  <div class="mr-4 p-3 text-center">
                                    <span class="text-xl font-bold block uppercase tracking-wide text-gray-600">{{$rate}}/5</span><span class="text-sm text-gray-400">Rates</span>
                                  </div>
                                  <div class="lg:mr-4 p-3 text-center">
                                    <span class="text-xl font-bold block uppercase tracking-wide text-gray-600">{{count($designer->comments)}}</span><span class="text-sm text-gray-400">Comments</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="text-center mt-12">
                              <h3 class="text-4xl font-semibold leading-normal text-gray-700 mb-2">
                                {{$designer->name}}
                              </h3>
                              <div class="text-sm leading-normal mt-0 mb-2 text-gray-400 font-bold uppercase">
                                <i class="fas fa-map-marker-alt mr-2 text-lg text-gray-400"></i>
                                Riyadh, Saudi Arabia
                              </div>
                            </div>
                            <div class="mt-10 py-10 border-t border-gray-200 text-center">
                              <div class="flex flex-wrap justify-center">
                                <div class="w-full lg:w-9/12 px-4">
                                  <p class="mb-2 text-3xl text-gray-700 font-bold">{{ __('About') }}</p>
                                  <br>
                                  <br>
                                 
                                 <p class="mb-2 text-xl text-gray-700">{{ __('About') }}</p>
                                 @if ($designer->about)
                                 <p class="mb-4 text-lg leading-relaxed text-gray-700">
                                  {!!$designer->about->body!!}
                                </p>
                                 @else
                                     no data
                                 @endif
                                <br>
                                  <a href="{{url('/panels/DesignerPanel/MyProfile/about/newAbout')}}" class="font-normal text-pink-500">Edit</a>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="mt-10 py-10 border-t border-gray-200 text-center">
                            <div class="flex flex-wrap justify-center">
                              <div class="w-full lg:w-9/12 px-4">
                                <p class="mb-2 text-xl text-gray-700">{{ __('Education') }}</p>
                                @if ($designer->educationes)
                                @foreach ($designer->educationes as $educatione)                                    
                                <p class="mb-4 text-lg leading-relaxed text-gray-700">
                                  {{$educatione->specialization}} {{$educatione->degree}}  in {{$educatione->university}} from {{$educatione->from}} to {{$educatione->to}} 
                                </p>
                                @endforeach
                                @else
                                    no data
                                @endif

                                <a href="{{url('/panels/DesignerPanel/MyProfile/education')}}" class="font-normal text-pink-500">Edit</a>
                              </div>
                            </div>
                          </div>
                          <div class="mt-10 py-10 border-t border-gray-200 text-center">
                            <div class="flex flex-wrap justify-center">
                              <div class="w-full lg:w-9/12 px-4">
                                <p class="mb-2 text-xl text-gray-700">{{ __('Experience') }}</p>
                                @if ($designer->experinces)
                                @foreach ($designer->experinces as $experince)
                                    
                                <p class="mb-4 text-lg leading-relaxed text-gray-700">
                                  {{$experince->specialization}}   in {{$experince->company}} from {{$experince->from}} to {{$experince->to}} 
                                </p>
                                @endforeach
                                @else
                                    no data
                                @endif


                              
                                <a href="{{url('/panels/DesignerPanel/MyProfile/experience')}}" class="font-normal text-pink-500">Edit</a>
                              </div>
                            </div>
                          </div>
                          <div class="mt-10 py-10 border-t border-gray-200 text-center">
                            <div class="flex flex-wrap justify-center">
                              <div class="w-full lg:w-9/12 px-4">
                                <p class="mb-2 text-xl text-gray-700">{{ __('Skills') }}</p>
                                <p class="mb-4 text-lg leading-relaxed text-gray-700">
                                  @if ($designer->skills)
                                  @foreach ($designer->skills as $skill)
                                  {{$skill->skills}},
                              @endforeach
                                  @else
                                      no data
                                  @endif
  


                                  
                                </p>
                                <a href="{{url('/panels/DesignerPanel/MyProfile/skill')}}" class="font-normal text-pink-500">Edit</a>
                              </div>
                            </div>
                          </div>
                          <div class="mt-10 py-10 border-t border-gray-200 text-center">
                            <div class="flex flex-wrap justify-center">
                              <div class="w-full lg:w-9/12 px-4">
                                <p class="mb-2 text-xl text-gray-700">{{ __('Programs') }}</p>
                                @if ($designer->programes)
                                @foreach ($designer->programes as $programe)                                    
                                <p class="mb-4 text-lg leading-relaxed text-gray-700">
                                  {{$programe->programers}}   for {{$programe->experience}} years                                </p>
                                @endforeach
                                @else
                                    no data
                                @endif
                                
                               
                                <a href="{{url('/panels/DesignerPanel/MyProfile/program')}}" class="font-normal text-pink-500">Edit</a>
                              </div>
                            </div>
                          </div>
                          <div class="mt-10 py-10 border-t border-gray-200 text-center">
                            <div class="flex flex-wrap justify-center">
                              <div class="w-full lg:w-9/12 px-4">
                                <p class="mb-2 text-xl text-gray-700">{{ __('Working Hours') }}</p>
                                <p class="mb-4 text-lg leading-relaxed text-gray-700">
                             @if ($designer->hours)
                             {{$designer->hours->hours}} hour/day
                             @else
                             no data
                             @endif  
                                 
                                </p>
                                <a href="{{url('/panels/DesignerPanel/MyProfile/workinghours')}}" class="font-normal text-pink-500">Edit</a>
                              </div>
                            </div>
                          </div>
                          <div class="mt-10 py-10 border-t border-gray-200 text-center">
                            <div class="flex flex-wrap justify-center">
                              <div class="w-full lg:w-9/12 px-4">
                                <p class="mb-2 text-3xl text-gray-700 font-bold">{{ __('Portfolio') }}</p>
                                <br>
                                <br>
                                <div class="grid grid-flow-col grid-cols-3 text-center">
                                  @if ($designer->portfolios)
                                  @foreach ($designer->portfolios as $portfolio)                                     
                                  <div>
                                    <img src="{{$portfolio->image_portfolio}}" alt="" class="max-h-40 mx-auto">
                                    <p class="text-gray-500 text-sm">{{$portfolio->project_name}}</p>
                                  </div>
                                  @endforeach               
                                   @else
                                  no data
                                  @endif  
                                                                                               
                                </div>
                                <br>
                                <a href="{{url('/panels/DesignerPanel/MyProfile/portfolio')}}" class="font-normal text-pink-500">Edit</a>
                              </div>
                            </div>
                          </div>
                          <div class="mt-10 py-10 border-t border-gray-200 text-center">
                            <div class="flex flex-wrap justify-center">
                              <div class="w-full lg:w-9/12 px-4">
                                <p class="mb-2 text-3xl text-gray-700 font-bold">{{ __('Subscription') }}</p>
                                <br>
                                <br>
                                <div class="grid grid-flow-col grid-cols-3 text-center">



                                  @foreach ($designer->packages() as $package)
                                    @if($package->name == 'Economy')
                                  <div>
                                    <div class="relative flex flex-col justify-between p-8 lg:p-6 xl:p-8 rounded-2xl">

                                      <div class="absolute inset-0 w-full h-full transform translate-x-2 translate-y-2 bg-green-50 rounded-2xl"></div>
                                      <div class="absolute inset-0 w-full h-full border-2 border-gray-900 rounded-2xl"></div>
                                      <div class="relative flex pb-5 space-x-5 border-b border-gray-200 lg:space-x-3 xl:space-x-5">
                                          <svg class="w-16 h-16 text-green-400 rounded-2xl" viewBox="0 0 150 150" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><rect x="0" y="0" width="150" height="150" rx="15"></rect></defs><g fill="none" fill-rule="evenodd"><mask fill="#fff"><use xlink:href="#plan1"></use></mask><use fill="currentColor" xlink:href="#plan1"></use><circle fill-opacity=".3" fill="#FFF" mask="url(#plan1)" cx="125" cy="25" r="50"></circle><path fill-opacity=".3" fill="#FFF" mask="url(#plan1)" d="M-33 83H67v100H-33z"></path></g></svg>
                                          <div class="relative flex flex-col items-start">
                                              <h3 class="text-xl font-bold">{{ __('Economy') }}</h3>
                                              <p class="tracking-tight text-gray-500">
                                                  <span class="text-sm transform inline-block -translate-y-2.5 relative">SAR</span>
                                                  <span class="text-3xl font-bold text-gray-800">{{$package->price}}</span>
                                                  <span class="text-sm -translate-y-0.5 inline-block transform">/ monthly</span>
                                              </p>
                                          </div>
                                      </div>

                                      <ul class="relative py-12 space-y-3">
                                          <li class="flex items-center space-x-2 text-sm font-medium text-gray-500">
                                              <svg class="w-6 h-6 text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                              <span>{{ __('Number of works') }}: {{$package->number_of_works}}</span>
                                          </li>
                                          <li class="flex items-center space-x-2 text-sm font-medium text-gray-500">
                                              <svg class="w-6 h-6 text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                              <span>{{ __('Single work editing') }}: {{$package->single_work_editing}}</span>
                                          </li>
                                          <li class="flex items-center space-x-2 text-sm font-medium text-gray-500">
                                              <svg class="w-6 h-6 text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                              <span>{{ __('Change designer') }}: {{ __($package->change_designer) }}</span>
                                          </li>
                                        
                                        <li class="flex items-center space-x-2 text-sm font-medium text-gray-500">
                                          <svg class="w-6 h-6 text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                          <span>{{ __('Unsubscribe') }}: {{ __($package->unsubscribe) }}</span>
                                        </li>
                                        <li class="flex items-center space-x-2 text-sm font-medium text-gray-500">
                                          <svg class="w-6 h-6 text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                          <span>{{ __('Meeting schedule') }}: {{ __($package->meeting_schedule) }}</span>
                                        </li>
                                        <li class="flex items-center space-x-2 text-sm font-medium text-gray-500">
                                          <svg class="w-6 h-6 text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                          <span>{{ __('Screen share technology') }}: {{ __($package->screen_share_technology) }}</span>
                                        </li>
                                      </ul>
                                      @if ($package->designers)
                                          
                                      @if ($package->designers['type'] == 'active')
                                      <a href="{{route('package.unactive',$package->designers->id)}}" class="relative flex items-center justify-center w-full px-5 py-5 text-lg font-medium text-white rounded-xl group">
                                        <span class="w-full h-full absolute inset-0 transform translate-y-1.5 translate-x-1.5 group-hover:translate-y-0 group-hover:translate-x-0 transition-all ease-out duration-200 rounded-xl bg-green-500"></span>
                                        <span class="absolute inset-0 w-full h-full border-2 border-gray-900 rounded-xl"></span>
                                        <span class="relative">{{ __('Un Active') }}</span>
                                    </a> 
                                    @endif
                                    @endif

                                    @if ($package->designers)
                                          
                                    @if ($package->designers['type'] == 'unactive')
                                    <a href="{{route('package.active',$package->designers->id)}}" class="relative flex items-center justify-center w-full px-5 py-5 text-lg font-medium text-white rounded-xl group">
                                      <span class="w-full h-full absolute inset-0 transform translate-y-1.5 translate-x-1.5 group-hover:translate-y-0 group-hover:translate-x-0 transition-all ease-out duration-200 rounded-xl bg-green-500"></span>
                                      <span class="absolute inset-0 w-full h-full border-2 border-gray-900 rounded-xl"></span>
                                      <span class="relative">{{ __('Active') }}</span>
                                  </a> 
                                      
                                  @endif
                                      
                                  @else
                                  <a href="{{route('package.active',$package->id)}}" class="relative flex items-center justify-center w-full px-5 py-5 text-lg font-medium text-white rounded-xl group">
                                    <span class="w-full h-full absolute inset-0 transform translate-y-1.5 translate-x-1.5 group-hover:translate-y-0 group-hover:translate-x-0 transition-all ease-out duration-200 rounded-xl bg-green-500"></span>
                                    <span class="absolute inset-0 w-full h-full border-2 border-gray-900 rounded-xl"></span>
                                    <span class="relative">{{ __('Active') }}</span>
                                </a> 
                                    @endif
                                    </div>
                                  </div>
                                  @endif





                                  @if($package->name == 'Growth')

                                  <div>
                                    <div class="relative p-8 lg:p-6 xl:p-8 rounded-2xl mx-4">

                                      <div class="absolute inset-0 w-full h-full transform translate-x-2 translate-y-2 bg-blue-50 rounded-2xl"></div>
                                      <div class="absolute inset-0 w-full h-full border-2 border-gray-900 rounded-2xl"></div>
                                      <div class="relative flex pb-5 space-x-5 border-b border-gray-200 lg:space-x-3 xl:space-x-5">
                                          <svg class="w-16 h-16 text-indigo-400 rounded-2xl" viewBox="0 0 150 150" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><rect x="0" y="0" width="150" height="150" rx="15"></rect></defs><g fill="none" fill-rule="evenodd"><mask fill="#fff"><use xlink:href="#plan1"></use></mask><use fill="currentColor" xlink:href="#plan1"></use><circle fill-opacity=".3" fill="#FFF" mask="url(#plan1)" cx="125" cy="25" r="50"></circle><path fill-opacity=".3" fill="#FFF" mask="url(#plan1)" d="M-33 83H67v100H-33z"></path></g></svg>
                                          <div class="relative flex flex-col items-start">
                                              <h3 class="text-xl font-bold">{{ __('Growth') }}</h3>
                                              <p class="tracking-tight text-gray-500">
                                                  <span class="text-sm transform inline-block -translate-y-2.5 relative">SAR</span>
                                                  <span class="text-3xl font-bold text-gray-800">{{$package->price}}</span>
                                                  <span class="text-sm -translate-y-0.5 inline-block transform">/ monthly</span>
                                              </p>
                                          </div>
                                      </div>

                                      <ul class="relative py-12 space-y-3">
                                        <li class="flex items-center space-x-2 text-sm font-medium text-gray-500">
                                            <svg class="w-6 h-6 text-indigo-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                            <span>{{ __('Number of works') }}: {{$package->number_of_works}}</span>
                                        </li>
                                        <li class="flex items-center space-x-2 text-sm font-medium text-gray-500">
                                            <svg class="w-6 h-6 text-indigo-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                            <span>{{ __('Single work editing') }}: {{$package->single_work_editing}}</span>
                                        </li>
                                       
                                        <li class="flex items-center space-x-2 text-sm font-medium text-gray-500">
                                          <svg class="w-6 h-6 text-indigo-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                          <span>{{ __('Change designer') }}: {{ __($package->change_designer) }}</span>
                                        </li>
                                        <li class="flex items-center space-x-2 text-sm font-medium text-gray-500">
                                          <svg class="w-6 h-6 text-indigo-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                          <span>{{ __('Unsubscribe') }}: {{ __($package->unsubscribe) }}</span>
                                        </li>
                                        <li class="flex items-center space-x-2 text-sm font-medium text-gray-500">
                                          <svg class="w-6 h-6 text-indigo-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                          <span>{{ __('Meeting schedule') }}: {{ __($package->meeting_schedule) }}</span>
                                        </li>
                                        <li class="flex items-center space-x-2 text-sm font-medium text-gray-500">
                                          <svg class="w-6 h-6 text-indigo-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                          <span>{{ __('Screen share technology') }}: {{ __($package->screen_share_technolgy) }}</span>
                                        </li>
                                      </ul>
                                      @if ($package->designers)

                                      @if ($package->designers['type'] == 'active')
                                      <a href="{{route('package.unactive',$package->designers->id)}}" class="relative flex items-center justify-center w-full px-5 py-5 text-lg font-medium text-white rounded-xl group">
                                        <span class="w-full h-full absolute inset-0 transform translate-y-1.5 translate-x-1.5 group-hover:translate-y-0 group-hover:translate-x-0 transition-all ease-out duration-200 rounded-xl bg-blue-600"></span>
                                        <span class="absolute inset-0 w-full h-full border-2 border-gray-900 rounded-xl"></span>
                                        <span class="relative">{{ __('Un Active') }}</span>
                                    </a> 
                                    @endif
                                    @endif
                                    @if ($package->designers)

                                    @if ($package->designers['type'] == 'unactive')
                                      <a href="{{route('package.active',$package->designers->id)}}" class="relative flex items-center justify-center w-full px-5 py-5 text-lg font-medium text-white rounded-xl group">
                                          <span class="w-full h-full absolute inset-0 transform translate-y-1.5 translate-x-1.5 group-hover:translate-y-0 group-hover:translate-x-0 transition-all ease-out duration-200 rounded-xl bg-blue-600"></span>
                                          <span class="absolute inset-0 w-full h-full border-2 border-gray-900 rounded-xl"></span>
                                          <span class="relative">{{ __('Active') }}</span>
                                      </a>
                                      @endif

                                      @else
                                      <a href="{{route('package.active',$package->id)}}" class="relative flex items-center justify-center w-full px-5 py-5 text-lg font-medium text-white rounded-xl group">
                                        <span class="w-full h-full absolute inset-0 transform translate-y-1.5 translate-x-1.5 group-hover:translate-y-0 group-hover:translate-x-0 transition-all ease-out duration-200 rounded-xl bg-blue-600"></span>
                                        <span class="absolute inset-0 w-full h-full border-2 border-gray-900 rounded-xl"></span>
                                        <span class="relative">{{ __('Active') }}</span>
                                    </a>
                                      @endif
                                  </div>
                                  </div>

                                    @endif
                                    @if($package->name == 'Recurit')

                                  <div>
                                    <div class="relative flex flex-col justify-between p-8 lg:p-6 xl:p-8 rounded-2xl">

                                      <div class="absolute inset-0 w-full h-full transform translate-x-2 translate-y-2 bg-red-50 rounded-2xl"></div>
                                      <div class="absolute inset-0 w-full h-full border-2 border-gray-900 rounded-2xl"></div>
                                      <div class="relative flex pb-5 space-x-5 border-b border-gray-200 lg:space-x-3 xl:space-x-5">
                                          <svg class="w-16 h-16 text-red-400 rounded-2xl" viewBox="0 0 150 150" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><rect x="0" y="0" width="150" height="150" rx="15"></rect></defs><g fill="none" fill-rule="evenodd"><mask fill="#fff"><use xlink:href="#plan1"></use></mask><use fill="currentColor" xlink:href="#plan1"></use><circle fill-opacity=".3" fill="#FFF" mask="url(#plan1)" cx="125" cy="25" r="50"></circle><path fill-opacity=".3" fill="#FFF" mask="url(#plan1)" d="M-33 83H67v100H-33z"></path></g></svg>
                                          <div class="relative flex flex-col items-start">
                                              <h3 class="text-xl font-bold">{{ __('Recurit') }}</h3>
                                              <p class="tracking-tight text-gray-500">
                                                  <span class="text-sm transform inline-block -translate-y-2.5 relative">SAR</span>
                                                  <span class="text-3xl font-bold text-gray-800">{{$package->price}}</span>
                                                  <span class="text-sm -translate-y-0.5 inline-block transform">/ monthly</span>
                                              </p>
                                          </div>
                                      </div>

                                      <ul class="relative py-12 space-y-3">
                                          <li class="flex items-center space-x-2 text-sm font-medium text-gray-500">
                                              <svg class="w-6 h-6 text-red-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                              <span>{{ __('Number of works') }}: {{$package->number_of_works}}</span>
                                          </li>
                                          <li class="flex items-center space-x-2 text-sm font-medium text-gray-500">
                                              <svg class="w-6 h-6 text-red-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                              <span>{{ __('Single work editing') }}: {{$package->single_work_editing}}</span>
                                          </li>
                                          
                                          <li class="flex items-center space-x-2 text-sm font-medium text-gray-500">
                                            <svg class="w-6 h-6 text-red-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                            <span>{{ __('Change designer') }}: {{ __($package->change_designer) }}</span>
                                        </li>
                                        <li class="flex items-center space-x-2 text-sm font-medium text-gray-500">
                                          <svg class="w-6 h-6 text-red-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                          <span>{{ __('Unsubscribe') }}: {{ __($package->unsubscribe) }}</span>
                                        </li>
                                        <li class="flex items-center space-x-2 text-sm font-medium text-gray-500">
                                          <svg class="w-6 h-6 text-red-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                          <span>{{ __('Meeting schedule') }}: {{ __($package->meeting_schedule) }}</span>
                                        </li>
                                        <li class="flex items-center space-x-2 text-sm font-medium text-gray-500">
                                          <svg class="w-6 h-6 text-red-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                          <span>{{ __('Screen share technology') }}: {{ __($package->screen_share_technolgy) }}</span>
                                        </li>
                                      </ul>
                                      @if ($package->designers)
                                      @if ($package->designers['type'] == 'active')
                                      <a href="{{route('package.unactive',$package->designers->id)}}" class="relative flex items-center justify-center w-full px-5 py-5 text-lg font-medium text-white rounded-xl group">
                                        <span class="w-full h-full absolute inset-0 transform translate-y-1.5 translate-x-1.5 group-hover:translate-y-0 group-hover:translate-x-0 transition-all ease-out duration-200 rounded-xl bg-red-500"></span>
                                        <span class="absolute inset-0 w-full h-full border-2 border-gray-900 rounded-xl"></span>
                                        <span class="relative">{{ __('Un Active') }}</span>
                                    </a> 
                                    @endif
                                    @endif
                                    @if ($package->designers)
                                    @if ($package->designers['type'] == 'unactive')
                                      <a href="{{route('package.active',$package->designers->id)}}" class="relative flex items-center justify-center w-full px-5 py-5 text-lg font-medium text-white rounded-xl group">
                                          <span class="w-full h-full absolute inset-0 transform translate-y-1.5 translate-x-1.5 group-hover:translate-y-0 group-hover:translate-x-0 transition-all ease-out duration-200 rounded-xl bg-red-500"></span>
                                          <span class="absolute inset-0 w-full h-full border-2 border-gray-900 rounded-xl"></span>
                                          <span class="relative">{{ __('Active') }}</span>
                                      </a>
                                      @endif
                                      @else
                                      <a href="{{route('package.active',$package->id)}}" class="relative flex items-center justify-center w-full px-5 py-5 text-lg font-medium text-white rounded-xl group">
                                        <span class="w-full h-full absolute inset-0 transform translate-y-1.5 translate-x-1.5 group-hover:translate-y-0 group-hover:translate-x-0 transition-all ease-out duration-200 rounded-xl bg-red-500"></span>
                                        <span class="absolute inset-0 w-full h-full border-2 border-gray-900 rounded-xl"></span>
                                        <span class="relative">{{ __('Active') }}</span>
                                    </a>
                                      @endif
                                    </div>
                                  </div>

                                  @endif
                                  @endforeach


                                </div>
                                <br>
                                {{-- <a href="{{url('')}}" class="font-normal text-pink-500">{{ __('Add custom subscription') }}</a> --}}
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </section>
                  </main>
        </div>
    </section>
</x-app-layout>
