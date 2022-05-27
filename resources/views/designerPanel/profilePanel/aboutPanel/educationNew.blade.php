<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-white">
            {{ __('Education - Add New') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mb-5">
                <a href="{{url('/panels/DesignerPanel/MyProfile/education')}}" class="p-3 bg-black text-white rounded">{{ __('Back') }}</a>
            </div>


                                
              

            <div class="flex flex-col ">
                <div class="bg-white shadow-md rounded-3xl p-5 dark:bg-gray-900">
                    <div class="flex flex-col sm:flex-row items-center">
                        <div class="w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0"></div>
                    </div>
                    <div class="mt-5">
                        <form action="{{route('educationdesignerresource.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                                <div class="mb-3 space-y-2 w-full text-xs">
                                    <label class="font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('Specialization') }}<abbr title="required">*</abbr></label>
                                    <input placeholder="Specialization" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 dark:bg-gray-400" required="required" type="text" name="specialization">
                                    @error('specialization')
                                    <p class="text-red-600">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 space-y-2 w-full text-xs">
                                    <label class="font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('University / College /Institute name') }}<abbr title="required">*</abbr></label>
                                    <input placeholder="University / College /Institute name" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 dark:bg-gray-400" required="required" type="text" name="university">
                                    @error('university')
                                    <p class="text-red-600">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                                <div class="mb-3 space-y-2 w-full text-xs">
                                    <label class="font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('From (Date)') }}<abbr title="required">*</abbr></label>
                                    <input placeholder="From (Date) address" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 dark:bg-gray-400" required="required" type="date" name="from">
                                    @error('from')
                                    <p class="text-red-600">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 space-y-2 w-full text-xs">
                                    <label class="font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('To (Date)') }}<abbr title="required">*</abbr></label>
                                    <input placeholder="To (Date)" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 dark:bg-gray-400" required="required" type="date" name="to">
                                    @error('to')
                                    <p class="text-red-600">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                                <div class="mb-3 space-y-2 w-full text-xs">
                                    <label class="font-semibold text-gray-600 py-2 dark:text-gray-100">{{ __('Type') }}<abbr title="required">*</abbr></label>
                                    <select class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full dark:bg-gray-400" required="required" name="degree" id="">
                                        <option value="Bachelors degree">{{ __('Bachelors degree') }}</option>
                                        <option value="Diploma">{{ __('Diploma') }}</option>
                                    </select>
                                    @error('degree')
                                    <p class="text-red-600">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
                                <a class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100 dark:text-gray-100 dark:bg-gray-500  dark:hover:bg-gray-600" href="{{url('/panels/DesignerPanel/MyProfile/education')}}">{{ __('Cancel') }}  </a>
                                <button class="mb-2 md:mb-0 bg-green-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-500" type="submit">{{ __('Save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>