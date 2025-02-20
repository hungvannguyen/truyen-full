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
                'bgNavbar': '#2F2F2F',
                // white
                'white12': '#FCFDFD',
                'white11': '#F7F9FD',
                'white10': '#EEF0F5',
                'white09': '#E6E9EE',
                'white08': '#ĐDE1EA',

                // gray
                'grayy': '#5C6471',
                'grayyLight': '#7C838F',
                'gray01': '#404040',
                'gray02': '#6D7177',
                'gray08': '#B3BCCB',
                'gray09': '#888D98',
                'gray10': '#7C838F',
                
                // blue
                'bluee': '#4C99F9',
                'blue11': '#1C68BF',
                'blue07': '#9ABCE8',

                // yellow
                'yellow09': '#FFCD07',


                'tagHome': '#FBFEFD',
                'greenTag': '#448C74',
                'sectionTitle': '#1C68BF',
                'Danger09':'#ED5050',
                'Accents11': '#1C68BF',
                'Neutral12': '#404040',
                'Neutral10': '#7C838F',
                'green09': '#92BB35',
                'green11': '#5B7900',
            },
        },
    },
    plugins: [
        require('flowbite/plugin')
    ],
    darkMode: 'selector',
};
