const { src, dest, series } = require('gulp');
const sass = require('gulp-sass');
const inlinesource = require('gulp-inline-source');
const autoprefixer = require('gulp-autoprefixer');

function scss() {
  return src('./sass/**/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(dest('./temp'));
}

function prefix() {
  return src('./temp/style.css')
    .pipe(autoprefixer())
    .pipe(dest('./css'));
}

function inlinecss() {
  return src('temp/header.php')
    .pipe(inlinesource())
    .pipe(dest('./'));
}

exports.prefix = prefix;
exports.scss = scss;
exports.inlinecss = inlinecss;

exports.default = series(scss, prefix, inlinecss);