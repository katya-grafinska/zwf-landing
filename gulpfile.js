var gulp = require('gulp');
var sass = require('gulp-sass');
var staticHash = require('gulp-static-hash');
var browserSync = require('browser-sync');
var prefixer = require('gulp-autoprefixer');
var reload = browserSync.reload;
var baseDir = 'wp-content/themes/event-zero-waste';
var config = {
    proxy: 'http://localhost/zero-waste-fest'
};

gulp.task('webserver', function() {
    browserSync.init(config);
});

gulp.task('styles', function() {
    gulp.src(baseDir + '/assets/css/scss/style.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(prefixer())
        .pipe(gulp.dest(baseDir))
        .pipe(reload({stream: true}));
});

gulp.task( 'bs:php', function() {
    browserSync.reload();
});

gulp.task('watch', ['styles'], function() {
    gulp.watch(baseDir + '/assets/css/scss/partials/*.scss', ['styles']);
    gulp.watch(baseDir + '/**/*.php', ['bs:php']);
});

gulp.task('default', ['webserver', 'watch']);