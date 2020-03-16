'use strict';
 
var gulp = require('gulp');
var sass = require('gulp-sass');
var inlinesource = require('gulp-inline-source');
 
gulp.task('sass', function () {
  return gulp.src('./sass/**/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('./css'));
});
 
gulp.task('sass:watch', function () {
  gulp.watch('./sass/**/*.scss', ['sass']);
});

gulp.task('inlinesource', function () {
    return gulp.src('temp/header.php')
        .pipe(inlinesource())
        .pipe(gulp.dest('./'));
});