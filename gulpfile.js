var gulp     = require('gulp');
var webpack  = require('webpack-stream');
var sass     = require('gulp-sass');
var flatten  = require('gulp-flatten');
var taskTime = require('gulp-total-task-time');
var environments = require('gulp-environments');
var development = environments.development;
var production = environments.production;
var paths = {
    apTmpl: {
        src: 'src/templates/*',
        dest: '../../themes/organic_photographer/'
    },
    fonts: {
        srcUIkit: './node_modules/bower_components/uikit/fonts/*',
        srcAPort: './src/fonts/*',
        dest: './dist/fonts/'
    },
    js: {
        src: './src/js/**/*.js'
    },
    sass: {
        src: './src/sass/**/*.scss',
        entries: './src/sass/entries/*.scss',
        dest: './dist/css/'
    },
    vueComponents: {
        src: './src/js/components/**/*.vue'
    },
    webpack: {
        config: './webpack.config.js',
        dest: './dist/js/'
    }
};

taskTime.init();

gulp.task('copy-ap-templates', function() {
    return gulp.src(paths.apTmpl.src)
        .pipe(gulp.dest(paths.apTmpl.dest));
});

gulp.task('copy-fonts', ['copy-ap-templates'], function() {
    return gulp.src([
        paths.fonts.srcUIkit,
        paths.fonts.srcAPort
    ])
    .pipe(gulp.dest(paths.fonts.dest));
});

gulp.task('sass', ['copy-fonts'], function() {
    return gulp.src(paths.sass.entries)
        .pipe(development(
            sass()
            .on('error', sass.logError)
        ))
        .pipe(production(
            sass({outputStyle: 'compressed'})
            .on('error', sass.logError)
        ))
        .pipe(flatten())
        .pipe(gulp.dest(paths.sass.dest));
});

gulp.task('webpack', ['sass'], function() {
    return webpack(require(paths.webpack.config))
        .pipe(gulp.dest(paths.webpack.dest));
});

gulp.task('watch', function() {
    gulp.watch(paths.apTmpl.src, ['copy-ap-templates']);
    gulp.watch(paths.js.src, ['webpack']);
    gulp.watch(paths.vueComponents.src, ['webpack']);
    gulp.watch(paths.sass.src, ['sass']);
});

gulp.task('default', ['copy-ap-templates', 'copy-fonts', 'sass', 'webpack', 'watch']);
gulp.task('build', ['copy-ap-templates', 'copy-fonts', 'sass', 'webpack']);
