var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');


gulp.task('watch', function(){
	gulp.watch('dev/sass/**/*.scss', ['sass']);
});

gulp.task('sass', function(){
  return gulp.src('dev/sass/**/*.scss') // Gets all files ending with .scss in app/scss and children dirs
    .pipe( sass() ) // Converts Sass to CSS with gulp-sass
    .pipe( autoprefixer({ browsers: ['last 2 versions'] }) )
    .pipe( gulp.dest('') )
});

