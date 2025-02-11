<style>
    .slide {
        transition: all 0.5s ease-out;
    }

    .slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: inherit;
    }
</style>

<div class="carousel">
    <div id="carousel" class="_container">
        <div id="slide-container" class="_slide-container">
            <div class="slide" data-index="0">
                <img src="{{ asset('/images/home-hero/Home-hero-1.png') }}" alt="Slide 1">
            </div>
            <div class="slide" data-index="1">
                <img src="{{ asset('/images/home-hero/Home-hero-2.png') }}" alt="Slide 2">
            </div>
            <div class="slide" data-index="2">
                <img src="{{ asset('/images/home-hero/Home-hero-3.png') }}" alt="Slide 3">
            </div>
            <div class="slide" data-index="0">
                <img src="{{ asset('/images/home-hero/Manga-category.png') }}" alt="Slide 4">
            </div>
            <div class="slide" data-index="1">
                <img src="{{ asset('/images/home-hero/Manhua-category.png') }}" alt="Slide 5">
            </div>
            <div class="slide" data-index="2">
                <img src="{{ asset('/images/home-hero/Manhwa-category.png') }}" alt="Slide 6">
            </div>
        </div>

        <button id="prev-button" class="prev-btn">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                stroke="currentColor" class="h-7 w-7">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
        </button>
        <button id="next-button" class="next-btn">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                stroke="currentColor" class="h-7 w-7">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
        </button>
    </div>

    <script>
        let currentSlide = 1;
        const slideContainer = document.getElementById('slide-container');
        const slides = slideContainer.children;
        const prevButton = document.getElementById('prev-button');
        const nextButton = document.getElementById('next-button');
        let autoSlideInterval = 5000;
        let autoSlide = setInterval(nextSlide, autoSlideInterval);

        function updateSlidePosition(slideElement, position) {
            if (position === 0) {
                slideElement.style.width = '670px';
                slideElement.style.height = '403px';
                slideElement.style.left = '50%';
                slideElement.style.transform = 'translate(-50%, 0)';
                slideElement.style.zIndex = '20';
                slideElement.style.boxShadow = '0 0 20px rgba(2,2,2, 100%)';
                slideElement.style.opacity = '1';
            } else if (position === -1 || position === slides.length - 1) {
                slideElement.style.width = '440px';
                slideElement.style.height = '317px';
                slideElement.style.left = 'calc(50% - 335px)';
                slideElement.style.transform = 'translate(-69%, 43px)';
                slideElement.style.zIndex = '10';
                slideElement.style.boxShadow = 'none';
                slideElement.style.opacity = '1';
            } else if (position === 1 || position === -(slides.length - 1)) {
                slideElement.style.width = '440px';
                slideElement.style.height = '317px';
                slideElement.style.left = 'calc(50% + 335px)';
                slideElement.style.transform = 'translate(-31%, 43px)';
                slideElement.style.zIndex = '10';
                slideElement.style.boxShadow = 'none';
                slideElement.style.opacity = '1';
            } else if (position === 2 || position === -(slides.length - 2)) {
                slideElement.style.width = '440px';
                slideElement.style.height = '317px';
                slideElement.style.left = 'calc(50% + 335px)';
                slideElement.style.transform = 'translate(-31%, 43px)';
                slideElement.style.zIndex = '10';
                slideElement.style.boxShadow = 'none';
                slideElement.style.opacity = '0';
            } else if (position === -2 || position === (slides.length - 2)) {
                slideElement.style.width = '440px';
                slideElement.style.height = '317px';
                slideElement.style.left = 'calc(50% - 335px)';
                slideElement.style.transform = 'translate(-69%, 43px)';
                slideElement.style.zIndex = '10';
                slideElement.style.boxShadow = 'none';
                slideElement.style.opacity = '0';
            } else {
                slideElement.style.opacity = '0';
                slideElement.style.zIndex = '5';
            }
        }

        function updateSlides() {
            for (let i = 0; i < slides.length; i++) {
                const slideElement = slides[i];
                const position = (i - currentSlide + slides.length) % slides.length;
                updateSlidePosition(slideElement, position - 1);
            }
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            updateSlides();
        }

        function prevSlide() {
            currentSlide = (currentSlide - 1 + slides.length) % slides.length;
            updateSlides();
        }

        function resetAutoSlide() {
            clearInterval(autoSlide);
            autoSlide = setInterval(nextSlide, autoSlideInterval);
        }

        nextButton.addEventListener('click', () => {
            nextSlide();
            resetAutoSlide();
        });

        prevButton.addEventListener('click', () => {
            prevSlide();
            resetAutoSlide();
        });

        // Khởi tạo carousel
        updateSlides();
    </script>
</div>
