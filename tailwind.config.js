import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'bgNavbar': '#EEF0F5',
                'grayy': '#5C6471',
                'grayyLight': '#7C838F',
                'bluee': '#4C99F9',
                'tagHome': '#FBFEFD',
                'greenTag': '#448C74',
                'sectionTitle': '#1C68BF',
                'Danger09':'#ED5050',
            },
        },
    },
    plugins: [
        require('flowbite/plugin')
    ],
};
