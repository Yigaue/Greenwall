const ExtractText = require( 'extract-text-webpack-plugin' );
const path = require('path');

const devMode = process.env.NODE_ENV !== 'production';

const editorStyles = new ExtractText( {
    filename: 'blocks.editor.build.css',
} );

const frontendStyles = new ExtractText( {
    filename: 'blocks.style.build.css',
} );

const plugins = [ editorStyles, frontendStyles ];

const scssConfig = {
    use: [
        {
            loader: 'css-loader',
        },
        {
            loader: 'sass-loader',
            options: {
                prependData: '@import "./src/common.scss";\n',
            },
        },
    ],
};

module.exports = (defaultConfig, rootPath) => {
    return {
        ...defaultConfig,
        context: __dirname,
        devtool: devMode ? 'inline-sourcemap' : false,
        mode: devMode ? 'development' : 'production',
        entry: {
            blocks: rootPath + '/src/blocks.js',
        },
        output: {
            path: rootPath + '/dist/',
            filename: '[name].build.js',
        },
        externals: {
            'lodash': 'lodash' // Prevents an editor crash. See https://github.com/WordPress/gutenberg/issues/4043#issuecomment-633081315. 
        },
        module: {
            rules: [
                {
                    test: /\.js$/,
                    exclude: [
                        path.resolve( rootPath + '/node_modules' ),
                        path.resolve( rootPath + '/build' ),
                        path.resolve( rootPath + '/vendor' ),
                    ],
                    use: [
                        {
                            loader: 'babel-loader',
                            options: {
                                presets: [ '@babel/preset-react' ],
                            },
                        },
                    ],
                },
                {
                    test: /editor\.scss$/,
                    exclude: [
                        path.resolve( rootPath + '/node_modules' ),
                        path.resolve( rootPath + '/build' ),
                        path.resolve( rootPath + '/vendor' ),
                    ],
                    use: editorStyles.extract( scssConfig ),
                },
                {
                    test: /style\.scss$/,
                    exclude: [
                        path.resolve( rootPath + '/node_modules' ),
                        path.resolve( rootPath + '/build' ),
                        path.resolve( rootPath + '/vendor' ),
                    ],
                    use: frontendStyles.extract( scssConfig ),
                },
            ],
        },
        plugins
    };
};
