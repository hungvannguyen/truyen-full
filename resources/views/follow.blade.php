@extends('layouts.default')

@section('content')

<div class="my_container py-8">
     <!-- Breadcrumb -->
     @include('components/breadcrumb')

     <h1 class="page_title mb-2">
        DANH SÁCH YÊU THÍCH CỦA BẠN
    </h1>
    
    <p class="follow_count mb-6">
        Bạn đã lưu <span class="font-semibold">00</span> truyện vào danh sách.
    </p>

    <div class="sort_by">
        <div x-data="{openDD: false}" @click.outside="openDD = false" class="relative">
            <button x-ref="sortFollowPageBtn" id="sortFollowPageBtn" @click="openDD = !openDD" class="commonBtnDropdownBgColor" :class="{'active': openDD === true }">
                <span>Sắp xếp</span>
                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 9-7 7-7-7" />
                </svg>
            </button>
            <!-- Dropdown menu -->
            <div x-show="openDD" class="commonDropdownBgColor" x-bind:style="'min-width: ' + $refs.sortFollowPageBtn.offsetWidth + 'px;'" id="sortFollowPage">
                <ul class="">
                    <li>
                        <a href="#" class="">Mới nhất</a>
                    </li>
                    <li>
                        <a href="#" class=""">Cũ nhất</a>
                    </li>
                </ul>
            </div>
        </div>

        <div x-data="{openDD: false}" @click.outside="openDD = false" class="relative">
            <button x-ref="settingFollowPageBtn" id="settingFollowPageBtn" @click="openDD = !openDD" class="commonBtnDropdownBgColor" :class="{'active': openDD === true }">
                <span>Tuỳ chọn</span>
                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 9-7 7-7-7" />
                </svg>
            </button>
            <!-- Dropdown menu -->
            <div x-show="openDD" x-bind:style="'min-width: ' + $refs.settingFollowPageBtn.offsetWidth + 'px;'" id="settingFollowPage" class="commonDropdownBgColor">
                <ul class="">
                    <li>
                        <a href="#" class="">Mới nhất</a>
                    </li>
                    <li>
                        <a href="#" class=""">Cũ nhất</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-[30px]">
        <!-- Repeat this card 6 times -->
        @for ($i = 0; $i < 6*3; $i++)
        <div class="card-follow">
            <div class="_banner">
                <a href="/details">
                    <img src="{{ asset('/images/home-hero/Home-hero-1.png') }}" alt="banner1">
                </a>
                {{-- tag --}}
                <div class="-overlay">
                    <div class="_boxContent">
                        <button class="">
                            Đọc tiếp
                        </button>
                        <button class="">
                            Xóa
                        </button>
                    </div>
                </div>
            </div>
            {{-- title --}}
            <a href="/details" class="_title">
                <h3>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quas, reiciendis qui, dolore aliquid
                    mollitia voluptate facere corporis dolor, incidunt aliquam praesentium rerum vel. Ex iste sint, quia
                    repudiandae possimus nam.</h3>
            </a>
            {{-- author --}}
            <div class="">
                <a href="#" class="_author">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                        </path>
                    </svg>
                    <span>Thảo Tửu Đích Khiếu Hoa Tử</span>
                </a>
            </div>

            {{-- story genre --}}
            <div class="_storyGenre">
                <a href="/category">Ngôn tình</a>
                <a href="/category">Đô thị</a>
                <a href="/category">Điền văn</a>
                <a href="/category">Sủng</a>
                <a href="/category">Xuyên nhanh</a>
            </div>
            {{-- status --}}
            <div class="_status">
                <span class="text-gray-600">Trạng thái: </span>
                <span class="text-bluee">Đang cập nhật</span>
            </div>
        </div>
        @endfor
        <!-- Repeat the card above 5 more times -->
    </div>
</div>

@endsection