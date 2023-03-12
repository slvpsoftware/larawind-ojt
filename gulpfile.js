var gulp = require('gulp');
var browserSync = require('browser-sync').create();
var sass = require('gulp-sass')(require('sass'));
const concat = require('gulp-concat');
const cleanCss = require('gulp-clean-css');

// Compile sass into CSS & auto-inject into browsers
gulp.task('sass', function() {

    return gulp.src("src/resources/css/*.scss")
    .pipe(sass())
    .pipe(gulp.dest("src/resources/css"))
    .pipe(browserSync.stream());
});

// Concat and minify CSS files
gulp.task('minify', () => {

    return gulp.src('src/resources/css/*.css')
    .pipe(concat('styles.min.css'))
    .pipe(cleanCss())
    .pipe(gulp.dest('src/resources/css/min'))
    .pipe(browserSync.stream());
});


// Static Server + watching scss/html files
gulp.task('serve', gulp.series('sass', function() {
    browserSync.init({
        server: './src/resources/'
    });

    gulp.watch("src/resources/css/*.scss", gulp.series('sass'));
    gulp.watch("src/resources/css/*.css", gulp.series('minify'));
    gulp.watch("src/resources/views/*.blade.php").on('change', browserSync.reload);
}));

gulp.task('default', gulp.series('serve'));