const gulp = require('gulp');
const browserSync = require('browser-sync').create();

gulp.task('php', done => {
  browserSync.reload();
  done();
});

gulp.task('browser-sync', function() {
  browserSync.init({
    proxy: 'localhost',
    files: "assets/*/*"
  });
});

gulp.task('watch', ['browser-sync'], function (){
  // Watches for .php file changes
  gulp.watch("**/*.php", ['php']);
});

gulp.task('default', ['watch']);
