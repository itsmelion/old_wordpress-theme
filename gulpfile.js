var project 		= 'neat', // Project name, used for build zip.
url 			= 'neat.dev', // Local Development URL for BrowserSync. Change as-needed.
bower 			= './assets/bower_components/'; // Not truly using this yet, more or less playing right now. TO-DO Place in Dev branch
build 			= './buildtheme/', // Files that you want to package into a zip go here
buildInclude 	= [
          // include common file types
          '**/*.php',
          '**/*.html',
          '**/*.css',
          '**/*.js',
          '**/*.svg',
          '**/*.ttf',
          '**/*.otf',
          '**/*.eot',
          '**/*.woff',
          '**/*.woff2',

          // include specific files and folders
          'screenshot.png',

          'assets/bower_components/**/*',

          // exclude files and folders
          '!node_modules/**/*',
          '!style.css.map',
          '!'+config.src+'/*'

        ];

const gulp = require('gulp');
const browserify = require('browserify');
const babelify   = require('babelify');
const source = require('vinyl-source-stream');
const buffer = require('vinyl-buffer');
const merge      = require('merge');
const rename     = require('gulp-rename');
const filter       = require('gulp-filter'),
const newer        = require('gulp-newer'),
const notify       = require('gulp-notify'),
const ignore       = require('gulp-ignore'),
const zip          = require('gulp-zip'),
const cache        = require('gulp-cache'),
const imagemin = require('gulp-imagemin');
const gulpLoadPlugins = require('gulp-load-plugins');
const browserSync = require('browser-sync').create();
const del = require('del');
const concat = require('gulp-concat');
const autoprefixer = require('autoprefixer');
const postcss = require('gulp-postcss');
const mqpacker = require('css-mqpacker');
const runSequence = require('run-sequence');
const {phpMinify} = require('@cedx/gulp-php-minify');
const $ = gulpLoadPlugins();
const reload = browserSync.reload;

var dev = true;

var config = {
  dist:'./dist',
  src: './src',
  styles:{
    main: config.src+'/scss/style.scss'
  },
  js: {
      src: config.src+'/js/scripts.js',       // Entry point
      outputDir: './dist/js/',  // Directory to save bundle to
      mapDir: './maps/',      // Subdirectory to save maps to
      outputFile: 'scripts.js' // Name to use for bundle
  },
};

gulp.task('styles', () => {
  return gulp.src(config.styles.main)
    .pipe($.sass.sync({
      outputStyle: 'expanded',
      precision: 3
    }).on('error', $.sass.logError))
    .pipe(postcss([mqpacker, autoprefixer()]))
    .pipe($.cssnano({
      safe: true,
      autoprefixer: false
    }))
    .pipe(gulp.dest('.'))
    .pipe(reload({stream:true}));
});

function bundle (bundler) {
    // Add options to add to "base" bundler passed as parameter
  bundler
    .bundle()
    .pipe(source(config.js.src))
    .pipe(buffer())
    .pipe($.if(!dev, $.uglify({
      compress: {
        drop_console: true
      }
    })))
    .pipe(rename(config.js.outputFile))
    .pipe($.sourcemaps.init({ loadMaps : true }))
    .pipe($.sourcemaps.write(config.js.mapDir))
    .pipe(gulp.dest(config.js.outputDir))        // Save 'bundle' to build/
    .pipe(reload({stream: true}));
              
}
gulp.task('scripts'),()=>{
    return gulp.src([bower+'**/*.js', config.js.src])
    .pipe(concat('scripts.js'))
    .pipe(uglify())
    .pipe(rename( {
      basename: "scripts",
      suffix: '.min'
    }))
    .pipe(gulp.dest(config.js.outputDir))
    .pipe(notify({ message: 'scripts complete', onLast: true }));
}
gulp.task('browserify', () => {

  var bundler = browserify(config.js.src)
  .transform(babelify, { presets : [ 'es2015' ] });
  bundle(bundler);
    
});

gulp.task('php', () => {
  gulp.src('./**/*.php', {read: false})
  .pipe(phpMinify())
  .pipe(gulp.dest(dist))
});

gulp.task('html', () => {
  return gulp.src('./partials/*.html')
    .pipe($.htmlmin({
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
    }))
    .pipe(gulp.dest(dist+'/partials'));
});

gulp.task('images', () => {
  return gulp.src(config.src+'/images/**/**.{png,jpg,gif,svg}')
  .pipe(newer(config.src+'/img/'))
  .pipe(imagemin({ optimizationLevel: 7, progressive: true, interlaced: true }))
  .pipe(gulp.dest(config.dist+'/images'))
  .pipe( notify( { message: 'Images are fine', onLast: true } ) );
});

gulp.task('fonts', () => {
  return gulp.src(require('main-bower-files')('**/*.{eot,svg,ttf,woff,woff2}', function (err) {})
      .concat(config.src+'/fonts/**/*'))
    .pipe(gulp.dest(config.dist+'/fonts'));
});


gulp.task('serve', () => {
  runSequence(['clean'], ['styles', 'scripts', 'fonts', 'images'], () => {
    browserSync.init({
      notify: true,
      proxy: "localhost/sense-backup/"
    });

    gulp.watch([
      '**/*.php',
      './dist/images/**/*',
      './dist/fonts/**/*'
    ]).on('change', reload);
    gulp.watch('./src/images/**/*', ['images']);
    gulp.watch('./src/scss/**/*.scss', ['styles']);
    gulp.watch('./src/js/**/*.js', ['scripts']);
    gulp.watch('./src/fonts/**/*', ['fonts']);
  });
});


gulp.task('clear', function () {
  cache.clearAll();
 });
gulp.task('clean', function() {
  return 	gulp.src(['**/.sass-cache','**/.DS_Store'], { read: false })
        del.bind(null, ['.tmp', config.dist])
        .pipe(ignore('node_modules/**'))
 });
 
gulp.task('buildFiles', function() {
  return 	gulp.src(buildInclude)
        .pipe(gulp.dest(build))
        .pipe(notify({ message: 'Copy from buildFiles complete', onLast: true }));
});
gulp.task('buildZip', function () {
  return 	gulp.src(build+'/**/')
        .pipe(zip(project+'.zip'))
        .pipe(gulp.dest('./'))
        .pipe(notify({ message: 'Zip task complete', onLast: true }));
 });

gulp.task('build', ['cleanup', 'styles', 'scripts', 'php', 'html', 'images', 'fonts', 'buildFiles'], () => {
  return gulp.src(build+'/**/*').pipe($.size({
    title: 'build',
    gzip: true
  }));
});

gulp.task('default', () => {
  return new Promise(resolve => {
    dev = false;
    runSequence(['clean'], 'build', ['buildZip', 'clear'], resolve);
  });
});
