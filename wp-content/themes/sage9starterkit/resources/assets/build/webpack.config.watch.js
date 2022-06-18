const url = require('url');
const webpack = require('webpack');
const BrowserSyncPlugin = require('browsersync-webpack-plugin');
const WriteFilePlugin = require('write-file-webpack-plugin');

const config = require('./config');

const target = process.env.DEVURL || config.devUrl;

/**
 * We do this to enable injection over SSL.
 */
if (url.parse(target).protocol === 'https:') {
  process.env.NODE_TLS_REJECT_UNAUTHORIZED = 0;

  config.proxyUrl = config.proxyUrl.replace('http:', 'https:');
}

module.exports = {
  devServer: {
    outputPath: config.paths.dist
  },
  output: {
    path: config.paths.dist,
    pathinfo: true,
    publicPath: config.proxyUrl + config.publicPath,
  },
  devtool: '#cheap-module-source-map',
  stats: false,
  plugins: [
    new webpack.optimize.OccurrenceOrderPlugin(),
    new webpack.HotModuleReplacementPlugin(),
    new webpack.NoEmitOnErrorsPlugin(),
    new BrowserSyncPlugin({
      target,
      open: config.open,
      proxyUrl: config.proxyUrl,
      watch: config.watch,
      delay: 500,
      advanced: {
        browserSync: {
          cors: true,
        },
      },
    }),
    new WriteFilePlugin({
      // exclude hot-update files
      test: /^(?!.*(hot)).*/,
      force:true,
    }),
  ],
};
