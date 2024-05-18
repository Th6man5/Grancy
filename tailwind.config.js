/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js,php}"],
  theme: {
    extend: {
      spacing: {
        backdrop: "95%",
      },
      dropShadow: {
        '3xl': '0 5px 3px rgba(0, 0, 1, 0.25)',
        '4xl': [
            '0 35px 35px rgba(0, 0, 0, 0.25)',
            '0 45px 65px rgba(0, 0, 0, 0.15)'
        ]
      }
    },
    colors: {
      nav: "#F2F0E2",
      blues: "#00113D",
      blues2: "#4BBCC7",
      grey: "#EBEBEB",
      black: "#000000",
      white: "#FFFFFF",
      red: "#FF0000",
    },
  },
  daisyui: {
    themes: [],
  },
  plugins: [require("daisyui")],
};
