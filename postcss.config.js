// postcss.config.js
const autoprefixer = require('autoprefixer');
const tailwindcss = require('tailwindcss');

const postcssPurgecss = require(`@fullhuman/postcss-purgecss`);

module.exports = {
    plugins: [
        require("postcss-import"),
        require('tailwindcss'),
        require('autoprefixer'),
        require('postcss-nested')
    ],
};