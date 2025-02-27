@extends('layouts.default')

@section('content')
    <div id="bg-chapter" class="bg-chapter">
        <div class="my_container chapterPage py-8">
            <!-- Breadcrumb -->
            @include('components/breadcrumb')

            <!-- Title -->
            <h1 class="title">
                Xuyên Sách, Hành Trình Tìm Kiếm Hạnh Phúc<br>
                Hoàn Hảo Của Nữ Phụ
            </h1>

            <!-- Chapter Navigation -->
            <div class="chapter_navigation">
                <button class="navigation_btn">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <select
                    class="rounded-lg border bg-white px-[8px] py-[4px] text-gray02 dark:border-white11 dark:bg-bgNavbar dark:text-white11">
                    @for ($i = 1; $i <= 10; $i++)
                        <option>Chương {{ $i }}</option>
                    @endfor
                    <!-- Add more chapters as needed -->
                </select>
                <button class="navigation_btn">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>

            <div x-data="{openDD: false}" class="relative">
                <div @click.outside="openDD = false" class="w-fit">
                    <!-- Reading Settings -->
                    <div x-ref="settingStyleBtn" @click="openDD = !openDD" class="reading_setting" :class="{'active': openDD === true }">
                        Tuỳ chỉnh
                        <svg class="ms-3 h-2.5 w-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </div>
        
                    <!-- Dropdown menu -->
                    <div x-show="openDD" class="reading_setting-dropdown">
                        <div class="wrapper">
                            <div class="item">
                                <label for="bg-color" class="">Màu nền</label>
                                <select id="bg-color" class="">
                                    <option value="#ffffff">Trắng</option>
                                    <option value="#f5f5f5">Xám nhạt</option>
                                    <option value="#404040">Đen</option>
                                    <option value="#ff0000">Đỏ</option>
                                    <option value="#00ff00">Xanh lá</option>
                                    <option value="#0000ff">Xanh dương</option>
                                    <option value="#ffff00">Vàng</option>
                                </select>
                            </div>
                            <div class="item">
                                <label for="font-family" class="">Font chữ</label>
                                <select id="font-family" class="">
                                    <option value="Arial">Arial</option>
                                    <option value="Roboto">Roboto</option>
                                    <option value="Helvetica">Helvetica</option>
                                    <option value="Times New Roman">Times New Roman</option>
                                    <option value="Courier">Courier</option>
                                    <option value="Verdana">Verdana</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="Palatino">Palatino</option>
                                </select>
                            </div>
                            <div class="item">
                                <label for="font-size" class="">Size chữ</label>
                                <select id="font-size" class="">
                                    <option value="12">12px</option>
                                    <option value="14">14px</option>
                                    <option value="16">16px</option>
                                    <option value="18">18px</option>
                                    <option value="20">20px</option>
                                    <option value="22">22px</option>
                                    <option value="24">24px</option>
                                    <option value="40">40px</option>
                                </select>
                            </div>
                            <div class="item">
                                <label for="line-height" class="">Chiều cao dòng</label>
                                <select id="line-height" class="">
                                    <option value="1">100%</option>
                                    <option value="1.2">120%</option>
                                    <option value="1.4">140%</option>
                                    <option value="1.6">160%</option>
                                    <option value="1.8">180%</option>
                                    <option value="2">200%</option>
                                    <option value="2.2">220%</option>
                                    <option value="2.4">240%</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div id="content" contenteditable="true" class="editable prose max-w-none">
                <p class="mb-6">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat.
                </p>
                <p class="mb-6">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                    deserunt mollit anim id est laborum.
                </p>
                <p class="mb-6">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                    deserunt mollit anim id est laborum.
                </p>
            </div>

            <!-- Chapter Navigation -->
            <div class="mb-8 flex items-center justify-center gap-4">
                <button
                    class="flex items-center rounded-lg border border-gray02 bg-white p-2 text-gray02 hover:bg-gray-100 dark:border-white11 dark:bg-bgNavbar dark:text-white11">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    <span class="">Chương trước</span>
                </button>
                <select class="h-full rounded-lg border bg-white px-[8px] text-gray02">
                    @for ($i = 1; $i <= 10; $i++)
                        <option>Chương {{ $i }}</option>
                    @endfor
                    <!-- Add more chapters as needed -->
                </select>
                <button
                    class="flex items-center rounded-lg border border-gray02 bg-white p-2 text-gray02 hover:bg-gray-100 dark:border-white11 dark:bg-bgNavbar dark:text-white11">
                    <span class="">Chương sau</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>

            {{-- may be you like --}}
            <div class="may_like my_container py-[70px]">
                <div x-data="{ line: false }" class="sectionTitle1 sectionTitle">
                    <a href="/category" @mouseover="line = true" @mouseleave="line = false" class="_box">
                        <h2>bạn có thể thích</h2>
                        <div class="line">
                            <div x-show="line" x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                                x-transition:leave="transition ease-in duration-300"
                                x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
                                class="line-active"></div>
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
    </div>
