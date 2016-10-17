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
var concat = require('gulp-concat');
var del = require('del');
var ftpJson = require("../../../../ftp-conf.json");

var THEME_NAME = "SLHB";

/** Configuration **/
var host = 'ftp.slhb.fr';
var port = 21;

var localFilesGlob = ['./resources/**/*.*', '!./resources/assets/sass/*.*'];
var remoteFolder = '/www/htdocs/content/themes/SLHB'

// helper function to build an FTP connection based on our configuration
function getFtpConnection(username, password) {
    if (username == undefined || password == undefined)
    {
        username = ftpJson.ftpUser;
        password = ftpJson.ftpPassword;
    }

    gutil.log(gutil.colors.magenta('Connexion FTP : ', username, ' password : ', password ));

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
 * Usage: `C:\wamp\www\SLHB\htdocs\content\themes\SLHB>gulp ftp-deploy --username <username> --password <mdp>`
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

// Copy all custom app files to the deployment folder
gulp.task('teambuilder' , function () {
    var dest = './resources/assets/team-builder/dist/';
    var appJs =  ['./resources/assets/team-builder/**/*.module.js', './resources/assets/team-builder/**/*.js'];
    del.sync('./resources/assets/team-builder/dist/team-builder-min.js');

    gulp.src(appJs)
        .pipe(concat('team-builder-min.js'))
        // Wrap the app.js for loaded after the sharepoint scripts
        .pipe(gulp.dest(dest));
});

// Copy all custom app files to the deployment folder
gulp.task('weekplanner' , function () {
    var dest = './resources/assets/week-planner/dist/';
    var appJs =  ['./resources/assets/week-planner/**/*.module.js', './resources/assets/week-planner/**/*.js'];
    del.sync('./resources/assets/week-planner/dist/week-planner-min.js');

    gulp.src(appJs)
        .pipe(concat('week-planner-min.js'))
        // Wrap the app.js for loaded after the sharepoint scripts
        .pipe(gulp.dest(dest));
});

gulp.task('browser-sync' , function() {
    var files = [
        './resources/**/*.php',
        './resources/assets/**/*.js',
        './resources/assets/**/*.css',
        './resources/assets/**/*.html'
    ];
    browserSync.init(files, {
        proxy : 'slhb.dev'
    });
});

gulp.task('default', ['browser-sync'], function(){
  gulp.watch('./resources/assets/week-planner/**/*.js', ['weekplanner']);
  gulp.watch('./resources/assets/team-builder/**/*.js', ['teambuilder']);
  gulp.watch('./resources/assets/sass/*.scss',['styles']);
});
