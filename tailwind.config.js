/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',
  content: [
    './dist/*.{html,js,php}',
    './dist/admin/*.{html,js,php}',
    './dist/about/*.{html,js,php}',
  ],
  theme: {
    extend: {spacing: {
      '128': '41rem',
    }},
  },
  plugins: [],
}