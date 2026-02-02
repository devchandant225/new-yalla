/** @type {import('tailwindcss').Config} */
export default {
    content: ["./resources/views/**/*.blade.php", "./resources/js/**/*.js"],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Outfit', 'sans-serif'],
                serif: ['Playfair Display', 'serif'],
            },
            colors: {
                primary: "#000000", // Pure Black
                secondary: "#333333", // Dark Gray
                accent: "#f3f4f6", // Light Gray
            },
            animation: {
                "slide-in": "slideIn 0.3s ease-out",
                "fade-in": "fadeIn 0.3s ease-out",
                "bounce-in":
                    "bounceIn 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55)",
            },
            keyframes: {
                slideIn: {
                    "0%": { transform: "translateX(-100%)" },
                    "100%": { transform: "translateX(0)" },
                },
                fadeIn: {
                    "0%": { opacity: "0" },
                    "100%": { opacity: "1" },
                },
                bounceIn: {
                    "0%": { transform: "scale(0.3)", opacity: "0" },
                    "50%": { transform: "scale(1.05)" },
                    "70%": { transform: "scale(0.9)" },
                    "100%": { transform: "scale(1)", opacity: "1" },
                },
            },
        },
    },
    plugins: [],
};
