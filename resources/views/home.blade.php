@extends('layouts.default')

@section('head')
@endsection

@section('content')
    <div class="my_container">
        @include ('components.home-slide')

        <div class="flex flex-row-reverse pb-[50px] pt-[10px]">
            <div x-data="{openDD: false}" @click.outside="openDD = false" class="relative w-fit">
                <div x-ref="sortAllHomeBtn" @click="openDD = !openDD" class="commonBtnDropdownBgColor" :class="{ 'active': openDD === true }" id="sortAllHomeBtn">
                    <span>Sắp xếp</span>
                    <svg class="h-6 w-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 9-7 7-7-7" />
                    </svg>
                </div>

                <!-- Dropdown menu -->
                <div x-show="openDD" x-bind:style="'min-width: ' + $refs.sortAllHomeBtn.offsetWidth + 'px;'" id="sortAllHome" class="commonDropdownBgColor">
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

        <div class="Section1">
            <div class="_left">
                {{-- truyen hot --}}
                <div class="truyenHot">
                    <div class="flex items-center justify-between pb-[30px]">
                        <div x-data="{ line: false }" class="sectionTitle1 sectionTitle" style="margin: 0;">
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
                        <div x-data="{openDD: false}" @click.outside="openDD = false" class="relative">
                            <div x-ref="sortTruyenHotBtn" @click="openDD = !openDD" class="commonBtnDropdownBgColor" :class="{ 'active': openDD === true }" id="sortTruyenHotBtn">
                                <span>Phân loại</span>
                                <svg class="h-6 w-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="m19 9-7 7-7-7" />
                                </svg>
                            </div>
    
                            <!-- Dropdown menu -->
                            <div x-show="openDD" x-bind:style="'min-width: ' + $refs.sortTruyenHotBtn.offsetWidth + 'px;'" id="sortTruyenHot" class="commonDropdownBgColor">
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
                        <div x-data="{openDD: false}" @click.outside="openDD = false" class="relative">
                            <div x-ref="sortTruyenMoiBtn" @click="openDD = !openDD" class="-sortBtn" :class="{ 'active': openDD === true }" id="sortTruyenMoiBtn">
                                <span>Phân loại</span>
                                <svg class="h-6 w-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="m19 9-7 7-7-7" />
                                </svg>
                            </div>
    
                            <!-- Dropdown menu -->
                            <div x-show="openDD" x-bind:style="'min-width: ' + $refs.sortTruyenMoiBtn.offsetWidth + 'px;'" id="sortTruyenMoi" class="commonDropdownBgColor">
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
                    @for ($i = 0; $i < 6; $i++)
                        @include('components.card-row')
                    @endfor
                </div>
            </div>
            {{-- section right --}}
            <div class="_sectionRight">
                <div x-data="rankingSwitcher()" class="_topStory">
                    <div class="-selection">
                        <span :class="{ 'active': activeTab === 'rankingMonth' }" @click="switchTab('rankingMonth', $event)" >tháng</span>
                        <span :class="{ 'active': activeTab === 'rankingWeek' }" @click="switchTab('rankingWeek', $event)">tuần</span>
                        <span :class="{ 'active': activeTab === 'rankingDay' }" @click="switchTab('rankingDay', $event)">ngày</span>
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
                        <div class="-tabCont" x-ref="rankingMonth">
                            @for ($i = 0; $i < 6; $i++)
                                @include('components.card-ranking')
                            @endfor
                        </div>

                        <div class="-tabCont hidden" x-ref="rankingWeek">
                            @for ($i = 0; $i < 6; $i++)
                                @include('components.card-ranking')
                            @endfor
                        </div>

                        <div class="-tabCont hidden" x-ref="rankingDay">
                            @for ($i = 0; $i < 6; $i++)
                                @include('components.card-ranking')
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
                                        x-transition:enter-start="-translate-x-full"
                                        x-transition:enter-end="translate-x-0"
                                        x-transition:leave="transition ease-in duration-300"
                                        x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
                                        class="line-active"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="_content">
                        <table>
                            <tbody>
                                @for ($i = 0; $i < 6; $i++)
                                    <tr>
                                        <td><a href="/details">sau khi ký ức bị phơi bày</a></td>
                                        <td><a href="/chapter">Đọc tiếp C1</a></td>
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
                                        x-transition:enter-start="-translate-x-full"
                                        x-transition:enter-end="translate-x-0"
                                        x-transition:leave="transition ease-in duration-300"
                                        x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
                                        class="line-active"></div>
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

        <div class="Section2">
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
                    @for ($i = 0; $i < 12; $i++)
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
                    @for ($i = 0; $i < 12; $i++)
                        @include('components.card')
                    @endfor
                </div>
            </div>
        </div>
    </div>

    @section('foot')
    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("rankingSwitcher", () => ({
                activeTab: "rankingMonth",
                switchTab(newTab, event) {
                    if (newTab === this.activeTab) return;

                    let currentTab = this.$refs[this.activeTab];
                    let nextTab = this.$refs[newTab];

                    gsap.to(currentTab, {
                        opacity: 0,
                        x: 50,
                        duration: 0.3,
                        onComplete: () => {
                            currentTab.classList.add("hidden");
                            nextTab.classList.remove("hidden");

                            gsap.fromTo(nextTab, {
                                opacity: 0,
                                x: -50
                            }, {
                                opacity: 1,
                                x: 0,
                                duration: 0.4
                            });
                        }
                    });

                    this.activeTab = newTab;
                }
            }));
        });
    </script>
    @endsection
@endsection
