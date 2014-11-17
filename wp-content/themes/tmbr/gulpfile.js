(function() {
  var CONF, browserSync, del, es, gulp, runSequence, watch, _;

  watch = require('gulp-watch');
  _ = require('./node_modules/underscore');
  del = require('del');
  runSequence = require('run-sequence');
  CONF = require('./gulp/config');
  gulp = require('./gulp')(CONF.tasks);
  es = require('event-stream');

  // browserSync = require('browser-sync');
  // gulp.task('browser-sync', function() {
  //   return browserSync({
  //     server: {
  //       baseDir: './'
  //     }
  //   });
  // });

  gulp.task('watch', function() {
    gulp.watch(['assets/stylesheets/**/*.scss'], ['sass']);
    gulp.watch(['assets/scripts/**/*.js'], ['concat_app']);
    return gulp.watch(['!assets/images/sprite/**/*', 'assets/images/**/*'], ['copy']);
  });

  gulp.task('copy', function() {
    return es.merge(gulp.src(['assets/images/**/*']).pipe(gulp.dest('public/images')), gulp.src(["assets/fonts/**"]).pipe(gulp.dest('public/fonts')));
  });

  gulp.task('clean', function(cb) {
    return del(['public/**'], cb);
  });

  gulp.task('compile', ['sass', 'concat_app', 'concat_vendor']);

  gulp.task('compress', ['uglify_app', 'uglify_vendor', 'cssmin']);

  gulp.task('build', function() {
    return runSequence('clean', 'compile', 'compress', 'copy', 'rev');
  });

  gulp.task('default', ['build', 'watch']);

}).call(this);