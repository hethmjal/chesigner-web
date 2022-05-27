
$('.chat').on('submit',function (e) {
    e.preventDefault();
    let msg = $(this).find('textarea').val();
    let img = $('.img1 img').attr('src');

    $.post($(this).attr('action'),$(this).serialize(),function (response) {
        
    });
    $('#body-chat').append(
        `       <small dir="rtl" class="block"> just now</small>

        <div class="flex justify-end mb-4">
        <div
          class="mr-2 py-3 px-4 bg-blue-400 rounded-bl-3xl rounded-tl-3xl rounded-tr-xl text-white">
        ${msg}
        </div>
        <img src="${img}" class="object-cover h-8 w-8 rounded-full" alt=""/>

      </div>  

`
    );
   // document.getElementById('scroll').scrollTo(6000, 8000, {queue:true});
    $('textarea').val("");

})