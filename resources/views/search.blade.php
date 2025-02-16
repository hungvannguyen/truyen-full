@extends('layouts.default')

@section('content')
    <div class="search-wrapper">
        <div class="py-[40px] mb-[40px] border-b dark:border-white09 border-gray09">
            <div class="container">
                <div class="search-form">
                    {{-- <form action="{{ route('search') }}" method="GET"> --}}
                    <input type="text" name="query" placeholder="Search for a product"
                        value="{{ request()->input('query') }}">
                    <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                          </svg>    
                    </button>
                    {{-- </form> --}}
                </div>
            </div>
        </div>

        <div class="search-results">
            <div x-data="{ line: false }" class="sectionTitle1 sectionTitle">
                <a href="#" @mouseover="line = true" @mouseleave="line = false" class="_box">
                    <h2>Kết quả</h2>
                    <div class="line">
                        <div x-show="line" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                            x-transition:leave="transition ease-in duration-300" x-transition:leave-start="translate-x-0"
                            x-transition:leave-end="translate-x-full" class="line-active"></div>
                    </div>
                </a>
            </div>

            <div class="_container">
                @for ($i = 0; $i < 10; $i++)
                    @include('components.card')
                @endfor
            </div>
        </div>
    </div>
@endsection
