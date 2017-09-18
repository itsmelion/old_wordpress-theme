var dev = true;

var config = {
  dist:'./dist',
  src: './src',
  styles:{
    main: './src/scss/style.scss'
  },
  js: {
      src: './src/js/scripts.js',       // Entry point
      outputDir: './dist/js/',  // Directory to save bundle to
      mapDir: './maps/',      // Subdirectory to save maps to
      outputFile: 'scripts.js' // Name to use for bundle
  },
};
var project 		= 'neat', // Project name, used for build zip.
url 			= 'neat.dev', // Local Development URL for BrowserSync. Change as-needed.
bower 			= './bower_components/'; // Not truly using this yet, more or less playing right now. TO-DO Place in Dev branch
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
          '!src/*'

        ];


gulp.task('scripts'),()=>{
    return gulp.src(['./src/js/scripts.js'])
    .pipe(concat('scripts.js'))
    .pipe(uglify())
    .pipe(rename( {
      suffix: '.min'
    }))
    .pipe(gulp.dest(dist+'js'))
    .pipe(notify({ message: 'scripts complete', onLast: true }));
}
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
    .pipe(gulp.dest(dist+'partials'));
});

gulp.task('images', () => {
  return gulp.src(config.src+'/images/**/**.{png,jpg,gif,svg}')
  .pipe(newer(config.src+'/img/'))
  .pipe(imagemin({ optimizationLevel: 7, progressive: true, interlaced: true }))
  .pipe(gulp.dest(config.dist+'/images'))
  .pipe( notify( { message: 'Images are fine', onLast: true } ) );
});

gulp.task('fonts', () => {
  return gulp.src('**/*.{eot,svg,ttf,woff,woff2}')
    .pipe(gulp.dest(dist+'/fonts'));
});


gulp.task('clear', function () {
  cache.clearAll();
 });
