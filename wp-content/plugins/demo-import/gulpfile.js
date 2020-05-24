var gulp = require("gulp"),
	autoprefixer = require("gulp-autoprefixer"),
	sass = require("gulp-sass"),
	livereload = require("gulp-livereload"),
	gulp_clean_css = require("gulp-clean-css"),
	concat = require('gulp-concat'),
	minify = require('gulp-minify');

gulp.task("sass", function(){
	return gulp.src("assets/sass/**/*.scss")
		.pipe(sass())
		.on("error", sass.logError)
		.pipe(autoprefixer({
			browsers: ['last 30 versions']
		}))
		.pipe(gulp.dest("assets/css"))
		.pipe(livereload());
});

gulp.task("watch", function(){
	livereload.listen();

	gulp.watch("assets/sass/**/*.scss", ["sass"]);
});

gulp.task("default", ["sass", "watch"]);