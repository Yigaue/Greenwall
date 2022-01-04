/**
 * Migration Webpack Configuration
 *
 * @param {Object} defaultConfig Default Webpack Config
 * @param {string} rootPath Path to /lib directory
 *
 * @return {Object} Webpack Configuration
 */
module.exports = (defaultConfig, rootPath) => {
	return {
		...defaultConfig,
		entry: rootPath + 'Migration/js/src/index.js',
		output: {
			path: rootPath,
			filename: 'Migration/js/build/migration.js',
		},
		module: {
			rules: [
				{
					test: /\.(js|jsx)$/,
					exclude: /node_modules/,
					use: ['babel-loader'],
				},
			],
		},
	};
};
