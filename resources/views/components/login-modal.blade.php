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

        <!-- Login form -->
        <div x-ref="login"class="-form">
            <h2 class="head_title">Đăng nhập</h2>

            <div class="logged_yet">
                <span class="">Bạn chưa có tài khoản?</span>
                <p @click="switchLogin('register', $event)" class="">Đăng ký tại đây!</p>
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
        <div x-ref="register"class="-form hidden">
            <h2 class="head_title">Không có tài khoản? Đăng ký</h2>

            <div class="logged_yet">
                <span class="">Bạn đã có tài khoản?</span>
                <p @click="switchLogin('login', $event)" class="">Đăng nhập tại đây!</p>
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