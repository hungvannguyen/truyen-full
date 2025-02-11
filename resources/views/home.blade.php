@extends('layouts.default')

@section('head')
@endsection

@section('content')
    @include ('components.home-slide')

    <div class="Section1">
        <div class="_left">
            {{-- truyen hot --}}
            <div class="truyenHot">
                <div x-data="{line:false}" class="sectionTitle">
                    <a href="#" @mouseover="line = true" @mouseleave="line = false" class="_box">
                        <h2>Truyện Hot</h2>
                        <div class="line">
                            <div x-show="line"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="-translate-x-full"
                            x-transition:enter-end="translate-x-0"
                            x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="translate-x-0"
                            x-transition:leave-end="translate-x-full"
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
                    <div x-data="{line:false}" class="sectionTitle" style="margin-bottom: 0;">
                        <a href="#" @mouseover="line = true" @mouseleave="line = false" class="_box">
                            <h2>Truyện mới cập nhật</h2>
                            <div class="line">
                                <div x-show="line"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="-translate-x-full"
                                x-transition:enter-end="translate-x-0"
                                x-transition:leave="transition ease-in duration-300"
                                x-transition:leave-start="translate-x-0"
                                x-transition:leave-end="translate-x-full"
                                class="line-active"></div>
                            </div>
                        </a>
                    </div>
                    <div class="-sortBtn">
                        <span>Sắp xếp</span>
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                          </svg>
                    </div>
                </div>
                @for ($i = 0; $i < 8; $i++)
                <div class="_content ">
                    <div class="-item">
                        <div class="image">
                            <img src="{{ asset('/images/home-hero/Home-hero-2.png') }}" alt="">
                        </div>

                        <div class="-info flex flex-col justify-between py-[14px]">
                            <div class="-title">
                                <span class="">Sau Khi Ký Ức Bị Phơi Bày, Những Người Từng Bắt Nạt </span>
                                <span class="">Chương 000</span>
                                <span class="">8 giờ trước</span>
                            </div>

                            <div class="-bot">
                                <div class="_cate">
                                    <span>Truyện tranh</span>
                                    <span>Truyện tranh</span>
                                </div>

                                <div class="_tag">
                                    <div class="item bg-greenTag">Full</div>
                                    <div class="item bg-Danger09">Hot</div>
                                    <div class="item bg-bluee">New</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>
        {{-- section right --}}
        <div class="_sectionRight">
            <div class="_topStory">
               <div class="-selection">
                <span class="active">top tháng</span>
                <span>top tuần</span>
                <span>top ngày</span>
               </div>
                <div class="_content">
                    @for ($i = 0; $i < 6; $i++)
                    <div class="-box">
                        <div class="-circle">01</div>
                        <img src="{{ asset('/images/home-hero/Home-hero-2.png') }}" alt="" class="">
                        <div class="-info">
                            <h3>sau khi ký ức bị phơi bày</h3>
                            <div class="-chapter">
                                <span>Chapter 000</span>
                                <div class="-watch">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                        <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                      </svg>
                                      <span>000k</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>

            <div class="_readingStory">
                <div class="_title">
                    <h3>Truyện đang đọc</h3>
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
        </div>
    </div>
@endsection
