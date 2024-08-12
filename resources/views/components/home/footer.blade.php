<div class="max-w-6xl m-auto">
    <div class="mb-4 mt-4 bg-[#f8f9fa] px-4 py-6 rounded-sm">
        <h2 class="text-3xl mb-0.5 font-bold">Subscribe to newsletter</h2>
      
            <form action="{{ route('home') }}" method="post">
                <div class="flex items-center">
                @csrf
                <input class="py-3 px-4 mr-6 w-[70%] focus:outline-none border border-black border-solid rounded-lg" type="search" name="search" placeholder="Enter your email  @if (session('sucess'))
                {{ session('sucess') }}
                @endif">
                <button class="bg-[#f79918] text-white text-xs font-bold py-4 px-8 w-96  rounded-full hover:bg-white hover:text-[#f79918] hover:shadow-md" type="submit">SUBSCRIBE</button>
              </form>
        </div>
       </div>
       <div class="flex items-center mt-14 mb-5 justify-center ">
           <div class="px-2 group py-2 bg-gray-200 rounded-lg ml-2 hover:bg-yellow-400">
            <a href="#">
                <img class="group-hover:hidden" src="https://api.iconify.design/gg:facebook.svg?color=%23000000" width="20px">
                <img class="hidden group-hover:block" src="https://api.iconify.design/basil:facebook-solid.svg?color=%23ffffff" width="20px">
            </a>
           </div>
           <div class="px-2 group py-2  bg-gray-200 rounded-lg ml-2 hover:bg-yellow-400">
            <a href="#">
                <img class="group-hover:hidden" src="https://api.iconify.design/basil:twitter-outline.svg?color=%23000000" width="20px">
                <img class="hidden group-hover:block" src="https://api.iconify.design/basil:twitter-outline.svg?color=%23ffffff" width="20px">
            </a>
           </div>
           <div class="px-2 py-2 bg-gray-200 group rounded-lg ml-2 hover:bg-yellow-400">
            <a href="#">
                <img class="group-hover:hidden" src="https://api.iconify.design/akar-icons:linkedin-fill.svg?color=%23000000" width="20px">
                <img class="hidden group-hover:block" src="https://api.iconify.design/akar-icons:linkedin-fill.svg?color=%23ffffff" width="20px">
            </a>
           </div>
           <div class="px-2 py-2 bg-gray-200 group rounded-lg ml-2 hover:bg-yellow-400">
            <a href="#">
                <img class="group-hover:hidden" src="https://api.iconify.design/mingcute:youtube-fill.svg?color=%23000000" width="20px">
                <img class="hidden group-hover:block" src="https://api.iconify.design/mingcute:youtube-fill.svg?color=%23ffffff" width="20px">
            </a>
           </div>
       </div>
       <div class="mb-20 mt-2">
            <p class="flex items-center justify-center mb-3">Copyright ©2023 All rights reserved | This template is modified <img src="https://api.iconify.design/material-symbols:favorite-rounded.svg?color=%23000000" width="20px">  by <span class="hover:underline hover:decoration-orange-400">Ihpaz Laga Sukanda</span></p>
            <p class="text-center mt-2">Terms & Conditions/ Privacy Policy</p>
       </div>
</div>