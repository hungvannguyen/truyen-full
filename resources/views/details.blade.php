@extends('layouts.default')

@section('head')
    <style>
        .novel-header {
            background-image: url('{{ asset('/images/home-hero/Home-hero-1.png') }}');
            filter: opacity(0.75) blur(3px);
        }
    </style>
@endsection

@section('content')
<div  x-data="alpineDetailPage">
    <div class="novel-container">
        <!-- Phần header với ảnh nền -->
        <div class="novel-header"></div>

        <!-- Phần footer màu trắng -->
        <div class="novel-footer"></div>

        <!-- Content overlay -->
        <div class="content-overlay">
            <div class="my_container flex items-end gap-[30px]">
                <!-- Cover Image -->
                <div class="image">
                    <img src="{{ asset('/images/home-hero/Home-hero-1.png') }}" alt="Tuyệt Kiếm Phá Thiên">
                </div>

                <!-- Novel Info -->
                <div class="info">
                    <h1 class="title">Tuyệt Kiếm Phá Thiên</h1>

                    <div class="mb-[50px] space-y-2">
                        <div class="author">
                            <span>Tác giả:</span>
                            <span>Tên Tác giả</span>
                        </div>

                        <div class="genre_status">
                            <div class="-genre">
                                <span class="font-semibold">Thể loại:</span>
                                <div class="_list">
                                    <span class="py-1">Thể loại</span>
                                    <span class="py-1">Thể loại</span>
                                    <span class="py-1">Thể loại</span>
                                </div>
                            </div>

                            <div class="_status">
                                <span class="">Trạng thái:</span>
                                <span class="">Full</span>
                            </div>

                            <button @click="openReportModal()" class="text-white12">
                                <svg data-tooltip-target="reportNovel" data-tooltip-placement="right" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12ZM12 8.25a.75.75 0 0 1 .75.75v3.75a.75.75 0 0 1-1.5 0V9a.75.75 0 0 1 .75-.75Zm0 8.25a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                                </svg>
                                
                                <div id="reportNovel" role="tooltip" class="toolTipCustom opacity-0 invisible">
                                    Báo cáo lạm dụng
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            </button>
                        </div>
                    </div>

                    <div class="flex items-center gap-[15px]">
                        <div class="btn-read">
                            <a href="/chapter" class="">
                                Bắt đầu đọc
                            </a>
                        </div>
                        <div class="btn-read ms-2 flex items-center gap-[8px]">
                            <span>Theo dõi</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                <path
                                    d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z" />
                            </svg>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Novel Description -->
    <div class="my_container">
        <div class="switch_tab">
            <div x-data="{ line: false }" @click="switchTab('tab1', $event)" :class="{ 'active': activeTab === 'tab1' }"
                class="tab">
                <div @mouseover="line = true" @mouseleave="line = false" class="_box">
                    <h2>Thông tin</h2>
                    <div class="line">
                        <div x-show="line" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                            x-transition:leave="transition ease-in duration-300" x-transition:leave-start="translate-x-0"
                            x-transition:leave-end="translate-x-full" class="line-active"></div>
                    </div>
                </div>
            </div>
            <div class="h-[30px] border"></div>
            <div x-data="{ line: false }" @click="switchTab('tab2', $event)" :class="{ 'active': activeTab === 'tab2' }"
                class="tab">
                <div @mouseover="line = true" @mouseleave="line = false" class="_box">
                    <h2>Chương</h2>
                    <div class="line">
                        <div x-show="line" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                            x-transition:leave="transition ease-in duration-300" x-transition:leave-start="translate-x-0"
                            x-transition:leave-end="translate-x-full" class="line-active"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab_content">
            {{-- tab thông tin --}}
            <div x-ref="tab1" class="-info_tab">
                {{-- tóm tắt --}}
                <div class="novel_summary">
                    <p class="">Tóm tắt</p>
                    <span class="">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odio cum magnam
                        tempore nobis voluptates molestias! Amet, illo cumque itaque voluptatum quas ducimus ullam, facilis
                        dolor, nesciunt reiciendis officia fugit sapiente. Lorem ipsum dolor sit, amet consectetur
                        adipisicing elit. Similique laudantium odit perspiciatis eius ipsum qui, pariatur ratione magnam non
                        et, laborum nihil fuga id officiis sint eligendi debitis nisi iure?</span>
                </div>

                {{-- đánh giá --}}
                <div class="review">
                    <span class="-count">00 Lượt đánh giá</span>

                    <div class="-star">
                        <span>4.5</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="none" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                        </svg>

                    </div>
                </div>

                {{-- bình luận --}}
                <div class="py-[30px]">
                    <p class="text-h5 text-bluee dark:text-green09">Đánh giá</p>
                </div>

                <div class="comment">
                    <div class="-wraper">
                        <div class="mb-6 text-center">
                            <h2>Viết đánh giá</h2>
                            <p>Bạn có thích [Tên Truyện] không?</p>
                            <div class="-star" id="star-rating">
                                <svg data-rating="1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                </svg>
                                <svg data-rating="2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                </svg>
                                <svg data-rating="3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                </svg>
                                <svg data-rating="4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                </svg>
                                <svg data-rating="5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                </svg>
                            </div>
                        </div>
                        <!-- Phần nhập đánh giá -->
                        <div class="-input_area">
                            <textarea class="" placeholder="Thêm đánh giá..."></textarea>
                            <div class="check-input">
                                <span class="mb-1 text-gray02 dark:text-white11">0 Chữ</span>
                                <span class="text-Danger09">Đánh giá phải tối thiểu 100 chữ</span>
                            </div>
                            <div class="submit-btn text-right">
                                <button class="">Nộp</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- số lượng bình luận --}}
                <div class="number_of_cmt">
                    <h3 class="">000 Đánh giá</h3>

                    <div x-data="{openDD: false}" class="relative w-fit">
                        <div x-ref="sortCommentBtn" @click="openDD = !openDD" class="commonBtnDropdown" :class="{'active': openDD === true }">
                            <span>Sắp xếp</span>
                            <svg class="h-6 w-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 9-7 7-7-7" />
                            </svg>
                        </div>
    
                        <!-- Dropdown menu -->
                        <div x-show="openDD" x-bind:style="'min-width: ' + $refs.sortCommentBtn.offsetWidth + 'px;'" id="sortComment" class="commonDropdown">
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

                <!-- Card đánh giá -->
                @for ($i = 0; $i < 8; $i++)
                    <div class="comment_card">
                        <div x-data="{ expanded: false }" class="wrapper">
                            <div class="user">
                                <div class="avatar"></div>
                                <div>
                                    <p class="name">User name</p>
                                    <div class="star">
                                        <svg class="star-filled" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path
                                                d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                        </svg>
                                        <svg class="star-filled" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path
                                                d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                        </svg>
                                        <svg class="star-filled" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path
                                                d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                        </svg>
                                        <svg class="star-filled" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path
                                                d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                        </svg>
                                        <svg class="star-empty" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path
                                                d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <p :class="expanded ? 'line-clamp-none' : 'line-clamp-2'"
                                class="content transition-all duration-300 ease-in-out">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                                voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus iste laudantium beatae culpa minus in, aut hic error molestiae eligendi perferendis voluptates quisquam nisi consectetur, id, rerum eaque iure officia? Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aut, natus sapiente? Id totam officia quam ab modi aut in nisi maxime expedita quisquam, fugit sunt odio voluptas aperiam ex dolor!
                                Aut, at officia ipsam suscipit ad tempore porro nostrum exercitationem sed temporibus ab velit earum laudantium eveniet ut dolores veritatis odio quae perferendis delectus repellendus esse maxime voluptatibus? Atque, minus.
                                Deserunt sint ipsa distinctio ea maxime tempore eligendi porro cumque, eveniet voluptate alias molestias dolore! Iste ratione ex, exercitationem esse veniam aliquam quas minima numquam dolorem quis natus perferendis dolore.
                            </p>

                            <div class="show_more mb-3" @click="expanded = !expanded">
                                <span x-text="expanded ? 'Thu gọn' : 'Hiển thị thêm'"></span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="size-6 transition-transform duration-300 ease-in-out"
                                    :class="expanded ? 'rotate-180' : 'rotate-0'">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                </svg>
                            </div>

                            <div class="interact-btn">
                                <div class="flex gap-[5px]">
                                    {{-- like --}}
                                    <button class="button">
                                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="1.5"
                                                d="M7 11c.889-.086 1.416-.543 2.156-1.057a22.323 22.323 0 0 0 3.958-5.084 1.6 1.6 0 0 1 .582-.628 1.549 1.549 0 0 1 1.466-.087c.205.095.388.233.537.406a1.64 1.64 0 0 1 .384 1.279l-1.388 4.114M7 11H4v6.5A1.5 1.5 0 0 0 5.5 19v0A1.5 1.5 0 0 0 7 17.5V11Zm6.5-1h4.915c.286 0 .372.014.626.15.254.135.472.332.637.572a1.874 1.874 0 0 1 .215 1.673l-2.098 6.4C17.538 19.52 17.368 20 16.12 20c-2.303 0-4.79-.943-6.67-1.475" />
                                        </svg>
                                        <span>000</span>
                                    </button>
                                    {{-- dislike --}}
                                    <button class="button">
                                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="1.5"
                                                d="M17 13c-.889.086-1.416.543-2.156 1.057a22.322 22.322 0 0 0-3.958 5.084 1.6 1.6 0 0 1-.582.628 1.549 1.549 0 0 1-1.466.087 1.587 1.587 0 0 1-.537-.406 1.666 1.666 0 0 1-.384-1.279l1.389-4.114M17 13h3V6.5A1.5 1.5 0 0 0 18.5 5v0A1.5 1.5 0 0 0 17 6.5V13Zm-6.5 1H5.585c-.286 0-.372-.014-.626-.15a1.797 1.797 0 0 1-.637-.572 1.873 1.873 0 0 1-.215-1.673l2.098-6.4C6.462 4.48 6.632 4 7.88 4c2.302 0 4.79.943 6.67 1.475" />
                                        </svg>
                                        <span>000</span>
                                    </button>
                                    {{-- comment --}}
                                    <button class="button" data-modal-target="subComment-modal{{ $i }}"
                                        data-modal-toggle="subComment-modal{{ $i }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a5.969 5.969 0 0 1-.474-.065 4.48 4.48 0 0 0 .978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z" />
                                        </svg>
                                        <span>000</span>
                                    </button>
                                </div>

                                <a href="#" class="button" data-tooltip-target="commentReport{{ $i }}"
                                    data-tooltip-placement="bottom">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                    </svg>
                                </a>
                                <!-- Tooltip -->
                                <div id="commentReport{{ $i }}" role="tooltip" class="toolTipCustom opacity-0 invisible">
                                    Báo cáo lạm dụng
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="subComment-modal{{ $i }}" tabindex="-1" aria-hidden="true"
                        class="subComment-modal hidden">
                        <div class="relative max-h-full w-full max-w-[750px] p-4">
                            <div class="h-[10px] bg-bluee dark:bg-green09"></div>
                            <!-- Modal content -->
                            <div class="wrapper">
                                <!-- Modal header -->
                                <div class="header">
                                    <h3 class="">Đánh giá chi tiết</h3>
                                    @include('components.comment-block')
                                </div>
                                <!-- Modal body -->
                                <div class="body">
                                    <h3>Xem 000 trả lời</h3>
                                    <div class="max-h-[400px] overflow-y-scroll">
                                        @for ($j = 0; $j < 4; $j++)
                                        <div class="comment_block">
                                            <div class="flex gap-[10px]">
                                                <div class="left">
                                                    <div class="avatar">
                                                    </div>
                                                </div>
                                        
                                                <div class="right">
                                                    <div class="flex flex-col gap-[5px]">
                                                        <p class="name">User name</p>
                                                    </div>
                                        
                                                    <div x-data="{ expanded: false }" class="content">
                                                        <p :class="expanded ? 'line-clamp-none' : 'line-clamp-2'"
                                                            class="content transition-all duration-300 ease-in-out">
                                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                                            eiusmod tempor incididunt ut
                                                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                            exercitation ullamco
                                                            laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                                            dolor in reprehenderit in
                                                            voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                                            Excepteur sint occaecat
                                                            cupidatat non proident, sunt in culpa qui officia deserunt mollit
                                                            anim id est laborum.
                                                        </p>
                                        
                                                        <div class="show_more" @click="expanded = !expanded">
                                                            <span x-text="expanded ? 'Thu gọn' : 'Hiển thị thêm'"></span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                                class="size-6 transition-transform duration-300 ease-in-out"
                                                                :class="expanded ? 'rotate-180' : 'rotate-0'">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                        
                                                    <div class="interact-btn">
                                                        <div class="flex gap-[5px]">
                                                            {{-- like --}}
                                                            <button class="button">
                                                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" fill="none" viewBox="0 0 24 24">
                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="1.5"
                                                                        d="M7 11c.889-.086 1.416-.543 2.156-1.057a22.323 22.323 0 0 0 3.958-5.084 1.6 1.6 0 0 1 .582-.628 1.549 1.549 0 0 1 1.466-.087c.205.095.388.233.537.406a1.64 1.64 0 0 1 .384 1.279l-1.388 4.114M7 11H4v6.5A1.5 1.5 0 0 0 5.5 19v0A1.5 1.5 0 0 0 7 17.5V11Zm6.5-1h4.915c.286 0 .372.014.626.15.254.135.472.332.637.572a1.874 1.874 0 0 1 .215 1.673l-2.098 6.4C17.538 19.52 17.368 20 16.12 20c-2.303 0-4.79-.943-6.67-1.475" />
                                                                </svg>
                                                                <span>000</span>
                                                            </button>
                                                            {{-- dislike --}}
                                                            <button class="button">
                                                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" fill="none" viewBox="0 0 24 24">
                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="1.5"
                                                                        d="M17 13c-.889.086-1.416.543-2.156 1.057a22.322 22.322 0 0 0-3.958 5.084 1.6 1.6 0 0 1-.582.628 1.549 1.549 0 0 1-1.466.087 1.587 1.587 0 0 1-.537-.406 1.666 1.666 0 0 1-.384-1.279l1.389-4.114M17 13h3V6.5A1.5 1.5 0 0 0 18.5 5v0A1.5 1.5 0 0 0 17 6.5V13Zm-6.5 1H5.585c-.286 0-.372-.014-.626-.15a1.797 1.797 0 0 1-.637-.572 1.873 1.873 0 0 1-.215-1.673l2.098-6.4C6.462 4.48 6.632 4 7.88 4c2.302 0 4.79.943 6.67 1.475" />
                                                                </svg>
                                                                <span>000</span>
                                                            </button>
                                                        </div>
                                                        <a href="#" class="button" data-tooltip-target="subCommentReport{{$j}}"
                                                            data-tooltip-placement="bottom">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                                            </svg>
                                                        </a>
                                                        <!-- Dropdown menu -->
                                                        <div id="subCommentReport{{$j}}" role="tooltip" class="toolTipCustom opacity-0 invisible">
                                                            Báo cáo lạm dụng
                                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                                        </div>
                                                    </div>
                                                </div>
                                        
                                            </div>
                                        </div>
                                        @endfor
                                    </div>
                                </div>
                                <!-- Modal footer -->
                                <div class="bottom">
                                    <input type="text" class="" placeholder="Thêm một câu trả lời ....">
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor

                <!-- Pagination -->
                @include('components.pagination')
            </div>

            {{-- tab danh sách chương --}}
            <div x-ref="tab2" class="-chapter_tab hidden">
                <!-- Header -->
                <div class="header">
                    <h1 class="">Chương mới nhất</h1>
                    <div class="mb-6 flex items-center justify-between">
                        <div class="lastest">
                            <span class="">Chương 000</span>
                            <span class="">12 giờ trước</span>
                        </div>
                        <div x-data="{openDD: false}" @click.outside="openDD = false" class="relative">
                            <div x-ref="sortChapterBtn" id="sortChapterBtn" @click="openDD = !openDD" class="commonBtnDropdown" :class="{'active': openDD === true }">
                                <span>Sắp xếp</span>
                                <svg class="h-6 w-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="m19 9-7 7-7-7" />
                                </svg>
                            </div>
        
                            <!-- Dropdown menu -->
                            <div x-show="openDD" x-bind:style="'min-width: ' + $refs.sortChapterBtn.offsetWidth + 'px;'" id="sortChapter" class="commonDropdown">
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
                </div>

                <!-- Chapter Grid -->
                <div class="chapter-grid mb-8">
                    <!-- Chapter items - repeated 24 times -->
                    @for ($i = 0; $i < 24; $i++)
                        <a href="/chapter" class="-item">
                            <div class="mark_box">
                                00
                            </div>
                            <div class="name">
                                <h3 class="">Chương 00</h3>
                                <p class="">18/02/2025</p>
                            </div>
                            <div class="watch">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                                <span class="">000k</span>
                            </div>
                        </a>
                    @endfor
                    <!-- Repeat the above div 23 more times with the same structure -->
                </div>

                <!-- Pagination -->
                @include('components.pagination')
            </div>
        </div>
    </div>

    {{-- may be you like --}}
    <div class="may_like my_container py-[70px]">
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

    {{-- report modal --}}
    @include('components/report-modal')

