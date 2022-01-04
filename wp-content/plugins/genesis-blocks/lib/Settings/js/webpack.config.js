/**
 * Settings Webpack Configuration
 *
 * @param {Object} defaultConfig Default Webpack Config
 * @param {string} rootPath Path to /lib directory
 *
 * @return {Object} Webpack Configuration
 */
module.exports = (defaultConfig, rootPath) => {
	return {
		...defaultConfig,
		entry: rootPath + 'Settings/js/src/app.js',
		output: {
			path: rootPath,
			filename: 'Settings/js/build/app.js',
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
