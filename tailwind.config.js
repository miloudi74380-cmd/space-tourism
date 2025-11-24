/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        'barlow': ['"Barlow Condensed"', 'sans-serif'],
        'bellefair': ['Bellefair', 'serif'],
      },
      colors: {
        'space-dark': '#0B0D17',
        'space-light': '#D0D6F9',
      },
    },
  },
  plugins: [],
}
