var gulp = require('gulp');

var paths = {
    apTmpl: {
        src: [
            'templates/single-project.php',
            'templates/template-projects.php'
        ],
        dist: '../../themes/organic_photographer/'
    }
};
gulp.task('copy-ap-templates', function() {
    gulp.src(paths.apTmpl.src)
    .pipe(gulp.dest(paths.apTmpl.dist));
});

gulp.task('default', ['copy-ap-templates']);
