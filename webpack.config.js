var path = require("path");
var webpack = require("webpack");

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
        alias: { 'vue$': 'vue/dist/vue.js' }
    }
    // plugins: [
    //     // new webpack.ProvidePlugin({
    //     //     $: "jquery",
    //     //     jQuery: "jquery",
    //     //     jquery: "jquery",
    //     //     "window.jQuery": "jquery"
    //     // })
    //     // ,
    //     // new webpack.optimize.UglifyJsPlugin({
    //     //     compress: { warnings: false }
    //     // })
    // ]
};
