
// Gulp + autoloaded plugins
var args = require('yargs').argv;
var del = require('del');
var gulp = require('gulp');

// Mostly autoloaded plugins
var plugins = require('gulp-load-plugins')();


//
// Config
//
var config = {
	source: ['scroll-scope.js']
};



//
// TASKS
//

gulp.task('build', function () {
	var files = gulp.src(config.source);
	return files
		.pipe(plugins.plumber())
		.pipe(plugins.uglify({
			preserveComments: 'some'
		}))
		.pipe(plugins.rename({suffix: '.min'}))
		.pipe(gulp.dest('./'));
});



//
// Default
//
gulp.task('default', [], function () {
	gulp.start('build');
});
