var gulp = require('gulp'),
    sass = require('gulp-sass'),
    cleanCSS = require('gulp-clean-css'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    pipeline = require('readable-stream').pipeline;

gulp.task('compile-sass', function(){
    return gulp.src(['*.sass', 'public/assets/src/sass/*.sass'])
    .pipe(sass().on('error', function(err){
        console.log(err);
    }))
    .pipe(concat('app.css'))
    .pipe(gulp.dest('public/assets/dist/css'))
});

gulp.task('minify-css', () => {
    return gulp.src('public/assets/dist/css/*.css')
      .pipe(cleanCSS({compatibility: 'ie8'}))
      .pipe(gulp.dest('public/assets/dist/css'));
});

gulp.task('minify-js', function () {
    return pipeline(
        gulp.src(['*.js','public/assets/src/javascript/*.js']),
        uglify(),
        gulp.dest('public/assets/dist/javascript')
    );
});

gulp.task('looking', function() {
    gulp.watch(['*.scss', 'public/assets/src/sass/*.sass'], gulp.series('compile-sass'));
    gulp.watch(['*.css', 'public/assets/dist/css/*.css'], gulp.series('minify-css'));
    gulp.watch(['*.js', 'public/assets/src/javascript/*.js'], gulp.series('minify-js'));
});

gulp.task('default', gulp.series('looking'));