@endsection

@section('foot')
    <script>
        function updateStyles() {
            const bgColor = document.getElementById('bg-color').value;
            const fontFamily = document.getElementById('font-family').value;
            const fontSize = document.getElementById('font-size').value;
            const lineHeight = document.getElementById('line-height').value;
            const textColor = getContrastColor(bgColor);

            const bgChapter = document.getElementById('bg-chapter');
            bgChapter.style.setProperty('background-color', bgColor, 'important');

            document.querySelectorAll('.editable').forEach(el => {
                el.style.setProperty('font-family', fontFamily, 'important');
                el.style.setProperty('font-size', `${fontSize}px`, 'important');
                el.style.setProperty('line-height', lineHeight, 'important');
                el.style.setProperty('color', textColor, 'important');
            });

            localStorage.setItem('bg-color', bgColor);
            localStorage.setItem('font-family', fontFamily);
            localStorage.setItem('font-size', fontSize);
            localStorage.setItem('line-height', lineHeight);
            localStorage.setItem('text-color', textColor);
        }

        function loadStyles() {
            const bgColor = localStorage.getItem('bg-color');
            const fontFamily = localStorage.getItem('font-family') || 'Roboto';
            const fontSize = localStorage.getItem('font-size') || '14';
            const lineHeight = localStorage.getItem('line-height') || '1';
            const textColor = localStorage.getItem('text-color') || getContrastColor(bgColor);

            document.getElementById('bg-color').value = bgColor;
            document.getElementById('font-family').value = fontFamily;
            document.getElementById('font-size').value = fontSize;
            document.getElementById('line-height').value = lineHeight;

            const bgChapter = document.getElementById('bg-chapter');
            bgChapter.style.setProperty('background-color', bgColor, 'important');

            document.querySelectorAll('.editable').forEach(el => {
                el.style.setProperty('font-family', fontFamily, 'important');
                el.style.setProperty('font-size', `${fontSize}px`, 'important');
                el.style.setProperty('line-height', lineHeight, 'important');
                el.style.setProperty('color', textColor, 'important');
            });
        }

        function getContrastColor(hex) {
            let r, g, b;

            if (hex.startsWith('#')) {
                const bigint = parseInt(hex.substring(1), 16);
                r = (bigint >> 16) & 255;
                g = (bigint >> 8) & 255;
                b = bigint & 255;
            } else {
                return '#000000'; // Mặc định nếu không phải màu HEX
            }

            // Tính độ sáng (Luminance) theo công thức WCAG
            const brightness = (r * 299 + g * 587 + b * 114) / 1000;
            return brightness > 128 ? '#000000' : '#ffffff'; // Nếu sáng thì dùng chữ đen, nếu tối thì dùng chữ trắng
        }

        document.getElementById('bg-color').addEventListener('change', updateStyles);
        document.getElementById('font-family').addEventListener('change', updateStyles);
        document.getElementById('font-size').addEventListener('change', updateStyles);
        document.getElementById('line-height').addEventListener('change', updateStyles);

        loadStyles();
    </script>
@endsection
