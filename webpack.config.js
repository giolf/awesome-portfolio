var path = require("path");
var webpack = require("webpack");
var environments = require('gulp-environments');
var production = environments.production;

module.exports = {
    entry: {
        project: "./src/js/entries/project",
        projects: "./src/js/entries/projects"
    },
    output: {
        path: path.join(__dirname, "dist/js"),
        filename: "[name].bundle.js"
    },
    module: {
        loaders: [
            { test: /\.js$/, exclude: /node_modules/, loader: "babel-loader" },
            { test: /\.vue$/, loader: 'vue' },
        ]
    },
    vue: {
        loaders: { js: 'babel' }
    },
    resolve: {
        alias: { 'vue$': production()
            ? 'vue/dist/vue.min.js'
            : 'vue/dist/vue.js'
        }
    },
    plugins: production()
        ? [
            new webpack.optimize.UglifyJsPlugin({
                compress: { warnings: false }
            })
        ]
        : [
            // new webpack.ProvidePlugin({
            //     $: "jquery",
            //     jQuery: "jquery",
            //     jquery: "jquery",
            //     "window.jQuery": "jquery"
            // })
        ]
};
