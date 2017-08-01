const gulp = require('gulp');
const gulpLoadPlugins = require('gulp-load-plugins');
const browserSync = require('browser-sync').create();
const del = require('del');
const autoprefixer = require('autoprefixer');
const postcss = require('gulp-postcss');
const mqpacker = require('css-mqpacker');
const runSequence = require('run-sequence');
const {phpMinify} = require('@cedx/gulp-php-minify');
const $ = gulpLoadPlugins();
const reload = browserSync.reload;

var dev = true;

gulp.task('styles', () => {
  return gulp.src('src/scss/style.scss')
    .pipe($.if(dev, $.sourcemaps.init()))
    .pipe($.sass.sync({
      outputStyle: 'expanded',
      precision: 3
    }).on('error', $.sass.logError))
    .pipe(postcss([mqpacker, autoprefixer()]))
    .pipe($.if(!dev, $.cssnano({
      safe: true,
      autoprefixer: false
    })))
    .pipe($.if(dev, $.sourcemaps.write()))
    .pipe(gulp.dest('.'))
    .pipe(reload({stream:true}));
});

gulp.task('scripts', () => {
  return gulp.src('src/js/**/*.js')
    .pipe($.if(dev, $.sourcemaps.init()))
    .pipe($.babel())
    .pipe($.if(dev, $.sourcemaps.write('.'), gulp.dest('dist/js')))
    .pipe($.if(!dev, $.uglify({
      compress: {
        drop_console: true
      }
    })))
    .pipe($.if(dev, gulp.dest('dist/js')))
    .pipe(reload({stream: true}));
});

gulp.task('php', () => gulp.src('**/*.php', {read: false})
.pipe($.phpMinify())
.pipe(gulp.dest('dist'))
);

gulp.task('html', ['styles', 'scripts'], () => {
  return gulp.src('partials/*.html')
    .pipe($.if(!dev, $.htmlmin({
      collapseWhitespace: true,
      minifyCSS: true,
      minifyJS: {
        compress: {
          drop_console: true
        }
      },
      processConditionalComments: true,
      removeComments: true,
      removeEmptyAttributes: false,
      removeScriptTypeAttributes: false,
      removeStyleLinkTypeAttributes: false
    })))
    .pipe(gulp.dest('dist/partials'));
});

gulp.task('images', () => {
  return gulp.src('src/images/**/*')
  .pipe(gulp.dest('dist/images'));
});

gulp.task('fonts', () => {
  return gulp.src(require('main-bower-files')('**/*.{eot,svg,ttf,woff,woff2}', function (err) {})
      .concat('src/fonts/**/*'))
    .pipe(gulp.dest('dist/fonts'));
});

gulp.task('extras', () => {
  return gulp.src([
    'src/*',
    '!src/*.html'
  ], {
    dot: true
  }).pipe(gulp.dest('dist'));
});

gulp.task('clean', del.bind(null, ['.tmp', 'dist']));

gulp.task('serve', () => {
  runSequence(['clean'], ['styles', 'scripts', 'fonts', 'images'], () => {
    browserSync.init({
      notify: true,
      proxy: "localhost/sense-backup/"
    });

    gulp.watch([
      '**/*.php',
      'src/images/**/*',
      '.tmp/fonts/**/*'
    ]).on('change', reload);

    gulp.watch('src/scss/**/*.scss', ['styles']);
    gulp.watch('src/js/**/*.js', ['scripts']);
    gulp.watch('src/fonts/**/*', ['fonts']);
  });
});

gulp.task('serve:dist', ['default'], () => {
  browserSync.init({
    notify: false,
    port: 9000,
    server: {
      baseDir: ['dist']
    }
  });
});

gulp.task('build', ['styles', 'scripts', 'html', 'images', 'fonts', 'extras'], () => {
  return gulp.src('dist/**/*').pipe($.size({
    title: 'build',
    gzip: true
  }));
});

gulp.task('default', () => {
  return new Promise(resolve => {
    dev = false;
    runSequence(['clean'], 'build', resolve);
  });
});
