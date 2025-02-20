<nav class="nav">
    <div class="_container my_container">
        <div class="_logo">
            <a href="/">
                <img class="block dark:hidden" src="{{ asset('/images/logo-light.png') }}" class=""
                    alt="Story-verse-Logo" />
                <img class="hidden dark:block" src="{{ asset('/images/logo-dark.png') }}" class=""
                    alt="Story-verse-Logo" />
            </a>
        </div>

        <div class="_menu">
            <ul class="_list">
                <li x-data="{ dropDown: false }" class="relative">
                    <div @mouseenter="dropDown = true" @mouseleave="dropDown = false" class="-item">
                        <span class="name">Danh sách</span>
                        <svg class="" :class="{ 'rotate-180': dropDown }" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 9-7 7-7-7" />
                        </svg>
                    </div>
                    <div x-show="dropDown" @mouseenter="dropDown = true" @mouseleave="dropDown = false"
                        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300"
                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="-dropdownMenu">
                        <ul class="_box capitalize">
                            <li><a href="/category">truyện mới cập nhật</a></li>
                            <li><a href="">Truyện hot</a></li>
                            <li><a href="">truyện full</a></li>
                            <li><a href="">tiên hiệp hay</a></li>
                            <li><a href="">truyện teen hay</a></li>
                        </ul>
                    </div>
                </li>
                <li class="-item">
                    <a href="#" class="">Thể loại</a>
                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 9-7 7-7-7" />
                    </svg>
                </li>
                <li class="-item">
                    <a href="#" class="">Phân loại theo chương</a>
                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 9-7 7-7-7" />
                    </svg>
                </li>
                <li class="-item">
                    <a href="#" class="">Đọc nhiểu nhất</a>
                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 9-7 7-7-7" />
                    </svg>
                </li>
            </ul>
        </div>

        <div class="_user">
            <div class="wrapper">
                <button id="theme-toggle" type="button" class="-themeToggle">
                    <svg id="theme-toggle-dark-icon" class="hidden h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                    </svg>
                    <svg id="theme-toggle-light-icon" class="hidden h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                            fill-rule="evenodd" clip-rule="evenodd"></path>
                    </svg>
                </button>

                <div class="_search cursor-pointer">
                    <a href="/search" class="">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </a>
                </div>

                {{-- <div class="_avatar cursor-pointer">
                    <img src="{{ asset('/images/home-hero/Home-hero-1.png') }}" alt="" class="w-[28px] h-[28px] rounded-full object-cover">
                </div> --}}
            </div>

            {{-- <div class="_postBtn">
                <a href="#">Đăng tác phẩm</a>
            </div> --}}

            <div class="_notLogin">
                <div data-modal-target="login-modal" data-modal-toggle="login-modal" class="_loginBtn" @click="openModal = 'login'">
                    <a href="#">Đăng Nhập</a>
                </div>

                <div data-modal-target="login-modal" data-modal-toggle="login-modal" class="_regisBtn" @click="openModal = 'register'">
                    <a href="#">Đăng Ký</a>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- Login modal -->
