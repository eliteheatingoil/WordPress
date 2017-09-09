var gulp = require('gulp');
var livereload = require('gulp-livereload')
var uglify = require('gulp-uglify');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var sourcemaps = require('gulp-sourcemaps');
var imagemin = require('gulp-imagemin');
var pngquant = require('imagemin-pngquant');
var rename = require('gulp-rename');

minifyCss = require('gulp-minify-css'); //minifies css
concat = require('gulp-concat'); //joins multiple files into one

var paths = {
  images: 'images/*',
  images_dest: 'dist/img',
  sass: 'scss/**/*.scss',
  css_dest: 'dist/css',
  js: 'js/*.js',
  js_dest: 'dist/js'
};

gulp.task('imagemin', function() {
  return gulp.src(paths.images)
    .pipe(imagemin({
      progressive: true,
      use: [pngquant()]
    }))
    .pipe(gulp.dest(paths.images_dest));
});

gulp.task('css', function() {
  gulp.src(paths.sass)
    .pipe(sourcemaps.init())
    .pipe(sass({
      outputStyle: 'expanded'
    }).on('error', sass.logError))
    .pipe(autoprefixer(
      "Android 2.3",
      "Android >= 4",
      "Chrome >= 20",
      "Firefox >= 24",
      "Explorer >= 8",
      "iOS >= 6",
      "Opera >= 12",
      "Safari >= 6"
    ))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest(paths.css_dest));
});

gulp.task('minifyCss', function() {
  gulp.src(paths.sass)
    .pipe(sourcemaps.init())
    .pipe(sass({
      outputStyle: 'compressed'
    }).on('error', sass.logError))
    .pipe(autoprefixer(
      "Android 2.3",
      "Android >= 4",
      "Chrome >= 20",
      "Firefox >= 24",
      "Explorer >= 8",
      "iOS >= 6",
      "Opera >= 12",
      "Safari >= 6"
    ))
    .pipe(minifyCss())
    .pipe(rename({
      suffix: '.min'
    }))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest(paths.css_dest));
});

gulp.task('uglify', function() {
  gulp.src(paths.js)
    .pipe(uglify('main.js'))
    .pipe(rename({
      suffix: '.min'
    }))
    .pipe(gulp.dest(paths.js_dest));
});

gulp.task('watch', function() {
  livereload.listen();

  gulp.watch('scss/**/*.scss', ['css']);
  gulp.watch('scss/**/*.scss', ['minifyCss']);
  gulp.watch('js/main.js', ['uglify']);
  gulp.watch(['dist/css/*.css', 'dist/js/main.min.js'], function(files) {
    livereload.changed(files)
  });
});