/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js,php}"],
  theme: {
    extend: {},
    colors: {
      nav: "#F2F0E2",
      primary: "#00113D",
      secondary: "#EBEBEB",
      black: "#000000",
      white: "#FFFFFF",
    },
  },
  plugins: [require("daisyui")],
};
