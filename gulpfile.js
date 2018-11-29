let gulp          = require('gulp');
let $             = require('gulp-load-plugins')();
let autoprefixer  = require('autoprefixer');

let sassPaths = [
    'node_modules/foundation-sites/scss',
    'node_modules/motion-ui/src'
];

gulp.task('sass', () => {
    return gulp
        .src('src/scss/app.scss')
        .pipe($.sass({
            includePaths: sassPaths,
            // outputStyle: 'compressed'
        })
            .on('error', $.sass.logError))
        .pipe($.postcss([
            autoprefixer({ browsers: ['last 2 versions', 'ie >= 9'] })
        ]))
        .pipe(gulp.dest('public/css'))
});

gulp.task('sass-admin', () => {
    return gulp
        .src('src/scss/admin.scss')
        .pipe($.sass({
            includePaths: sassPaths,
            // outputStyle: 'compressed'
        })
            .on('error', $.sass.logError))
        .pipe($.postcss([
            autoprefixer({ browsers: ['last 2 versions', 'ie >= 9'] })
        ]))
        .pipe(gulp.dest('public/css'))
});

gulp.task('purgecss', () => {
    return gulp
        .src('public/css/app.css')
        .pipe(
            $.purgecss({
                content: ['app/views/pages/*.php', 'app/views/partials/*.php']
            })
        )
        .pipe(gulp.dest('public/css'))
});

gulp.task('nano', () => {
    return gulp
        .src('public/css/app.css')
        .pipe($.cssnano())
        .pipe(gulp.dest('public/css'))
});

gulp.task('watch', () => {
    gulp.watch('src/scss/*.scss', ['sass']);
});

gulp.task('default', ['sass', 'watch']);