<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Messages') }}
        </h2>
    </x-slot>

    <div class="container mx-auto shadow-lg rounded-lg">
        <!-- headaer -->
    <div class="px-5 py-5 flex justify-between items-center bg-white border-b-2"></div>
    <!-- end header -->
    <!-- Chatting -->
    <div class="flex flex-row justify-between bg-white">
      <!-- chat list -->
      <div class="flex flex-col w-2/5 border-r-2 overflow-y-auto">
        <!-- search compt -->
        <div class="border-b-2 py-4 px-2">
          <input
            type="text"
            placeholder="search chatting"
            class="py-2 px-2 border-2 border-gray-200 rounded-2xl w-full"
          />
        </div>
        <!-- end search compt -->
        <!-- user list -->
        <div
          class="flex flex-row py-4 px-2 justify-center items-center border-b-2"
        >
          <div class="w-1/4">
            <img
              src="https://source.unsplash.com/_7LbC5J-jw4/600x600"
              class="object-cover h-12 w-12 rounded-full"
              alt=""
            />
          </div>
          <div class="w-full">
            <div class="text-lg font-semibold">Khaled Ali</div>
            <span class="text-gray-500">I needfrom you some changes on order#74</span>
          </div>
        </div>
        <div
          class="flex flex-row py-4 px-2 items-center border-b-2 border-l-4 border-blue-400"
        >
          <div class="w-1/4">
            <img
              src="{{asset("/images/no-photo.png")}}"
              class="object-cover h-12 w-12 rounded-full"
              alt=""
            />
          </div>
          <div class="w-full">
            <div class="text-lg font-semibold">Mohammad Abdullah</div>
            <span class="text-gray-500">بعد إذنك احتاج بعض التعديلات على الطلب رقم 74</span>
          </div>
        </div>
        <!-- end user list -->
      </div>
      <!-- end chat list -->
      <!-- message -->
      <div class="w-full px-5 flex flex-col justify-between">
        <div class="flex flex-col mt-5">
          <div class="flex justify-end mb-4">
            <div
              class="mr-2 py-3 px-4 bg-blue-400 rounded-bl-3xl rounded-tl-3xl rounded-tr-xl text-white">
              السلام عليكم
            </div>
            <img src="{{asset("/images/no-photo.png")}}" class="object-cover h-8 w-8 rounded-full" alt=""/>
          </div>
          <div class="flex justify-start mb-4">
            <img
              src="https://source.unsplash.com/vpOeXr5wmR4/600x600"
              class="object-cover h-8 w-8 rounded-full"
              alt=""
            />
            <div
              class="ml-2 py-3 px-4 bg-gray-400 rounded-br-3xl rounded-tr-3xl rounded-tl-xl text-white"
            >
             وعليكم السلام ورحمة الله وبركاته
            </div>
          </div>
          <div class="flex justify-end mb-4">
            <div>
              <div
                class="mr-2 py-3 px-4 bg-blue-400 rounded-bl-3xl rounded-tl-3xl rounded-tr-xl text-white"
              >
                بعد إذنك احتاج بعض التعديلات على الطلب رقم 74
              </div>
            </div>
            <img
              src="{{asset("/images/no-photo.png")}}"
              class="object-cover h-8 w-8 rounded-full"
              alt=""
            />
          </div>
        </div>
        <div class="py-5">
          <input
            class="w-full bg-gray-300 py-5 px-3 rounded-xl"
            type="text"
            placeholder="type your message here..."
          />
        </div>
      </div>
      <!-- end message -->
      </div>
    </div>
</div>
</x-app-layout>