<div id="login-modal" tabindex="-1" aria-hidden="true" class="modal_login hidden">

    <!-- Modal content -->
    <div class="background-container">
        <!-- Close button -->
        <button data-modal-hide="login-modal" class="close_btn">
            <svg class="h-[24px] w-[24px]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Logo -->
        <div class="-logo">
            <img class="block dark:hidden" src="{{ asset('/images/logo-light.png') }}" class=""
                alt="Story-verse-Logo" />
            <img class="hidden dark:block" src="{{ asset('/images/logo-dark.png') }}" class=""
                alt="Story-verse-Logo" />
        </div>

        <div class="swiper loginSwiper">
            <div class="swiper-wrapper">
                <!-- Login form -->
                <div x-show="openModal === 'login'"
                class="-form swiper-slide">
                    <h2 class="head_title">Đăng nhập</h2>
        
                    <div class="logged_yet">
                        <span class="">Bạn chưa có tài khoản?</span>
                        <p @click="openModal = 'register'" class="swiper-next">Đăng ký tại đây!</p>
                    </div>
        
                    <form action="" method="" autocomplete="off" class="space-y-4" id="login_form">
                        <div class="input">
                            <label for="login_email" class="">Email</label>
                            <div class="_box">
                                <svg class="me-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                </svg>
                                <input type="email" id="login_email" placeholder="Địa chỉ email" style="box-shadow: none;"
                                    class="w-full">
                            </div>
                        </div>
        
                        <div class="input">
                            <label for="login_pass" class="">Mật khẩu</label>
                            <div class="_box">
                                <svg class="me-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                                </svg>
        
                                <input type="password" id="login_pass" placeholder="Mật khẩu" style="box-shadow: none;"
                                    class="w-full">
        
                                <button type="button" class="togglePassword">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                </button>
        
                            </div>
                        </div>
        
                        <div class="forgot_pass">
                            <label class="flex items-center">
                                <input type="checkbox" style="box-shadow: none;"
                                    class="">
                                <span class="">Lưu lại đăng nhập</span>
                            </label>
                            <a href="#" class="">Quên mật khẩu?</a>
                        </div>
        
                        <button type="submit"
                            class="submit_btn">
                            Đăng nhập
                        </button>
                    </form>
        
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-200"></div>
                        </div>
                        <div class="relative flex justify-center text-[12px]">
                            <span class="bg-white dark:bg-gray01 px-2 text-gray02 dark:text-white11">
                                Hoặc đăng nhập bằng tài khoản mạng xã hội của bạn
                            </span>
                        </div>
                    </div>
        
                    <div class="social_login">
                        <button class="">
                            <img src="https://www.google.com/favicon.ico" alt="Google" class="mr-2 h-5 w-5">
                            Google
                        </button>
                        <button class="">
                            <img src="https://www.facebook.com/favicon.ico" alt="Facebook" class="mr-2 h-5 w-5">
                            Facebook
                        </button>
                    </div>
                </div>
                <!-- register form -->
                <div x-show="openModal === 'register'"
                class="-form swiper-slide">
                    <h2 class="head_title">Không có tài khoản? Đăng ký</h2>
        
                    <div class="logged_yet">
                        <span class="">Bạn đã có tài khoản?</span>
                        <p @click="openModal = 'login'" class="swiper-prev">Đăng nhập tại đây!</p>
                    </div>
        
                    <form action="" method="" autocomplete="off" class="space-y-4" id="register_form">
                        <div class="flex justify-between gap-[10px]">
                            <div class="input">
                                <label for="register_name" class="">Tên tài khoản</label>
                                <div class="_box">
                                    <svg class="me-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                    </svg>
                                    <input type="text" id="register_name" placeholder="Nhập tên" style="box-shadow: none;"
                                        class="w-full">
                                </div>
                            </div>
        
                            <div class="input">
                                <label for="register_email" class="">Email</label>
                                <div class="_box">
                                    <svg class="me-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                    </svg>
                                    <input type="email" id="register_email" placeholder="Địa chỉ email" style="box-shadow: none;"
                                        class="w-full">
                                </div>
                            </div>
                        </div>
        
                        <div class="input">
                            <label for="register_pass" class="">Mật khẩu</label>
                            <div class="_box">
                                <svg class="me-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                                </svg>
        
                                <input type="password" id="register_pass" placeholder="Mật khẩu" style="box-shadow: none;"
                                    class="w-full">
        
                                <button type="button" class="togglePassword">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                </button>
        
                            </div>
                        </div>
        
                        <div class="input">
                            <label for="register_pass2" class="">Xác nhận mật khẩu</label>
                            <div class="_box">
                                <svg class="me-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                                </svg>
        
                                <input type="password" id="register_pass2" placeholder="Xác nhận mật khẩu" style="box-shadow: none;"
                                    class="w-full">
        
                                <button type="button" class="togglePassword">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                </button>
        
                            </div>
                        </div>
        
                        <div class="forgot_pass">
                            <label class="flex items-center">
                                <input type="checkbox" style="box-shadow: none;"
                                    class="">
                                <span class="pe-1">Tôi đồng ý với </span>
                                <a href="#" class="">Điều khoản & Điều kiện</a>
                            </label>
                        </div>
        
                        <button type="submit"
                            class="submit_btn">
                            Đăng Ký
                        </button>
                    </form>
        
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-200"></div>
                        </div>
                        <div class="relative flex justify-center text-[12px]">
                            <span class="bg-white dark:bg-gray01 px-2 text-gray02 dark:text-white11">
                                Hoặc đăng nhập bằng tài khoản mạng xã hội của bạn
                            </span>
                        </div>
                    </div>
        
                    <div class="social_login">
                        <button class="">
                            <img src="https://www.google.com/favicon.ico" alt="Google" class="mr-2 h-5 w-5">
                            Google
                        </button>
                        <button class="">
                            <img src="https://www.facebook.com/favicon.ico" alt="Facebook" class="mr-2 h-5 w-5">
                            Facebook
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var swiper = new Swiper(".loginSwiper", {
                    spaceBetween: 30,
                    navigation: {
                        nextEl: ".swiper-next",
                        prevEl: ".swiper-prev",
                    },
                });
            });
          </script>
    </div>
</div>

<script>
    document.querySelectorAll('.togglePassword').forEach(button => {
            button.addEventListener('click', function() {
                const input = this.previousElementSibling;
                const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                input.setAttribute('type', type);
                
                // Thay đổi biểu tượng SVG
                if (type === 'password') {
                    this.innerHTML = `
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    `;
                } else {
                    this.innerHTML = `
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                        </svg>
                    `;
                }
            });
        });
</script>