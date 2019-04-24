/**
 * Edit themeName to your needs
 * E.G. if your website is http://localhost/my-site, edit themeName to be equal to 'my-site'
 */
var themeName = 'wp-boilerplate'; 

var gulp = require( 'gulp' );
var rename = require( 'gulp-rename' );
var notify = require( 'gulp-notify' );
var sass = require( 'gulp-sass' );
var uglify = require( 'gulp-uglify' );
var autoprefixer = require( 'gulp-autoprefixer' );
var sourcemaps = require( 'gulp-sourcemaps' );
var browserify = require( 'browserify' );
var babelify = require( 'babelify' );
var source = require( 'vinyl-source-stream' );
var buffer = require( 'vinyl-buffer' );
var browserSync = require( 'browser-sync' ).create();


var styleSRC = './src/scss/style.scss';
var styleDIST = './dist/css/';
var styleWatch = './src/scss/**/*.scss';


var manifest = 'manifest.js';
var jsFolder = './src/js/';
var jsDIST = './dist/js/';
var jsWatch = './src/js/**/*.js';
var jsFILES = [manifest];

// Browser sync options
var browserSyncOption = {
    files: [
        './src/scss/**/*.scss',
        './src/js/**/*.js',
        './**/*.php',
        './template-parts/**/*.php'
    ],
    config: {
        watchTask: true,
        proxy: "http://localhost/" + themeName + '/'
    }
};

// CSS/Scss plugins options
var config = {
    nodeDir: './node_modules',

    // Insert all the css/scss plugins here
    get sassPlugin(){
        return [
            // Bootstrap
            this.nodeDir + '/bootstrap/scss',
        ]
    }
};


/**
 * Styles task
 */
gulp.task('styles', function(done) { // Define callback for explicit finish - https://stackoverflow.com/questions/29694425/what-does-gulp-done-method-do
    gulp.src( styleSRC )
        .pipe( sourcemaps.init() )
        .pipe( sass({
            errorLogToConsole: true,
            outputStyle: 'compressed',
            includePaths: config.sassPlugin,
        }) )
        .on( 'error', console.error.bind( console ) )
        .pipe( autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }) )
        .pipe( rename( {basename: 'build', suffix: '.min'} ) )
        .pipe( sourcemaps.write( './' ) )
        .pipe( gulp.dest( styleDIST ) )
        .pipe(notify({ title: 'Styles', message: 'Task complete.', onLast: true }));
        done(); // Callback here
});



/**
 * Scripts task
 */
gulp.task('scripts', function(done) { // Define callback for explicit finish - https://stackoverflow.com/questions/29694425/what-does-gulp-done-method-do
    jsFILES.map(function( entry ) {
        return browserify({
            entries: [jsFolder + entry]
        })
        .transform( babelify, { presets: ['@babel/env'] } )
        .bundle()
        .pipe( source( entry ) )
        .pipe( rename({ basename: 'build', extname: '.min.js' }) )
        .pipe( buffer() )
        .pipe( sourcemaps.init({ loadMaps: true }) )
        .pipe( uglify() )
        .pipe( sourcemaps.write( './' ) )
        .pipe( gulp.dest( jsDIST ) )
        .pipe(notify({ title: 'Scripts', message: 'Task complete.', onLast: true }));
    });
    done(); // Callback here
});


/**
 * Browser sync task
 */
gulp.task('browser-sync', function(done) {
    browserSync.init(browserSyncOption.files, browserSyncOption.config);
	gulp.watch(browserSyncOption.files).on('change', function(){
		browserSync.reload();
    });
    done();
});

/**
 * "Default" task
 */
gulp.task('default', gulp.series(['styles', 'scripts', 'browser-sync']));


/**
 * Watch task
 */
gulp.task('watch', gulp.parallel('default', function(done) { // Define callback for explicit finish - https://stackoverflow.com/questions/29694425/what-does-gulp-done-method-do
    gulp.watch( styleWatch, gulp.series('styles') );
    gulp.watch( jsWatch, gulp.series('scripts') );
    done(); // Callback here
}));