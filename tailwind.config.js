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
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
            colors:{
                primary:{
                    DEFAULT:"#1B84FF",
                    "filter":"#E9F3FF",
                },
                success:{
                    DEFAULT:"#2DBF3C",
                    "filter":"#DFFFEA",
                },
                danger:{
                    DEFAULT:"#D81A48",
                    "filter":"#F8285A",
                },
                warning:{
                    DEFAULT:"#EFA006",
                    "filter":"#FFF8DD",
                },
                cadet:{
                    DEFAULT:"#3F4254",
                    "grey":"#99A1B9",
                },
                white:{
                    DEFAULT:"#FFFFFF",
                    "hover":"rgba(255, 255, 255, 0.3)",
                },
            }
        },
    },
    plugins: [],
};
