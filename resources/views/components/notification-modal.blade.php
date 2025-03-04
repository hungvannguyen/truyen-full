<div x-show="isNoficationOpen" class="notification-modal">
    <div x-ref="nofication" class="notifi-absolute">
        <div class="content-wrapper">
            <!-- Header -->
            <div class="header">
                <p class="">Thông báo</p>
                <button class="close-btn" @click="closeNofication()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            {{-- <div class="">
                <!-- Filter Buttons -->
                <div class="filter-btn">
                    <button class="active">
                        Tất cả
                    </button>
                    <button class="">
                        Tin chưa đọc
                    </button>
                </div>
    
                <!-- Notification List -->
                <div class="notifi-list">
                    <!-- Notification Item -->
                    @for ($i = 0; $i < 12; $i++)
                        <div class="item">
                            <div class="">
                                <h2 class="mb-1 font-medium">Title</h2>
                                <p class="mb-1 text-sm text-gray-600">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut
                                    labore et...
                                </p>
                                <span class="">0 giờ trước</span>
                            </div>
                            <button class="active">
                                Đọc
                            </button>
                        </div>
                    @endfor
                </div>
            </div> --}}

            <!-- No notification -->
            <div class="no-notifi">
                <img src="{{ asset('/images/notification/TBlight.png') }}" alt="No notification" class="dark:hidden">
                <img src="{{ asset('/images/notification/TBdark.png') }}" alt="No notification" class="hidden dark:block">
                <p class="text-center">Không có thông báo nào được nêu ra</p>
            </div>
        </div>
    </div>
    <div @click="closeNofication()" class="overlay"></div>
</div>
