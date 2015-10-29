var gulp = require('gulp');
var inject = require('gulp-inject');
var mainBowerFiles = require('gulp-main-bower-files');
var sass = require('gulp-sass');
var browserSync = require('browser-sync');
var reload = browserSync.reload;

var THEME_NAME = "SLHB";

gulp.task('main-bower-files', function() {
    return gulp.src('./bower.json')
        .pipe(mainBowerFiles())
        .pipe(gulp.dest('./app/assets'));
});

gulp.task('inject', function () {
  var target = gulp.src('./app/views/material-welcome.scout.php');
  var sources = gulp.src(['./app/assets/**/*.js', './app/assets/**/*.css'], {read: false});
 
  return target.pipe(inject(sources, {addPrefix : '/content/themes/'+ THEME_NAME +'/'}))
    .pipe(gulp.dest('./app/views/'));
});

gulp.task('styles', function() {
    gulp.src('./app/assets/sass/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./app/assets/css/'));
});

gulp.task('browser-sync', function() {
    var files = [
        './app/**/*.php',
        './app/assets/**/*.js',
        './app/assets/**/*.css'
    ]
    browserSync.init(files, {
        proxy : 'slhb.dev'
    });
});

gulp.task('default', ['browser-sync'], function(){
    gulp.watch('./app/assets/sass/*.scss',['styles']);
});