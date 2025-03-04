<div x-ref="drawer" x-show="isDrawerOpen" class="drawerHome">
    <div class="_closeDrawer">
        <button @click="closeDrawer()" class="">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
            </svg>              
        </button>
    </div>
    <div class="_user">
        <div class="-avatar">
            <img src="{{ asset('/images/home-hero/Home-hero-1.png') }}" alt="">
        </div>

        <div class="-NameId">
            <p>Nguyên Văn A</p>
            <span>ID: 00000000000000000</span>
        </div>
    </div>
    <div class="_menu">
        <div class="-item">
            <a href="#" class="text-body2">Tài khoản của tôi</a>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
            </svg>
              
        </div>
        <div class="-item">
            <a href="#" class="text-body2">Danh sách yêu thích</a>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
              </svg>
              
        </div>
        <div class="-item">
            <a href="#" class="text-body2">Hoạt động gần đây</a>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
              </svg>
              
        </div>
    </div>

    <div class="w-full rounded-md text-center text-button2 py-[10px] mt-[30px] bg-bluee hover:bg-blue11 dark:bg-green09 dark:hover:bg-green11 text-white11">Đăng xuất</div>
</div>
<div x-show="isDrawerOpen" @click="closeDrawer()" class="fixed inset-0 z-[51] bg-black bg-opacity-50"></div>