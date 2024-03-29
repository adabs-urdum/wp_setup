const path = require("path");

module.exports = {
  mode: "production",
  entry: "./assets/js/main.js",
  output: {
    path: path.resolve(__dirname, "dist/js"),
    filename: "functions.min.js",
  },
  module: {
    rules: [
      {
        test: /\.m?js$/,
        exclude: /(node_modules|bower_components)/,
        use: {
          loader: "babel-loader",
          options: {
            presets: ["@babel/preset-env"],
          },
        },
      },
    ],
  },
};
