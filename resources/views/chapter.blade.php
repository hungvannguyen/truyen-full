@extends('layouts.default')

@section('content')
<div class="my_container px-4 py-8">
    <!-- Breadcrumb -->
    @include('components/breadcrumb')

    <!-- Title -->
    <h1 class="text-h4 text-bluee text-center mb-8 font-medium">
        Xuyên Sách, Hành Trình Tìm Kiếm Hạnh Phúc<br>
        Hoàn Hảo Của Nữ Phụ
    </h1>

    <!-- Chapter Navigation -->
    <div class="flex justify-center items-center gap-[15px] mb-8">
        <button class="p-2 text-gray02 dark:text-white11 bg-white dark:bg-bgNavbar hover:bg-gray-100 rounded-lg border border-gray02 dark:border-white11">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
        <select class="border rounded-lg px-[8px] py-[4px] bg-white text-gray02">
            @for ( $i = 1; $i <= 10; $i++ )
                <option>Chương {{ $i }}</option>
            @endfor
            <!-- Add more chapters as needed -->
        </select>
        <button class="p-2 text-gray02 dark:text-white11 bg-white dark:bg-bgNavbar hover:bg-gray-100 rounded-lg border border-gray02 dark:border-white11">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>
    </div>

    <!-- Reading Settings -->
    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" 
    class="mb-4 text-gray02 bg-white border border-gray02 hover:bg-white09 focus:outline-none font-medium rounded-lg text-sm p-[6px] text-center inline-flex items-center dark:bg-bgNavbar" type="button">
        Tuỳ chỉnh 
        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
        </svg>
    </button>
        
        <!-- Dropdown menu -->
        <div id="dropdown" class="hidden w-fit mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg overflow-hidden bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
            <div class="space-y-[10px] p-4 bg-white">
                <div class="flex items-center gap-[24px]">
                    <label class="w-[120px] text-gray02 text-button2">Màu nền</label>
                    <select class="border border-gray02 text-caption rounded-lg text-gray02 px-2 py-1 w-full flex-1">
                        <option>Xám nhạt</option>
                    </select>
                </div>
                <div class="flex items-center gap-[24px]">
                    <label class="w-[120px] text-gray02 text-button2">Font chữ</label>
                    <select class="border border-gray02 text-caption rounded-lg text-gray02 px-2 py-1 w-full flex-1">
                        <option>Times New Roman</option>
                    </select>
                </div>
                <div class="flex items-center gap-[24px]">
                    <label class="w-[120px] text-gray02 text-button2">Size chữ</label>
                    <select class="border border-gray02 text-caption rounded-lg text-gray02 px-2 py-1 w-full flex-1">
                        <option class="bg-white text-gray-700 hover:bg-gray-200">28</option>
                    </select>
                </div>
                <div class="flex items-center gap-[24px]">
                    <label class="w-[120px] text-gray02 text-button2">Chiều cao dòng</label>
                    <select class="border border-gray02 text-caption rounded-lg text-gray02 px-2 py-1 w-full flex-1">
                        <option>180%</option>
                    </select>
                </div>
            </div>
        </div>
    {{-- <select id="small" style="padding-right: 5px !important;" class="block w-fit mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
        <option selected>tuỳ chỉnh</option>
        <option value="US">United States</option>
        <option value="CA">Canada</option>
        <option value="FR">France</option>
        <option value="DE">Germany</option>
    </select> --}}

    <!-- Content -->
    <div class="prose max-w-none">
        <p class="mb-6 leading-relaxed">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </p>
        <p class="mb-6 leading-relaxed">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
        <p class="mb-6 leading-relaxed">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
    </div>

    <!-- Chapter Navigation -->
    <div class="flex justify-center items-center gap-4 mb-8">
        <button class="p-2 flex items-center text-gray02 dark:text-white11 bg-white dark:bg-bgNavbar hover:bg-gray-100 rounded-lg border border-gray02 dark:border-white11">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            <span class="">Chương trước</span>
        </button>
        <select class="border rounded-lg px-[8px] bg-white h-full text-gray02">
            @for ( $i = 1; $i <= 10; $i++ )
                <option>Chương {{ $i }}</option>
            @endfor
            <!-- Add more chapters as needed -->
        </select>
        <button class="p-2 flex items-center text-gray02 dark:text-white11 bg-white dark:bg-bgNavbar hover:bg-gray-100 rounded-lg border border-gray02 dark:border-white11">
            <span class="">Chương sau</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>
    </div>

    {{-- may be you like --}}
    <div class="may_like py-[70px] my_container">
        <div x-data="{ line: false }" class="sectionTitle1 sectionTitle">
            <a href="/category" @mouseover="line = true" @mouseleave="line = false" class="_box">
                <h2>bạn có thể thích</h2>
                <div class="line">
                    <div x-show="line" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                        x-transition:leave="transition ease-in duration-300" x-transition:leave-start="translate-x-0"
                        x-transition:leave-end="translate-x-full" class="line-active"></div>
                </div>
            </a>
        </div>

        <div class="_container">
            @for ($i = 0; $i < 6; $i++)
                @include('components.card')
            @endfor
        </div>
    </div>
</div>
@endsection