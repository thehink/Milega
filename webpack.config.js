const path = require('path');
const webpack = require('webpack');
const args = require('minimist')(process.argv.slice(2));

const allowedEnvs = ['dev', 'dist', 'test'];
let env;
if (args._.length > 0 && args._.indexOf('start') !== -1) {
  env = 'test';
} else if (args.env) {
  env = args.env;
} else {
  env = 'dev';
}
process.env.REACT_WEBPACK_ENV = env;

let port = 3000;



module.exports = {
  entry: [
    ...(env === 'dev' ? [
      'webpack-dev-server/client?http://127.0.0.1:' + port,
      'webpack/hot/only-dev-server'
    ]: []),
    './src/index'
  ],
  port: port,
  devServer: {
    contentBase: './src/',
    historyApiFallback: true,
    hot: true,
    port:port,
    publicPath: '/assets/',
    noInfo: false
  },
  output: {
    path: path.join(__dirname, './dist/assets'),
    filename: 'app.js',
    publicPath: '/assets/'
  },
  cache: env !== 'dist',
  devtool: env === 'dev' ? 'eval-source-map' : '',
  plugins: [
    ...(env === 'dist' ? [
      new webpack.optimize.DedupePlugin(),
      new webpack.DefinePlugin({
        'process.env.NODE_ENV': '"production"'
      }),
      new webpack.optimize.UglifyJsPlugin(),
      new webpack.optimize.OccurenceOrderPlugin(),
      new webpack.optimize.AggressiveMergingPlugin()
    ] : env === 'dev' ? [
      new webpack.HotModuleReplacementPlugin()
    ] : []),
    new webpack.NoErrorsPlugin()
  ],
  module: {
    preLoaders: [
      {
        test: /\.(js|jsx)$/,
        include: './src/',
        loader: 'eslint-loader'
      }
    ],
    loaders: [
      {
        test: /\.html$/,
        loader: "file?name=[name].[ext]",
      },
      {
        test: /.js?$/,
        loader: 'babel-loader',
        exclude: /node_modules/,
        query: {
          presets: ['es2015', 'react']
        }
      },
      { test: /\.css$/, loader: "style-loader!css-loader" },
      { test: /\.png$/, loader: "url-loader?limit=100000" },
      { test: /\.jpg$/, loader: "file-loader" }
    ]
  },
};
