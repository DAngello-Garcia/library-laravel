<title>Library</title>
<x-guest-layout>
    <div class="container flex justify-center gap-4">
        <a href="{{ route('login') }}" class="rounded-md px-4 py-2 text-black ring-1 ring-gray-300 bg-white transition hover:text-gray-700 hover:bg-gray-100 focus:outline-none focus-visible:ring-2 focus-visible:ring-[#FF2D20] shadow-md"> Log in </a>
        
        <a href="{{ route('register') }}" class="rounded-md px-4 py-2 text-black ring-1 ring-gray-300 bg-white transition hover:text-gray-700 hover:bg-gray-100 focus:outline-none focus-visible:ring-2 focus-visible:ring-[#FF2D20] shadow-md"> Register </a>
    </div>
</x-guest-layout>
