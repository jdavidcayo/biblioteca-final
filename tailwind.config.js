import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                gotham: ['gotham', ],
                gothamMedium: ['gotham-medium', ],
                gothamBold: ['gotham-bold', ],
            },
            colors: {
                transparent: 'transparent',
                current: 'currentColor',
                'blanco': '#f5f5f5',
                'morado': '#5d1250',
                'crema': '#f3d2d7',
                'fucsia': '#b3345b',
                'gris': '#626262',
                'rosado': '#ce7386',
                'verde': '#3f747e',
              },
        },
    },

    plugins: [forms, typography],
};
