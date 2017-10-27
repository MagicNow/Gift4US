
var autoPrefixBrowserList = ['last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'];

var gulp			= require('gulp'),
    gutil           = require('gulp-util');
	less			= require('gulp-less'),
	plumber     	= require('gulp-plumber'),
	sass        	= require('gulp-sass'),
    uglify          = require('gulp-uglify');
	autoprefixer 	= require('gulp-autoprefixer'),
	imagemin        = require('gulp-imagemin');
    minifyCSS       = require('gulp-minify-css');
	concat      	= require('gulp-concat'),
	gulpSequence    = require('gulp-sequence').use(gulp),
    browserSync     = require('browser-sync');
    shell           = require('gulp-shell');
	sourceMaps  	= require('gulp-sourcemaps');

gulp.task('copy', function() {
    gulp.src(['resources/assets/site/json/*'])
        .pipe(gulp.dest('public/assets/site/json'));
});

//compressing images & handle SVG files
gulp.task('images-deploy', function() {
    gulp.src(['resources/assets/site/images/**/*', '!resources/assets/site/images/README'])
        //prevent pipe breaking caused by errors from gulp plugins
        .pipe(plumber())
        .pipe(gulp.dest('public/assets/site/images'));
});

//compiling our Javascripts
gulp.task('scripts', function() {
    //this is where our dev JS scripts are
    return gulp.src(['resources/assets/site/js/src/_includes/jquery.min.js', 'resources/assets/site/js/src/_includes/**/*.js', 'resources/assets/site/js/src/**/*.js'])
            //prevent pipe breaking caused by errors from gulp plugins
            .pipe(plumber())
            //this is the filename of the compressed version of our JS
            .pipe(concat('app.js'))
            //catch errors
            .on('error', gutil.log)
            //where we will store our finalized, compressed script
            .pipe(gulp.dest('public/assets/site/js'));
            //notify browserSync to refresh
});

//compiling our Javascripts for deployment
gulp.task('scripts-deploy', function() {
    //this is where our dev JS scripts are
    return gulp.src(['resources/assets/site/js/src/_includes/jquery.min.js', 'resources/assets/site/js/src/_includes/**/*.js', 'resources/assets/site/js/src/**/*.js'])
            //prevent pipe breaking caused by errors from gulp plugins
            .pipe(plumber())
            //this is the filename of the compressed version of our JS
            .pipe(concat('app.js'))
            //compress :D
            .pipe(uglify())
            //where we will store our finalized, compressed script
            .pipe(gulp.dest('public/assets/site/js'));
});

//compiling our SCSS files
gulp.task('styles', function() {
    gulp.src('resources/assets/site/sass/pages/convidado.scss')
            .pipe(sass({
                  errLogToConsole: true,
                  includePaths: [
                      'resources/assets/site/sass/'
                  ]
            }))
            .pipe(gulp.dest('public/assets/site/styles'));

    return gulp.src('resources/assets/site/sass/init.scss')
            //prevent pipe breaking caused by errors from gulp plugins
            .pipe(plumber({
              errorHandler: function (err) {
                console.log(err);
                this.emit('end');
              }
            }))
            //get sourceMaps ready
            .pipe(sourceMaps.init())
            //include SCSS and list every "include" folder
            .pipe(sass({
                  errLogToConsole: true,
                  includePaths: [
                      'resources/assets/site/sass/'
                  ]
            }))
            .pipe(autoprefixer({
               browsers: autoPrefixBrowserList,
               cascade:  true
            }))
            //catch errors
            .on('error', gutil.log)
            //the final filename of our combined css file
            .pipe(concat('styles.css'))
            //get our sources via sourceMaps
            .pipe(sourceMaps.write())
            //where to save our final, compressed css file
            .pipe(gulp.dest('public/assets/site/styles'));
            //notify browserSync to refresh
});

