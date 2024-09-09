import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: '#003fff',
                secondary: '#00d1ff',
                accent: '#f08700',
                neutral: '#1f2937',
                'base-100': '#ffffff',
                info: '#00a6ff',
                success: '#a6e21d',
                warning: '#ffcc00',
                error: '#d8002e',
              },
        },
    },

    plugins: [forms],
};
