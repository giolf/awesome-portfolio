var gulp = require('gulp');
var webpack = require('webpack-stream');

var paths = {
    apTmpl: {
        src: 'templates/*   ',
        dest: '../../themes/organic_photographer/'
    },
    js: {
        entries: './src/js/entries/*'
    },
    webpack: {
        config: './webpack.config.js',
        dest: 'dist/js/'
    }
};

gulp.task('copy-ap-templates', function() {
    gulp.src(paths.apTmpl.src)
    .pipe(gulp.dest(paths.apTmpl.dest));
});


gulp.task('webpack', function() {
    return webpack(require(paths.webpack.config))
        .pipe(gulp.dest(paths.webpack.dest));
});

gulp.task('watch', function() {
    gulp.watch(paths.apTmpl.src, ['copy-ap-templates']);
    gulp.watch(paths.js.entries, ['webpack']);
});

gulp.task('default', ['copy-ap-templates', 'webpack']);
