module.exports = {
    purge: [],
    darkMode: false, // or 'media' or 'class'
    theme: {
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
