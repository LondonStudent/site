var gulp = require('gulp')
    , util = require('gulp-util')
    , rename = require('gulp-rename')
    , browserSync = require('browser-sync')
    , sass = require('gulp-sass')
    , reload = browserSync.reload

var theme = './wp/wp-content/themes/londonstudent/'

gulp.task('serve', ['sass'], function() {
    if (util.env.sync) {
        browserSync({
            proxy: 'londonstudent.dev'
        })
    }

    gulp.watch(theme + 'scss/**/*.scss', ['sass'])
    gulp.watch(theme + '**/*.php').on('change', reload)
})

gulp.task('sass', function() {
    return gulp.src(theme + 'scss/style.scss')
        .pipe(sass({
            errLogToConsole: true
            ,includePaths: require('node-neat').includePaths
        }))
        .pipe(rename('style.css'))
        .pipe(gulp.dest(theme))
        .pipe(reload({stream: true}))
})

gulp.task('default', ['serve'])
gulp.task('build', ['sass'])
