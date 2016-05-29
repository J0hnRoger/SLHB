var gulp = require('gulp');
var inject = require('gulp-inject');
var mainBowerFiles = require('gulp-main-bower-files');
var sass = require('gulp-sass');
var browserSync = require('browser-sync');
var reload = browserSync.reload;
var series = require('stream-series');
var gutil = require( 'gulp-util' );
var ftp = require( 'vinyl-ftp' );
var argv = require('yargs').argv

var THEME_NAME = "SLHB";


/** Configuration **/
var host = 'ftp.slhb.fr';
var port = 21;
var localFilesGlob = ['./resources/*/*/*.*'];
var remoteFolder = '/www/htdocs/content/themes/SLHB'

// helper function to build an FTP connection based on our configuration
function getFtpConnection(username, password) {
    return ftp.create({
        host: host,
        port: port,
        user: username,
        password: password,
        parallel: 5,
        log: gutil.log
    });
}

/**
 * Deploy task.
 * Copies the new files to the server
 *
 * Usage: `FTP_USER=someuser FTP_PWD=somepwd gulp ftp-deploy`
 */
gulp.task('ftp-deploy', function() {
    var conn = getFtpConnection(argv.username, argv.password);

    return gulp.src(localFilesGlob, { base: '.', buffer: false })
        .pipe( conn.newer( remoteFolder ) ) // only upload newer files
        .pipe( conn.dest( remoteFolder ) );
});

gulp.task('main-bower-files', function() {
    return gulp.src('./bower.json')
        .pipe(mainBowerFiles())
        .pipe(gulp.dest('./resources/assets'));
});

gulp.task('inject', [ 'main-bower-files' ], function () {
  var target = gulp.src('./resources/views/layouts/main.scout.php');
  var vendorSrc = gulp.src(['./resources/assets/**/*.js', './resources/assets/**/*.css', '!./resources/assets/css/*.css'], {read: false});
  var customSrc = gulp.src(['./resources/assets/css/*.css']);

  return target.pipe(inject(series(vendorSrc, customSrc), {addPrefix : '/content/themes/'+ THEME_NAME +'/'}))
    .pipe(gulp.dest('./resources/views/layouts/'));
});

gulp.task('styles', function() {

    gulp.src('./resources/assets/sass/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./resources/assets/css/'));
});

gulp.task('browser-sync', function() {
    var files = [
        './resources/**/*.php',
        './resources/assets/**/*.js',
        './resources/assets/**/*.css'
    ];
    browserSync.init(files, {
        proxy : 'slhb.dev'
    });
});

gulp.task('default', ['browser-sync'], function(){
  gulp.watch('./resources/assets/sass/*.scss',['styles']);
});
