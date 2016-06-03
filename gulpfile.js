var gulp = require('gulp');
var sass = require('gulp-sass');
var input = 'dev/sass/**/*.scss';
var output = '';


var autoprefixer = require('gulp-autoprefixer');


gulp.task('watch', function(){
	gulp.watch(input, ['sass']);
});

gulp.task('sass', function(){
  return gulp.src(input) // Gets all files ending with .scss in app/scss and children dirs
    .pipe( sass() ) // Converts Sass to CSS with gulp-sass
    .pipe( autoprefixer({ browsers: ['last 2 versions'] }) )
    .pipe( gulp.dest(output) )
});

