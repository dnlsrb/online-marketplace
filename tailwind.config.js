/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
     "./node_modules/flowbite/**/*.js",
    // "./resources/**/*.vue",
  ],
  theme: {
    mytheme: {
      "primary": "#171524",
      "secondary": "#ffa551",
      "accent": "#37ca00",   
      "neutral": "#0d0600",   
      "base-100": "#e8e8e8",  
      "info": "#00fdff",
      "success": "#00a400", 
      "warning": "#f7b31e",
      "error": "#f52e40",
                },
    extend: {},
  },
  plugins: [
 
    require('flowbite/plugin'),
  ],
}