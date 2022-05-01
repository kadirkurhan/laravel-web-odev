module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./public/js/home.js",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            theme: {
                fontFamily: {
                    sans: ["Inter"],
                    serif: ["Inter"],
                },
            },
        },
    },
    plugins: [],
};
