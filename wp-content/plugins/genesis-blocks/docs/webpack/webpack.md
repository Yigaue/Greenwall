# Webpack #
This repo uses webpack to compile and build scripts and files. In order to test this plugin you will need to follow these steps.

### Webpack Instructions:
1. Clone the repo
2. In that location run `npm install`
3. In order to go into development mode, run `npm run dev`
4. To build the scripts for production, use `npm run build`

### Adding additional scripts to be webpacked:
Each module is responsible for providing its own Webpack configuration at `js/webpack.config.js`. The main Webpack configuration auto-loads each of the modules own configurations and returns a single array. In order for a module's `webpack.config.js` to be properly loaded it MUST return a function of the following interface:

```
module.exports = (defaultConfig, rootPath) : {[key: string]: any}
```

* The returned object does not have to implement the provided `defaultConfig`, however it most likely will. 
* All files paths must include the `rootPath` in order to ensure that the file will be referenced at its proper absolute path.

### Example Module Webpack Config

```
/**
 * << Module Name >> Webpack Configuration
 *
 * @param {Object} defaultConfig Default Webpack Config
 * @param {string} rootPath Path to /lib directory
 *
 * @return {Object} Webpack Configuration
 */
module.exports = (defaultConfig, rootPath) => {
	return {
		...defaultConfig,
		entry:
			rootPath + '<<ModuleName>>/js/src/<<module-name>>.js',
		output: {
			path: rootPath,
			filename: '<<ModuleName>>/js/build/<<module-name>>.js',
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

```

Under `entry` you will replace `source-script-name.js` with the name of your source file. This is the file you will actually edit when adding/creating code.

Under `output->path` change `built-script-name.js` to what you want the built filename to be. 

Lastly, in your PHP where you run `wp_enqueue_script` to load the javascript file, reference the url to the built file, so that it gets loaded. Regardless of whether you've run `npm run dev` or `npm run build`, that built file will exist. The contents of that file will be different based on `dev` or `build`, but the file will work the same way regardless. The `build` version is more compressed and minified, whereas the `dev` version is easier to read for debugging purposes. 
