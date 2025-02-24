@extends('layouts.default')

@section('content')
    <div class="category">
        @include('components/breadcrumb')

        <div class="cat_info">
            <div class="-container">
                <!-- Header -->
                <div class="_header">
                    <h2>Chủ đề</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    </p>
                </div>

                <!-- Filters -->
                <div class="filter">
                    <h2>Lọc theo:</h2>
                    <div class="_select">
                        <button class="active">Tất cả</button>
                        <button>Hoàn thành</button>
                        <button>Đang diễn ra</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grid -->
        <div class="cat_content my_container">
            <!-- item -->
            @for ($i = 0; $i < 6*3; $i++)
                <div class="-item">
                    <div class="_img">
                        <img src="{{ asset('/images/home-hero/Home-hero-1.png') }}" alt="banner1">
                    </div>

                    <div class="_info">
                        <div class="-tag_box">
                            <div class="tag bg-greenTag">tag</div>
                            <div class="tag bg-Danger09">tag</div>
                            <div class="tag bg-bluee">tag</div>
                        </div>

                        <div class="-storyinfo">
                            <div class="">
                                <a href="/details">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore</a>
                                <a href="#" class="_author">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                        </path>
                                    </svg>
                                    <span>Thảo Tửu Đích Khiếu Hoa Tử</span>
                                </a>
                            </div>
                            <div class="_chapter">
                                <span>Chapter 000</span>
                                <div class="-view">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                        </path>
                                    </svg>
                                    <span>000k</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            @endfor
        </div>

        <!-- Pagination -->
        <div class="pagination w-full flex justify-center">
            @include('components.pagination')
        </div>
    </div>
@endsection
