/** @type {import('tailwindcss').Config} */
export default {
    content: ["./resources/**/*.blade.php", "./resources/**/*.js"],
    theme: {
        extend: {
            colors: {
                primary: "#2274A5",
                secondary: "#E6AF2E",
            },
        },
    },
    plugins: [],
};
