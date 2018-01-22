var path = require('path');
var webpack = require('webpack');

var ExtractTextPlugin = require('extract-text-webpack-plugin');
var CleanWebpackPlugin = require('clean-webpack-plugin');

const publicPath = '/public/build/';
const assetsPath = './resources/assets';
const cssFile = 'css/account.css';
const jsFile = 'js/build.js';

module.exports = {
  entry: [
      assetsPath + '/js/app.js',
      assetsPath + '/sass/account.scss'
  ],
  output: {
    path: path.resolve(__dirname, assetsPath),
    publicPath: publicPath,
    filename: jsFile
  },
  module: {
    rules: [
      {
        test: /\.vue$/,
        loader: 'vue-loader',
        options: {
          loaders: {
            'scss': 'vue-style-loader!css-loader!sass-loader',
            'sass': 'vue-style-loader!css-loader!sass-loader?indentedSyntax'
          }
        }
      },
      {
        test: /\.js$/,
        loader: 'babel-loader',
        exclude: /node_modules/
      },
      {
        test: /\.(sass|scss)$/,
        use: ExtractTextPlugin.extract([
          'css-loader',
          'autoprefixer-loader',
          'group-css-media-queries-loader',
          'sass-loader'
        ])
      },
      {
        test: /\.(png|jpg|gif|svg)$/,
        loader: 'file-loader',
        options: {
          name: '/[name].[ext]'
        }
      }
    ]
  },
  plugins: [
    new ExtractTextPlugin(cssFile),
    // new CleanWebpackPlugin(['dist'])
  ],
  resolve: {
    alias: {
      'vue$': 'vue/dist/vue.esm.js'
    }
  },
  devServer: {
    historyApiFallback: true,
    noInfo: true,
    headers: {
        'Access-Control-Allow-Origin': '*'
    }
  },
  performance: {
    hints: false
  },
  devtool: '#eval-source-map'
}

if (process.env.NODE_ENV === 'production') {
  module.exports.devtool = '#source-map';
  module.exports.plugins = (module.exports.plugins || []).concat([
    new webpack.DefinePlugin({
      'process.env': {
        NODE_ENV: '"production"'
      }
    }),
    new webpack.optimize.UglifyJsPlugin({
      sourceMap: true,
      compress: {
        warnings: false
      }
    }),
    new webpack.LoaderOptionsPlugin({
      minimize: true
    })
  ])
};
