    <nav class="flex items-center justify-between px-4 py-4 shadow-sm">
        <a class="py-1.5 px-5 rounded-full flex items-center justify-center border border-black border-solid" href="#"><img src="https://api.iconify.design/material-symbols:search-rounded.svg?color=%23000000" width="15px"> 
            <form action="{{ route('posts.search') }}" method="GET">
    <input class="focus:outline-none ml-1" type="search" name="search" placeholder="Search" value="{{ isset($query) ? $query : '' }}">
    <button type="submit">Search</button>
</form>
       
        <a class="text-lg font-bold ml-20" href="/">INDIE</a>
        <ul class="flex items-center">
            <a href="#"><img src="https://api.iconify.design/carbon:logo-twitter.svg?color=%23000000" width="15px"></a>
            <a class="ml-3" href="#"><img src="https://api.iconify.design/ri:facebook-fill.svg?color=%23000000" width="15px"></a>
            <a class="ml-3" href="#"><img src="https://api.iconify.design/tdesign:logo-instagram.svg?color=%23000000" width="15px"></a>
        </ul>
        <div class="p-4">
        <img class="cursor-pointer" onclick="toggleDropdown()" src="https://api.iconify.design/uit:align-right.svg?color=%23000000" width="25px" alt="">
        <div class="hidden  top-0 right-0 bg-white  border border-gray-300 w-[300px]  rounded shadow-xl px-4 py-2  h-full fixed" id="dropdown">
           <div class="w-full flex items-center justify-end">
            <button id="deleteButton" class="text-2xl">X</button>
           </div>
           <ul>
                <li class="text-sm font-normal p-2 text-green-500"><a href="/">Home</a></li>
                @guest
                    <li class="text-sm font-normal p-2 hover:text-green-500"><a href="/signup">Signup</a></li>
                    <li class="text-sm font-normal p-2 hover:text-green-500"><a href="/login">Login</a></li>
                @endguest
                @auth
                @if(auth()->user()->is_admin)
                    <li class="text-sm font-normal p-2 hover:text-green-500"><a href="/admin/create-post">Create Post</a></li>
                        <li class="text-sm font-normal p-2 hover:text-green-500"><a href="/admin/dashboard">Dashboard</a></li>
                    @endif
                    <li class="text-sm font-normal p-2 hover:text-green-500">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
    </nav>


    <script>
        function toggleDropdown() {
            var dropdown = document.getElementById('dropdown');
            dropdown.classList.toggle('hidden');
        }
    </script>
    <script>
        // Function to toggle the dropdown visibility
        function toggleDropdown() {
            var dropdown = document.getElementById('dropdown');
            dropdown.classList.toggle('hidden');
        }
    
        // Event listener for the Delete button
        var deleteButton = document.getElementById('deleteButton');
        deleteButton.addEventListener('click', function () {
            toggleDropdown(); // Close the dropdown when Delete is clicked
        });
    </script>
