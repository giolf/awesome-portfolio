var gulp    = require('gulp');
var webpack = require('webpack-stream');
var sass    = require('gulp-sass');
var flatten = require('gulp-flatten');

var paths = {
    apTmpl: {
        src: 'templates/*',
        dest: '../../themes/organic_photographer/'
    },
    js: {
        src: './src/js/**/*.js'
    },
    sass: {
        src: 'src/sass/**/*.scss',
        dest: './dist/css/'
    },
    webpack: {
        config: './webpack.config.js',
        dest: './dist/js/'
    }
};

gulp.task('copy-ap-templates', function() {
    gulp.src(paths.apTmpl.src)
    .pipe(gulp.dest(paths.apTmpl.dest));
});

gulp.task('sass', function() {
    gulp.src(paths.sass.src)
        .pipe(sass().on('error', sass.logError))
        .pipe(flatten())
        .pipe(gulp.dest(paths.sass.dest));
});

gulp.task('webpack', function() {
    return webpack(require(paths.webpack.config))
        .pipe(gulp.dest(paths.webpack.dest));
});

gulp.task('watch', function() {
    gulp.watch(paths.apTmpl.src, ['copy-ap-templates']);
    gulp.watch(paths.js.src, ['webpack']);
    gulp.watch(paths.sass.src, ['sass']);
});

gulp.task('default', ['copy-ap-templates', 'sass', 'webpack']);
