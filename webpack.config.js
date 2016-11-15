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
            { test: /\.js$/, exclude: /node_modules/, loader: "babel-loader" }
        ]
    },
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
