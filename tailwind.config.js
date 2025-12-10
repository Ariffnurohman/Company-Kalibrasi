import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';
import aspectRatio from '@tailwindcss/aspect-ratio';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            colors: {
                admin: {
                    sidebar: "#0F172A",
                    sidebarHover: "#1E293B",
                    light: "#F8FAFC",
                    dark: "#1E293B",
                    primary: "#3B82F6",
                    success: "#10B981",
                    danger: "#EF4444",
                    warning: "#F59E0B",
                }
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            boxShadow: {
                soft: "0 4px 20px rgba(0,0,0,0.05)",
            }
        },
    },

    plugins: [
        forms,
        typography,
        aspectRatio,
        require("daisyui"),   // <--- Tambahkan ini
    ],
};
