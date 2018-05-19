'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var uglify = require('gulp-uglify');
var gulpIf = require('gulp-if');
var cssnano = require('gulp-cssnano');
var imagemin = require('gulp-imagemin');
var concat = require('gulp-concat');
var stripDebug = require('gulp-strip-debug');

gulp.task('sass', function(){
    // return gulp.src('app/scss/**/*.scss')
    return gulp.src('app/scss/app.scss')
        .pipe(sass())
        .pipe(gulpIf('*.css', cssnano()))
        .pipe(gulp.dest('dest/css'))

});

gulp.task('css', function () {

    gulp.src([
        './node_modules/bootstrap/dist/css/bootstrap.min.css',
        './node_modules/bootstrap-rtl/dist/css/bootstrap-rtl.min.css',
        './node_modules/font-awesome/css/font-awesome.min.css',
        './node_modules/owl.carousel/dist/assets/owl.carousel.min.css',
        './node_modules/owl.carousel/dist/assets/owl.theme.default.min.css',
        './node_modules/jquery-bar-rating/dist/themes/fontawesome-stars-o.css'
    ])
        .pipe(concat('./core.min.css'))
        .pipe(gulp.dest('./dest/css'));
});

gulp.task('uglify', function(){
    return gulp.src('app/js/**/*.js')
        .pipe(concat('./app.js'))
        .pipe(gulpIf('*.js', uglify()))
        .pipe(gulp.dest('dest/js'))
});

gulp.task('js', function () {

    gulp.src(['./node_modules/jquery/dist/jquery.min.js',
        './node_modules/bootstrap/dist/js/bootstrap.min.js',
        './node_modules/owl.carousel/dist/owl.carousel.min.js',
        './node_modules/jquery-bar-rating/dist/jquery.barrating.min.js'
    ])
        .pipe(concat('./core.min.js'))
        .pipe(stripDebug())
        .pipe(uglify())
        .pipe(gulp.dest('./dest/js'));
});

gulp.task('images', function(){
    return gulp.src('app/images/**/*.+(png|jpg|jpeg|gif|svg)')
        .pipe(imagemin())
        .pipe(gulp.dest('dest/images'))
});

gulp.task('fonts', function() {
    return gulp.src('app/fonts/**/*')
        .pipe(gulp.dest('dest/fonts'))
})

gulp.task('watch', [ 'sass' , 'uglify' , 'images' , 'fonts' , 'js', 'css'] , function(){
    gulp.watch('app/scss/**/*.scss', ['sass']);
    gulp.watch('app/js/**/*.js', ['uglify']);
});


