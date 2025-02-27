@extends('layouts.default')

@section('content')
    <div class="my_container authorPage">
        @include('components/breadcrumb')

        <div class="flex justify-between max-w-[1048px]">
            <div class="flex items-center gap-[30px]">
                <div class="avatar">
                    <img src="{{ asset('/images/home-hero/Home-hero-1.png') }}" class="" alt="author-avatar">
                </div>

                <div class="nameNJoinDate">
                    <div class="name">
                        Tên: <span class="font-semibold">Thảo Tửu Đích Khiếu Hoa Tử</span>
                    </div>

                    <div class="joinDate">
                        Ngày tham gia: <span class="font-semibold">01/01/2021</span>
                    </div>

                    <div class="btnFollow followed">
                        {{-- <span>Theo dõi</span> --}}
                        <span>Bỏ theo dõi</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                <path
                                    d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z" />
                            </svg>
                    </div>
                </div>
            </div>

            <div class="novelParameter ">
                <div class="novelUploaded">
                    Số truyện đã đăng: <span class="font-semibold">10</span>
                </div>

                <div class="follower">
                    Số người theo dõi: <span class="font-semibold">100</span>
                </div>

                <div class="authorRating">
                    Đánh giá: <span class="font-semibold">4.5</span>
                    <svg class="star-filled h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path
                            d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                    </svg>
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

            <div class="truyenFull">
                <div x-data="{ line: false }" class="sectionTitle1 sectionTitle">
                    <a href="/category" @mouseover="line = true" @mouseleave="line = false" class="_box">
                        <h2>Truyện đã kiếm hiệp</h2>
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

            <div class="truyenFull">
                <div x-data="{ line: false }" class="sectionTitle1 sectionTitle">
                    <a href="/category" @mouseover="line = true" @mouseleave="line = false" class="_box">
                        <h2>Truyện đã tiên hiệp</h2>
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