gulp.task('clean', function() {
  return 	gulp.src(['**/.sass-cache','**/.DS_Store'], { read: false })
        del.bind(null, ['.tmp', dist])
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

gulp.task('default', () => {
  return new Promise(resolve => {
    dev = false;
    runSequence(['clean'], 'build', ['buildZip', 'clear'], resolve);
  });
});

const gulp = require('gulp');
const autoprefixer = require('autoprefixer');
const browserSync = require('browser-sync').create();
const postcss = require('gulp-postcss');
const del = require('del');
const mqpacker = require('css-mqpacker');
const cssnano = require('cssnano');
const babel = require('gulp-babel');
const eslint = require('gulp-eslint');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const cache = require('gulp-cache');
const htmlmin = require('gulp-htmlmin');
const gulpif = require('gulp-if');
const imageMin = require('gulp-imagemin');
const sass = require('gulp-sass');
const maps = require('gulp-sourcemaps');
const runsequence = require('run-sequence');
const size = require('gulp-size');
const mainBowerFiles = require('main-bower-files');
const syncpkg = require('sync-pkg');
const wiredep = require('wiredep').stream;
const gzip = require('gulp-gzip');
const elixir = require('laravel-elixir');
const rev = require('gulp-rev');
const newer = require('gulp-newer');
const {
  phpMinify
} = require('@cedx/gulp-php-minify');
const argv = require('yargs').argv;
const reload = browserSync.reload;

const appURL = "http://planetexpat.org/"
const source = './src';
const dist = './dist';

const vendors = [
  "./node_modules/jquery/dist/jquery.js",
  "./node_modules/gsap/TweenLite.js",
  "./node_modules/jquery.cookie/jquery.cookie.js",
  source + '/vendors/*.js'
];

gulp.task('coreStyles', () => {
  gulp.src(source + '/styles/style.scss')
    .pipe(sass.sync({
      outputStyle: 'expanded',
      precision: 3
    }).on('error', sass.logError))
    .pipe(postcss([mqpacker(), autoprefixer(), cssnano({
      safe: true,
      autoprefixer: false
    })]))
    .pipe(gulp.dest(dist))
    .pipe(reload({
      stream: true
    }));
});

gulp.task('asyncStyles', () => {
  gulp.src(source + '/async.scss')
    .pipe(sass.sync({
      outputStyle: 'expanded',
      precision: 3
    }).on('error', sass.logError))
    .pipe(postcss([mqpacker(), autoprefixer(), cssnano({
      safe: true,
      autoprefixer: false
    })]))
    .pipe(gulp.dest(dist))
    .pipe(reload({
      stream: true
    }));
});

gulp.task('scripts', () => {
  gulp.src(source + '/scripts/core/**/*.js')
    .pipe(concat('app.js'))
    .pipe(babel({
      "presets": ["es2015"]
    }))
    .pipe(gulpif(argv.production, uglify()))
    .pipe(gulp.dest(dist+'/scripts'))
    .pipe(reload({
      stream: true
    }));
});

gulp.task('vendors', () => {
  gulp.src(vendors)
    .pipe(concat('vendors.js'))
    .pipe(gulpif(argv.production, uglify()))
    .pipe(gulp.dest(dist+'/scripts'))
    .pipe(reload({
      stream: true
    }));
});

gulp.task('lazy', () => {
  gulp.src(source + '/scripts/lazy/*.js')
    .pipe(concat('lazy.js'))
    .pipe(gulpif(argv.production, uglify()))
    .pipe(gulp.dest(dist+'/scripts'))
    .pipe(reload({
      stream: true
    }));
});

// gulp.task('html', () => {
//   gulp.src('./resources/views/front/footer.blade.php')
//     .pipe(wiredep({

//       dependencies: true, // default: true
//       includeSelf: false, // default: false

//       overrides: {
//         // see `Bower Overrides` section below.
//         //
//         // This inline object offers another way to define your overrides if
//         // modifying your project's `bower.json` isn't an option.
//       },

//       fileTypes: {
//         // defaults:
//         html: {
//           block: /(([ \t]*)<!--\s*bower:*(\S*)\s*-->)(\n|\r|.)*?(<!--\s*endbower\s*-->)/gi,
//           detect: {
//             js: /<script.*src=['"]([^'"]+)/gi,
//             css: /<link.*href=['"]([^'"]+)/gi
//           },
//           replace: {
//             js: '<script async src="{{filePath}}"></script>',
//             css: '<link async href="{{filePath}}" />'
//           }
//         }

//       }

//     }))
//     .pipe(htmlmin({
//       collapseWhitespace: true,
//       minifyCSS: true,
//       processConditionalComments: false,
//       removeComments: false,
//       removeEmptyAttributes: false,
//       removeScriptTypeAttributes: false,
//       removeStyleLinkTypeAttributes: true
//     }))
//     .pipe(gulp.dest('./resources/views/front/'));
// });

gulp.task('images', () => {
  gulp.src(source + '/images/**/*')
    .pipe(newer(dist + '/images'))
    .pipe(imageMin({
      interlaced: true,
      progressive: true,
      optimizationLevel: 5,
      svgoPlugins: [{
        removeViewBox: true
      }]
    }))
    .pipe(gulp.dest(dist + '/images'));
});

gulp.task('serve', () => {
  runsequence('build', () => {
    browserSync.init({
      proxy: appURL,
      notify: true,
      open: false,
      port: 9000
    });

    gulp.watch([
      source + '/**/*.html',
      source + '/images/**/*',
    ]).on('change', reload);

    gulp.watch(source + '/styles/**/*.scss', ['coreStyles', 'asyncStyles', 'adminCss']);
    gulp.watch(source + '/scripts/**/*.js', ['scripts']);
  });
});

gulp.task('gzip', () => {
  gulp.src([dist + '/*.js', dist + './dist/*.css'])
    .pipe(gzip())
    .pipe(gulp.dest(dist));
});

gulp.task('build', () => {
  runsequence(['vendors', 'scripts', 'coreStyles', 'asyncStyles', 'lazy'], 'images')
});