<div class="bg-black max-w-[95%] m-auto py-3 px-4 rounded-lg mt-3 mb-3">
    <nav class="flex items-center justify-between">
        <a class="text-white text-xl font-semibold" href="/admin/dashboard">Dashboard</a>
        <ul class="flex items-center">
            <a class="text-white ml-4 font-semibold"  href="/">Home</a>
            <a class="text-white ml-4 font-semibold" href="/admin/read-post">Post</a>
            <a class="lex items-center bg-blue-600 px-4 py-2 ml-3 rounded-lg font-semibold text-white" href="/admin/create-post">&plus; Content</a>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button class="flex items-center bg-red-500 px-4 py-2 ml-3 rounded-lg font-semibold text-white"><img class="mr-1" src="https://api.iconify.design/material-symbols:exit-to-app.svg?color=%23ffffff" width="20px">Logout</button> 
        </form>
        </ul>
    </nav>
</div>