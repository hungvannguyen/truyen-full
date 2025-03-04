@section('head')
  
@endsection

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
                    <div @mouseenter="dropDown = true" @mouseleave="dropDown = false"
                        :class="{ 'active': dropDown === true }" class="-item">
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
                    <a href="#" class="">Lịch sử đọc</a>
                </li>
            </ul>
        </div>

        <div class="_user">
            <div class="wrapper">
                <div class="_search cursor-pointer">
                    <a href="/search" class="">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </a>
                </div>

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

                <div @click="openNofication()" class="_nofication">
                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none" stroke="currentColor"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M11.9996 2.89966C8.0232 2.89966 4.79964 6.12321 4.79964 10.0997V14.4026L3.95112 15.2511C3.60792 15.5943 3.50525 16.1105 3.69099 16.5589C3.87673 17.0073 4.31429 17.2997 4.79964 17.2997H19.1996C19.685 17.2997 20.1226 17.0073 20.3083 16.5589C20.494 16.1105 20.3914 15.5943 20.0482 15.2511L19.1996 14.4026V10.0997C19.1996 6.12321 15.9761 2.89966 11.9996 2.89966Z"
                            fill="currentColor" />
                        <path
                            d="M11.9996 22.0997C10.0114 22.0997 8.39961 20.4879 8.39961 18.4997H15.5996C15.5996 20.4879 13.9878 22.0997 11.9996 22.0997Z"
                            fill="currentColor" />
                    </svg>

                    <span class="-badge">3</span>
                </div>

                {{-- <div @click="openDrawer()" class="_avatar cursor-pointer">
                    <img src="{{ asset('/images/home-hero/Home-hero-1.png') }}" alt=""
                        class="h-[28px] w-[28px] rounded-full object-cover">
                </div> --}}

            </div>

            {{-- <div class="_postBtn">
                <a href="#">Đăng tác phẩm</a>
            </div> --}}

            <div class="_notLogin">
                <div data-modal-target="login-modal" data-modal-toggle="login-modal" class="_loginBtn" @click="switchLogin('login', $event)">
                    <a href="#">Đăng Nhập</a>
                </div>

                <div data-modal-target="login-modal" data-modal-toggle="login-modal" class="_regisBtn" @click="switchLogin('register', $event)">
                    <a href="#">Đăng Ký</a>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- Notification modal -->
@include('components/notification-modal')

<!-- Login modal -->
@include('components/login-modal')

<!-- drawer component -->
@include('components/home-drawer')

<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("alpineFunction", () => ({
            activeTab: "login",
            isDrawerOpen: false,
            isNoficationOpen: false,
            switchLogin(newTab, event) {
                if (newTab === this.activeTab) return;

                let currentTab = this.$refs[this.activeTab];
                let nextTab = this.$refs[newTab];

                gsap.to(currentTab, {
                    opacity: 0,
                    x: 10,
                    duration: 0.3,
                    onComplete: () => {
                        currentTab.classList.add("hidden");
                        nextTab.classList.remove("hidden");

                        gsap.fromTo(nextTab, {
                            opacity: 0,
                            x: 10
                        }, {
                            opacity: 1,
                            x: 0,
                            duration: 0.4
                        });
                    }
                });
                this.activeTab = newTab;
            },

            openDrawer() {
                this.isDrawerOpen = true;
                gsap.fromTo(this.$refs.drawer, {
                    x: "100%"
                }, {
                    x: "0%",
                    duration: 0.4,
                    ease: "power3.out"
                });
            },

            closeDrawer() {
                gsap.to(this.$refs.drawer, {
                    x: "100%",
                    duration: 0.3,
                    ease: "power3.in",
                    onComplete: () => {
                        this.isDrawerOpen = false;
                    }
                });
            },

            openNofication() {
                this.isNoficationOpen = true;
                gsap.fromTo(this.$refs.nofication, {
                    opacity: 0,
                    scale: 0
                }, {
                    opacity: 1,
                    scale: 1,
                    duration: 0.4,
                    ease: "power3.out"
                });
            },

            closeNofication() {
                gsap.to(this.$refs.nofication, {
                    opacity: 0,
                    scale: 0,
                    duration: 0.3,
                    ease: "power3.in",
                    onComplete: () => {
                        this.isNoficationOpen = false;
                    }
                });
            }
        }));
    });
    // Toggle password visibility

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
