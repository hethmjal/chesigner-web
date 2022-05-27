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
      <div class="flex flex-col w-2/5 border-r-2 overflow-y-auto ">
        <!-- search compt -->
        <div class="border-b-2 py-4 px-2">


          <input
            type="text"
            placeholder="search chatting"
            class="py-2 px-2 border-2 border-gray-200 rounded-2xl w-full search"
          />




        </div>
        <!-- end search compt -->
        <!-- user list -->
<div class="conv"></div>
       


      {{--  <div class="flex flex-row py-4 px-2 items-center border-b-2 border-l-4 border-blue-400">
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
--}}


        <!-- end user list -->
      </div>
      <!-- end chat list -->
      <!-- message -->
      <div class="w-full px-5 flex flex-col justify-between">
        <div class="flex flex-col mt-5"         @if($activeChat)id="body-chat"@endif>
         
          @foreach ($messages as $message)

          @if ($message->user_id == Auth::id())
          <small dir="rtl" class="block"> {{$message->created_at->diffForHumans()}}</small>

          <div class="flex justify-end mb-4">

            <div
              class="mr-2 py-3 px-4 bg-blue-400 rounded-bl-3xl rounded-tl-3xl rounded-tr-xl text-white">
            {{$message->body}}
            </div>
            <div class="img1">
            <img src="{{asset('uploads/'.Auth::user()->profile_photo_path)}}" class="object-cover h-8 w-8 rounded-full" alt=""/>
          </div>
          </div>  

          @else
          <small dir="ltr" class="block">{{$message->created_at->diffForHumans()}}</small>
          <div class="flex justify-start mb-4 img2">
            <img
              src="{{asset('uploads/'.$message->user->profile_photo_path)}}"
              class="object-cover h-8 w-8 rounded-full"
              alt=""
            />
            <div class="ml-2 py-3 px-4 bg-gray-400 rounded-br-3xl rounded-tr-3xl rounded-tl-xl text-white">
              {{$message->body}}

            </div>
            
          </div>
        
          @endif
         
          @endforeach
       
        </div>
        @if ($activeChat)

        <div class="py-5">

          <form action="{{route('api.message.store')}}" class="chat" method="POST">
            @csrf
            <textarea name="message"  placeholder="type your message here..."    class="w-full bg-gray-300 py-5 px-3 rounded-xl"id="" cols="30" rows="1"></textarea>
                   
            <input type="hidden" name="conversation_id" value="{{$activeChat->id}}">
        
          <input type="submit" class="btn btn-success" value="send">
        </form>
        @endif

         
        </div>
      </div>
      <!-- end message -->
      </div>
    </div>
</div>
@push('js')
<script>
  $('.search').on('keyup', function(){
      search();
  });

  search();
  function search(){
       var keyword = $('.search').val();

       $.post('{{ route("chat-search") }}',
        {
           _token: $('meta[name="csrf-token"]').attr('content'),
           keyword:keyword
         },
         function(data){
        console.log(data);
           let conv_div = '';
            for (i in data) {
              conv_div += ` <a href="/messenger/${data[i].id}">
        <div class="flex flex-row py-4 px-2 justify-center items-center border-b-2">
          <div class="w-1/4">
            <img
              src="{{asset('uploads/${data[i].participants[0].profile_photo_path}')}}"
              class="object-cover h-12 w-12 rounded-full"
              alt=""
            />
          </div>
          <div class="w-full">
            <div class="text-lg font-semibold">${data[i].participants[0].name}</div>
            <span class="text-gray-500">${ data[i].last_message.body}</span>
          </div>
        </div>
      </a>`;
              
            }
            console.log(conv_div);
          $('.conv').html(conv_div);
         });
  }
</script>
@endpush
</x-app-layout>
