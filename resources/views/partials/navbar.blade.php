{{-- <nav class="nav">
    <div class="_container my_container">
        <a href="/" class="_logo">
            <img src="{{ asset('/images/logo.png') }}" class="" alt="Story-verse-Logo" />
        </a>
        <div class="flex md:order-2">
            <div class="relative hidden md:block">
                <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                    <svg class="h-4 w-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                    <span class="sr-only">Search icon</span>
                </div>
                <input type="text" id="search-navbar"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2 ps-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                    placeholder="Search...">
            </div>
            <button data-collapse-toggle="navbar-search" type="button"
                class="inline-flex h-10 w-10 items-center justify-center rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 md:hidden"
                aria-controls="navbar-search" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="_menu hidden" id="navbar-search">
            <div class="flex">

            </div>
            <div class="_search">
                <div class="-box">
                    <svg class="h-4 w-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="text" id="search-navbar" class="" placeholder="Search...">
            </div>
            <ul class="_list">
                <li class="-item">
                    <a href="#" class="">Danh sách</a>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                    </svg>
                </li>
                <li class="-item">
                    <a href="#" class="">Thể loại</a>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                    </svg>
                </li>
                <li class="-item">
                    <a href="#" class="">Phân loại theo chương</a>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                    </svg>
                </li>
                <li class="-item">
                    <a href="#" class="">Truyên tranh</a>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                    </svg>
                </li>
            </ul>
        </div>
    </div>
</nav> --}}

<nav class="nav fixed left-0 right-0 top-0 z-[40]">
    <div class="_container my_container">
        <div class="_logo">
            <a href="/">
                <img src="{{ asset('/images/logo.png') }}" class="" alt="Story-verse-Logo" />
            </a>
        </div>

        <div class="_menu">
            <ul class="_list">
                <li class="-item">
                    <div class="flex items-center gap-[5px]">
                        <a href="#" class="name">Danh sách</a>
                        <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 9-7 7-7-7" />
                        </svg>
                    </div>
                    {{-- <div class="absolute inset-0 top-full z-[99] h-[300px] w-[200px] bg-bgNavbar rounded-b-md">
                        <ul class="capitalize">
                            <li><a href="">truyên mới cập nhật</a></li>
                            <li><a href="">Truyện hot</a></li>
                            <li><a href="">truyện full</a></li>
                            <li><a href="">tiên hiệp hay</a></li>
                            <li><a href="">truyện teen hay</a></li>
                        </ul>
                    </div> --}}
                </li>
                <li class="-item">
                    <a href="#" class="">Thể loại</a>
                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 9-7 7-7-7" />
                    </svg>
                </li>
                <li class="-item">
                    <a href="#" class="">Phân loại theo chương</a>
                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 9-7 7-7-7" />
                    </svg>
                </li>
                <li class="-item">
                    <a href="#" class="">Truyên tranh</a>
                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 9-7 7-7-7" />
                    </svg>
                </li>
            </ul>
        </div>

        <div class="_user flex hidden items-center gap-[20px] md:flex">
            <div class="_search cursor-pointer">
                <svg class="h-[28px] w-[28px] text-grayy" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                        d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                </svg>
            </div>

            <div class="-user cursor-pointer">
                <svg class="h-[28px] w-[28px] text-grayy" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
            </div>

            <div class="inline-block rounded-lg bg-bluee px-[10px] py-[5px]">
                <a href="#" class="text-[21px] font-medium leading-[30px] text-white">Đăng tác phẩm</a>
            </div>
        </div>
    </div>
</nav>
