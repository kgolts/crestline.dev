(function() {
  var gulp;

  gulp = require('gulp');

  module.exports = function() {
    return gulp.src('assets/fonts').pipe(gulp.dest('public/fonts'));
  };

}).call(this);