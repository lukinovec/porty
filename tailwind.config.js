const colors = require('tailwindcss/colors')

module.exports = {
    purge: [],
    darkMode: false, // or 'media' or 'class'
    theme: {
        colors: {
            colors,
            figma: {
                light: '#5458BA',
                medium: '#4044A6',
                dark: '#1E2281'
            },

        },
        extend: {
            transitionDuration: {
                '0': '0ms',
                '2000': '2000ms',
                '2500': '2500ms',
                '3000': '3000ms',
            },
            maxHeight: {
                '1/2': '50%',
                '3/4': '75%',
            }
        }
    },
    variants: {
        extend: {},
    },
    plugins: [],
}
