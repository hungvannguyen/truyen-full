@extends('layouts.default')

@section('head')
@endsection

@section('content')

<div class="my_container">
    @include ('components.home-slide')

    <div class="Section1">
        <div class="_left">
            {{-- truyen hot --}}
            <div class="truyenHot">
                <div x-data="{ line: false }" class="sectionTitle1 sectionTitle">
                    <a href="#" @mouseover="line = true" @mouseleave="line = false" class="_box">
                        <h2>Truyện Hot</h2>
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
                    @for ($i = 0; $i < 8; $i++)
                        @include('components.card')
                    @endfor
                </div>
            </div>

            {{-- truyen moi --}}
            <div class="truyenMoi pt-[80px]">
                <div class="_headSection flex items-center justify-between">
                    <div x-data="{ line: false }" class="sectionTitle1 sectionTitle" style="margin-bottom: 0;">
                        <a href="#" @mouseover="line = true" @mouseleave="line = false" class="_box">
                            <h2>Truyện mới cập nhật</h2>
                            <div class="line">
                                <div x-show="line" x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                                    x-transition:leave="transition ease-in duration-300"
                                    x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
                                    class="line-active"></div>
                            </div>
                        </a>
                    </div>
                    <div class="-sortBtn">
                        <span>Sắp xếp</span>
                        <svg class="h-6 w-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 9-7 7-7-7" />
                        </svg>
                    </div>
                </div>
                @for ($i = 0; $i < 8; $i++)
                    @include('components.card-row')
                @endfor
            </div>
        </div>
        {{-- section right --}}
        <div class="_sectionRight">
            <div x-data="{activeTab: 'tab1' }" class="_topStory">
                <div class="-selection">
                    <span :class="{'active': activeTab === 'tab1'}" @click="activeTab = 'tab1'">tháng</span>
                    <span :class="{'active': activeTab === 'tab2'}" @click="activeTab = 'tab2'">tuần</span>
                    <span :class="{'active': activeTab === 'tab3'}" @click="activeTab = 'tab3'">ngày</span>
                </div>
                <div class="_content">
                    @php
                        $topColors = [
                            'bg-bluee text-white',
                            'bg-Danger09 text-white',
                            'bg-greenTag text-white',
                            'bg-transparent text-grayy border border-grayy dark:border-white11',
                            'bg-transparent text-grayy border border-grayy dark:border-white11',
                            'bg-transparent text-grayy border border-grayy dark:border-white11',
                        ];
                    @endphp
                    <div class="-tabCont" x-show="activeTab === 'tab1'"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="transition ease-in duration-300"
                        x-transition:leave-start="opacity-0"
                        x-transition:leave-end="opacity-0">
                        @for ($i = 0; $i < 6; $i++)
                            <div class="-box">
                                <div class="-circle {{ $topColors[$i % count($topColors)] }}">0{{ $i + 1 }}</div>
                                <img src="{{ asset('/images/home-hero/Home-hero-2.png') }}" alt="" class="">
                                <div class="-info">
                                    <h3>sau khi ký ức bị phơi bày</h3>
                                    <div class="-chapter">
                                        <span>Chapter 000</span>
                                        <div class="-watch">
                                            <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-width="2"
                                                    d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                                <path stroke="currentColor" stroke-width="2"
                                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>
                                            <span>000k</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>

                    <div class="-tabCont" x-show="activeTab === 'tab2'"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="transition ease-in duration-300"
                        x-transition:leave-start="opacity-0"
                        x-transition:leave-end="opacity-0">
                        @for ($i = 0; $i < 6; $i++)
                            <div class="-box">
                                <div class="-circle {{ $topColors[$i % count($topColors)] }}">0{{ $i + 1 }}</div>
                                <img src="{{ asset('/images/home-hero/Home-hero-1.png') }}" alt="" class="">
                                <div class="-info">
                                    <h3>sau khi ký ức bị phơi bày</h3>
                                    <div class="-chapter">
                                        <span>Chapter 000</span>
                                        <div class="-watch">
                                            <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-width="2"
                                                    d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                                <path stroke="currentColor" stroke-width="2"
                                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>
                                            <span>000k</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>

                    <div class="-tabCont" x-show="activeTab === 'tab3'"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="transition ease-in duration-300"
                        x-transition:leave-start="opacity-0"
                        x-transition:leave-end="opacity-0">
                        @for ($i = 0; $i < 6; $i++)
                            <div class="-box">
                                <div class="-circle {{ $topColors[$i % count($topColors)] }}">0{{ $i + 1 }}</div>
                                <img src="{{ asset('/images/home-hero/Home-hero-3.png') }}" alt="" class="">
                                <div class="-info">
                                    <h3>sau khi ký ức bị phơi bày</h3>
                                    <div class="-chapter">
                                        <span>Chapter 000</span>
                                        <div class="-watch">
                                            <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-width="2"
                                                    d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                                <path stroke="currentColor" stroke-width="2"
                                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>
                                            <span>000k</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>

            <div class="_readingStory">
                <div class="_title">
                    <div x-data="{ line: false }" class="sectionTitle2 sectionTitle">
                        <a href="#" @mouseover="line = true" @mouseleave="line = false" class="_box">
                            <h2>Truyện đang đọc</h2>
                            <div class="line">
                                <div x-show="line" x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                                    x-transition:leave="transition ease-in duration-300" x-transition:leave-start="translate-x-0"
                                    x-transition:leave-end="translate-x-full" class="line-active"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="_content">
                    <table>
                        <tbody>
                            @for ($i = 0; $i < 6; $i++)
                                <tr>
                                    <td><a href="">sau khi ký ức bị phơi bày</a></td>
                                    <td><a href="#">Đọc tiếp C1</a></td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>

                </div>
            </div>

            <div class="_storyCategory">
                <div class="_title">
                    <div x-data="{ line: false }" class="sectionTitle2 sectionTitle">
                        <a href="#" @mouseover="line = true" @mouseleave="line = false" class="_box">
                            <h2>thể loại truyện</h2>
                            <div class="line">
                                <div x-show="line" x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                                    x-transition:leave="transition ease-in duration-300" x-transition:leave-start="translate-x-0"
                                    x-transition:leave-end="translate-x-full" class="line-active"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="_content">
                    <a href="/category">Đam mỹ</a>
                    <a href="/category">xuyên nhanh</a>
                    <a href="/category">Ngôn tình</a>
                    <a href="/category">Bách hợp</a>
                    <a href="/category">đam mỹ</a>
                    <a href="/category">ngôn tình</a>
                    <a href="/category">Ngược</a>
                    <a href="/category">kiếm hiệp</a>
                    <a href="/category">tiên hiệp</a>
                    <a href="/category">hệ thống</a>
                </div>
            </div>
        </div>
    </div>

    <div class="Section2 pt-[90px]">
        <div class="truyenFull">
            <div x-data="{ line: false }" class="sectionTitle1 sectionTitle">
                <a href="/category" @mouseover="line = true" @mouseleave="line = false" class="_box">
                    <h2>Truyện đã hoàn thành</h2>
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

        <div class="truyenFull">
            <div x-data="{ line: false }" class="sectionTitle1 sectionTitle">
                <a href="/category" @mouseover="line = true" @mouseleave="line = false" class="_box">
                    <h2>Truyện đã kiếm hiệp</h2>
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

        <div class="truyenFull">
            <div x-data="{ line: false }" class="sectionTitle1 sectionTitle">
                <a href="/category" @mouseover="line = true" @mouseleave="line = false" class="_box">
                    <h2>Truyện đã tiên hiệp</h2>
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
</div>
@endsection
