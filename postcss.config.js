module.exports = ({ env }) => ({
    plugins: [require('tailwindcss')(), require('autoprefixer')()]
});


// ORIGINAL:
// export default {
//     plugins: {
//         tailwindcss: {},
//         autoprefixer: {},
//     },
// };
