const path = require('path')
const HtmlWebpackPlugin = require('html-webpack-plugin')
const MiniCssExtractPlugin = require('mini-css-extract-plugin')
const {CleanWebpackPlugin} = require('clean-webpack-plugin')
const CopyPlugin = require('copy-webpack-plugin')

module.exports = {
  context: __dirname,
  entry: {
    'appjs': './assets/js/index.js',
    'appcss': './assets/sass/app.scss',
  },

  output: {
    path: path.resolve('../../../public/eco/manage'),
    publicPath: '/'
  },

  plugins: [
    new CleanWebpackPlugin(),

    new MiniCssExtractPlugin({
      // 'filename': 'css/manage.css',
    }),

    new CopyPlugin({
      patterns: [
        {
          from: './assets/images',
          to: 'images'
        },
        {
          from: './assets/fonts',
          to: 'fonts'
        },
        {
          from: path.resolve(__dirname, './node_modules/bootstrap-icons/font/fonts'),
          to: 'fonts'
        }
      ],
    }),
  ],

  module: {
    rules: [
      {
        test: /\.s[ac]ss$/i,
        use: [MiniCssExtractPlugin.loader, {
          loader: 'css-loader',
          options: {
            url: false,
            sourceMap: true
          }
        }, 'sass-loader', ],
      },
      // {
      //   test: /\.css$/i,
      //   use: ['style-loader', 'css-loader'],
      // },
    ]
  }
}