</div>
@endsection

@section('foot')
    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("alpineDetailPage", () => ({
                activeTab: "tab1",
                isReportModalOpen: false,
                switchTab(newTab, event) {
                    if (newTab === this.activeTab) return;

                    let currentTab = this.$refs[this.activeTab];
                    let nextTab = this.$refs[newTab];

                    gsap.to(currentTab, {
                        opacity: 0,
                        y: 10,
                        duration: 0.3,
                        onComplete: () => {
                            currentTab.classList.add("hidden");
                            nextTab.classList.remove("hidden");

                            gsap.fromTo(nextTab, {
                                opacity: 0,
                                y: 10
                            }, {
                                opacity: 1,
                                y: 0,
                                duration: 0.4
                            });
                        }
                    });

                    this.activeTab = newTab;
                },
                openReportModal(){
                    this.isReportModalOpen = true;
                    gsap.fromTo(this.$refs.report, {
                        opacity: 0,
                        scale: 0
                    }, {
                        opacity: 1,
                        scale: 1,
                        duration: 0.4,
                        ease: "power3.out"
                    });
                },
                closeReportModal(){
                    gsap.to(this.$refs.report, {
                        opacity: 0,
                        scale: 0,
                        duration: 0.4,
                        ease: "power3.in",
                        onComplete: () => {
                            this.isReportModalOpen = false;
                        }
                    });
                }
            }));
        });

        document.addEventListener('DOMContentLoaded', function() {
            const starRating = document.getElementById('star-rating');
            const stars = starRating.querySelectorAll('svg');
            let currentRating = 4; // Giá trị mặc định

            function updateStars(rating) {
                stars.forEach((star, index) => {
                    if (index < rating) {
                        star.classList.add('star-filled');
                        star.classList.remove('star-empty');
                    } else {
                        star.classList.add('star-empty');
                        star.classList.remove('star-filled');
                    }
                });
            }

            updateStars(currentRating);

            stars.forEach(star => {
                star.addEventListener('click', function() {
                    currentRating = parseInt(this.getAttribute('data-rating'));
                    updateStars(currentRating);
                });

                star.addEventListener('mouseover', function() {
                    const hoverRating = parseInt(this.getAttribute('data-rating'));
                    updateStars(hoverRating);
                });

                star.addEventListener('mouseout', function() {
                    updateStars(currentRating);
                });
            });

            starRating.addEventListener('mouseout', function() {
                updateStars(currentRating);
            });
        });
    </script>
@endsection
