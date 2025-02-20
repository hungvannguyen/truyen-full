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
                        </div>
                    </div>

                    <button class="btn-read">
                        Bắt đầu đọc
                    </button>
                </div>


            </div>
        </div>
    </div>

    <!-- Novel Description -->
    <div x-data="tabSwitcher()" class="my_container ">
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
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="none" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                        </svg>

                    </div>
                </div>

                {{-- bình luận --}}
                <div class="py-[30px]">
                    <p class="text-h5 dark:text-green09 text-bluee">Đánh giá</p>
                </div>

                <div class="comment">
                    <div class="-wraper">
                        <div class="text-center mb-6">
                            <h2>Viết đánh giá</h2>
                            <p>Bạn có thích [Tên Truyện] không?</p>
                            <div class="-star" id="star-rating">
                                <svg data-rating="1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                                <svg data-rating="2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                                <svg data-rating="3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                                <svg data-rating="4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                                <svg data-rating="5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                            </div>
                        </div>
                        <!-- Phần nhập đánh giá -->
                        <div class="-input_area">
                            <textarea class="" placeholder="Thêm đánh giá..."></textarea>
                            <div class="flex flex-col justify-between text-sm mb-3">
                                <span class="text-gray-500">0 Chữ</span>
                                <span class="text-red-500">Đánh giá phải tối thiểu 100 chữ</span>
                            </div>
                            <div class="text-right">
                                <button class="bg-blue-500 text-white px-8 py-2 rounded-full hover:bg-blue-600">Nộp</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between items-center my-[30px]">
                    <h3 class="text-[21px] font-semibold text-gray02">000 Đánh giá</h3>
                    <select class="text-[16px] text-gray02 border rounded-lg px-4 py-1 focus:outline-none">
                        <option>Sắp xếp</option>
                    </select>
                </div>

                <!-- Card đánh giá -->
                @for ($i = 0; $i < 8; $i++)
                <div class="border rounded-2xl bg-white mb-[30px] shadow-md">
                    <div class="max-w-[910px] mx-auto my-[30px]">
                        <div class="flex items-start gap-3 mb-3">
                            <div class="w-10 h-10 bg-gray-200 rounded-full"></div>
                            <div>
                                <p class="font-medium mb-1">User name</p>
                                <div class="flex gap-1">
                                    <svg class="w-4 h-4 star-filled" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                    </svg>
                                    <svg class="w-4 h-4 star-filled" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                    </svg>
                                    <svg class="w-4 h-4 star-filled" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                    </svg>
                                    <svg class="w-4 h-4 star-filled" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                    </svg>
                                    <svg class="w-4 h-4 star-empty" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-3 comment-text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                        <button class="text-blue-500 text-sm mb-3 show-more">Hiện thị thêm</button>
                        <div class="flex gap-6">
                            <button class="flex items-center gap-1 text-gray-500">
                                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 11c.889-.086 1.416-.543 2.156-1.057a22.323 22.323 0 0 0 3.958-5.084 1.6 1.6 0 0 1 .582-.628 1.549 1.549 0 0 1 1.466-.087c.205.095.388.233.537.406a1.64 1.64 0 0 1 .384 1.279l-1.388 4.114M7 11H4v6.5A1.5 1.5 0 0 0 5.5 19v0A1.5 1.5 0 0 0 7 17.5V11Zm6.5-1h4.915c.286 0 .372.014.626.15.254.135.472.332.637.572a1.874 1.874 0 0 1 .215 1.673l-2.098 6.4C17.538 19.52 17.368 20 16.12 20c-2.303 0-4.79-.943-6.67-1.475"/>
                                  </svg>                                                                   
                                <span>000</span>
                            </button>
                            <button class="flex items-center gap-1 text-gray-500">
                                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 13c-.889.086-1.416.543-2.156 1.057a22.322 22.322 0 0 0-3.958 5.084 1.6 1.6 0 0 1-.582.628 1.549 1.549 0 0 1-1.466.087 1.587 1.587 0 0 1-.537-.406 1.666 1.666 0 0 1-.384-1.279l1.389-4.114M17 13h3V6.5A1.5 1.5 0 0 0 18.5 5v0A1.5 1.5 0 0 0 17 6.5V13Zm-6.5 1H5.585c-.286 0-.372-.014-.626-.15a1.797 1.797 0 0 1-.637-.572 1.873 1.873 0 0 1-.215-1.673l2.098-6.4C6.462 4.48 6.632 4 7.88 4c2.302 0 4.79.943 6.67 1.475"/>
                                  </svg>                                                                  
                                <span>000</span>
                            </button>
                            <button class="flex items-center gap-1 text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a5.969 5.969 0 0 1-.474-.065 4.48 4.48 0 0 0 .978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z" />
                                  </svg>                                  
                                <span>000</span>
                            </button>
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
                        <div class="flex justify-between items-center mb-6">
                            <div class="lastest">
                                <span class="">Chương 000</span>
                                <span class="">12 giờ trước</span>
                            </div>
                            <div class="relative">
                                <select class="sort">
                                    <option>Mới nhất</option>
                                </select>
                            </div>
                        </div>
                    </div>
            
                    <!-- Chapter Grid -->
                    <div class="chapter-grid mb-8">
                        <!-- Chapter items - repeated 24 times -->
                        @for ($i = 0; $i < 24; $i++)
                        <a href="#" class="-item">
                            <div class="mark_box">
                                00
                            </div>
                            <div class="name">
                                <h3 class="">Chương 00</h3>
                                <p class="">18/02/2025</p>
                            </div>
                            <div class="watch">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
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
@endsection

@section('foot')
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/gsap.min.js"></script>
    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("tabSwitcher", () => ({
                activeTab: "tab1",
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

