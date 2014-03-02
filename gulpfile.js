var gulp = require('gulp'),
    less = require('gulp-less'),
    minifycss = require('gulp-minify-css'),
    autoprefixer = require('gulp-autoprefixer');

var paths = {
    styles: {
        src: [
            'app/assets/styles/application.less',
            'themes/sarine/assets/styles/sarine.less'
        ],
        watch: [
            'app/assets/styles/**/*.less',
            'themes/sarine/assets/styles/**/*.less'
        ]
    },
    scripts: ['app/assets/scripts/**/*.js'],
    fonts: [
        'themes/sarine/assets/fonts/**/*.*'
    ]
};

gulp.task('styles', function () {
    return gulp.src(paths.styles.src)
        .pipe(less())
        .pipe(autoprefixer('last 15 version'))
        .pipe(gulp.dest('public/assets/styles'));
});

gulp.task('scripts', function () {
    return gulp.src(paths.scripts)
        .pipe(gulp.dest('public/assets/scripts'));
});

gulp.task('fonts', function () {
    return gulp.src(paths.fonts)
        .pipe(gulp.dest('public/assets/fonts'));
});
 
gulp.task('watch', function () {
    gulp.watch(paths.styles.watch, ['styles']);
    gulp.watch(paths.scripts, ['scripts']);
});

gulp.task('default', ['styles', 'scripts', 'fonts', 'watch']);