//compiling our SCSS files for deployment
gulp.task('styles-deploy', function() {
    //the initializer / master SCSS file, which will just be a file that imports everything
    return gulp.src('resources/assets/site/sass/init.scss')
            .pipe(plumber())
            //include SCSS includes folder
            .pipe(sass({
                  includePaths: [
                      'resources/assets/site/sass',
                  ]
            }))
            .pipe(autoprefixer({
              browsers: autoPrefixBrowserList,
              cascade:  true
            }))
            //the final filename of our combined css file
            .pipe(concat('styles.css'))
            .pipe(minifyCSS())
            //where to save our final, compressed css file
            .pipe(gulp.dest('public/assets/site/css'));
});


//migrating over all HTML files for deployment
gulp.task('html-deploy', function() {

    gulp.src('resources/assets/site/fonts/**/*')
        //prevent pipe breaking caused by errors from gulp plugins
        .pipe(plumber())
        .pipe(gulp.dest('public/assets/site/fonts'));

    //grab all of the styles
    gulp.src(['resources/assets/site/sass/*.css', '!resources/assets/site/sass/styles.css'])
        //prevent pipe breaking caused by errors from gulp plugins
        .pipe(plumber())
        .pipe(gulp.dest('public/assets/site/css'));
});


//this is our master task when you run `gulp` in CLI / Terminal
//this is the main watcher to use when in active development
//  this will:
//  startup the web server,
//  start up browserSync
//  compress all scripts and SCSS files
gulp.task('default', ['scripts', 'styles', 'images-deploy'], function() {
    //a list of watchers, so it will watch all of the following files waiting for changes
    gulp.task('resources/assets/site/js/src/**', ['scripts']);
    gulp.task('resources/assets/site/sass/**', ['styles']);
    gulp.task('resources/assets/site/images/**', ['images-deploy']);
    gulp.task('resources/assets/site/json/**', ['copy']);
});

gulp.task('watch', ['scripts', 'styles', 'images-deploy'], function() {
    gulp.watch('resources/assets/site/js/src/**', ['scripts']);
    gulp.watch('resources/assets/site/sass/**', ['styles']);
    gulp.watch('resources/assets/site/images/**', ['images-deploy']);
    gulp.watch('resources/assets/site/json/**', ['copy']);
});

//this is our deployment task, it will set everything for deployment-ready files
gulp.task('deploy', gulpSequence( ['scripts-deploy', 'styles-deploy', 'images-deploy'], 'html-deploy', 'copy'));

gulp.task('admin-fonts', function() {
    gulp.src(['resources/assets/admin/fonts/**/*'])
        //prevent pipe breaking caused by errors from gulp plugins
        .pipe(plumber())
        .pipe(gulp.dest('public/assets/admin/fonts'));
});
gulp.task('admin-scripts', function() {
    gulp.src(['resources/assets/admin/js/**/*','resources/assets/admin/plugins/**/*'])
        //prevent pipe breaking caused by errors from gulp plugins
        .pipe(plumber())
        .pipe(gulp.dest('public/assets/admin/js'));
});
gulp.task('admin-styles', function() {
    return gulp.src(['resources/assets/admin/bootstrap/bootstrap.less','resources/assets/admin/less/AdminLTE.less'])
            .pipe(plumber({
              errorHandler: function (err) {
                console.log(err);
                this.emit('end');
              }
            }))
            .pipe(sourceMaps.init())
            .pipe(less({
                  errLogToConsole: true,
                  includePaths: [
                      'resources/assets/admin/'
                  ]
            }))
            .pipe(autoprefixer({
               browsers: autoPrefixBrowserList,
               cascade:  true
            }))
            //catch errors
            .on('error', gutil.log)
            //the final filename of our combined css file
            .pipe(concat('styles.css'))
            //get our sources via sourceMaps
            .pipe(sourceMaps.write())
            //where to save our final, compressed css file
            .pipe(gulp.dest('public/assets/admin/styles'));
});

gulp.task('admin', ['admin-fonts', 'admin-styles','admin-scripts'], function() {
    //a list of watchers, so it will watch all of the following files waiting for changes
    gulp.watch('resources/assets/admin/js/**', ['admin-scripts']);
    gulp.watch('resources/assets/admin/less/**/*', ['admin-styles']);
});

gulp.task('admin-deploy', gulpSequence( ['admin-fonts', 'admin-styles','admin-scripts']));
