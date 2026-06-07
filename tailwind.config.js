/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans:    ['DM Sans', 'sans-serif'],
                display: ['Sora', 'sans-serif'],
            },
            colors: {
                brand: {
                    navy:        '#003E7A',
                    blue:        '#005BA9',
                    mid:         '#0078C1',
                    pink:        '#FD4BC7',
                    'pink-dark': '#C4219B',
                },
            },
            borderRadius: {
                '4xl': '2rem',
            },
        },
    },
    plugins: [],
}