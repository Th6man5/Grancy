/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js,php}"],
  theme: {
    extend: {},
    colors: {
      nav: "#F2F0E2",
      blues: "#00113D",
      secondary: "#EBEBEB",
      black: "#000000",
      white: "#FFFFFF",
    },
  },
  daisyui: {
    themes: [],
  },
  plugins: [require("daisyui")],
};
