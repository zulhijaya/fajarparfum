const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

module.exports = {
    // mode: 'jit',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                urbanist: ['Urbanist', ...defaultTheme.fontFamily.sans],
                updock: ['Updock', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'sidebar': '#1D1E42',
                'sidebar-hover': '#26264F',
                transparent: 'transparent',
                black: colors.black,
                white: colors.white,
                gray: colors.gray,
                red: colors.red,
            },
        },
    },
    // plugins: [require('@tailwindcss/forms')],
    plugins: [
        require("@tailwindcss/forms")({
            strategy: 'class',
        }),
    ],
};