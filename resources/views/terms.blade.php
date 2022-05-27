<x-app-layout>
    <x-slot name="header">
     
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Terms & Policy') }}
        </h2>
      
    </x-slot> 
   
    <section class="container mx-auto p-6">
<x-guest-layout>
    <div class="pt-4 bg-gray-100">
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
            <div>
                <x-jet-authentication-card-logo />
            </div>
            @php
                $i=0;
            @endphp
            @foreach ($terms as $term)

            <div class="w-full sm:max-w-2xl mt-6 p-6 bg-white shadow-md overflow-hidden sm:rounded-lg prose">
             {{++$i}}-   {!! $term->endes !!}
               
            </div>
            @endforeach

        </div>
    </div>
</x-guest-layout>
</section>
</x-app-layout>
