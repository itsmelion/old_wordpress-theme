module.exports = function (grunt) {

	grunt.initConfig({

		pkg: grunt.file.readJSON('package.json'),

		// check our JS
		jshint: {
			options: {
				"bitwise": true,
				"browser": true,
				"curly": true,
				"eqeqeq": true,
				"eqnull": true,
				"esnext": true,
				"immed": true,
				"jquery": true,
				"latedef": true,
				"newcap": true,
				"noarg": true,
				"node": true,
				"strict": false,
				"trailing": true,
				"undef": true,
				"globals": {
					"jQuery": true,
					"alert": true
				}
			},
			all: [
				'gruntfile.js',
				'../js/scripts.js',
				'./js/scripts.js'
			]
		},

		// concat and minify our JS
		uglify: {
			dist: {
				files: {
					'../js/scripts.min.js': [
						'../js/scripts.js'
					]
				}
			}
		},

		// compile your sass
		/*sass: {
			dev: {
				options: {
					style: 'expanded'
				},
				src: ['../scss/style.scss'],
				dest: '../style.css'
			},
			prod: {
				options: {
					// or
					map: {
							inline: false, // save all sourcemaps as separate files...
							annotation: '../alive8/css/maps/' // ...to the specified directory
					},

					processors: [
						require('pixrem')(), // add fallbacks for rem units
						require('autoprefixer')({browsers: 'last 2 versions'}), // add vendor prefixes
						require('cssnano')() // minify the result
					]
				},
				dist: {
					src: ['../scss/style.scss'],
					dest: '../style.css'
				}
			}
		},*/

	sass: {
		dist: {
			files: {
				'../style.css': '../scss/style.scss'
			},
			processors: [
				require('autoprefixer')(),
				require('cssnano')()
			]
		},
		},
	postcss: {
				options: {
					// or
					map: {
							inline: false, // save all sourcemaps as separate files...
							annotation: '../alive8/css/maps/' // ...to the specified directory
					},

					processors: [
						require('pixrem')(), // add fallbacks for rem units
						require('autoprefixer')({browsers: 'last 2 versions'}), // add vendor prefixes
						require('cssnano')() // minify the result
					]
				},
				dist: {
					src: ['../style.css'],
					dest: '../style.css'
				}
			},

		// watch for changes
		watch: {
			scss: {
				files: ['../scss/**/*.scss'],
				tasks: [
					'css',
					'notify:scss'
				]
			},
			js: {
				files: [
					'<%= jshint.all %>'
				],
				tasks: [
					'jshint',
					'uglify',
					'notify:js'
				]
			}
		},

		// check your php


		// notify cross-OS
		notify: {
			scss: {
				options: {
					title: 'Grunt, grunt!',
					message: 'SCSS is all gravy'
				}
			},
			js: {
				options: {
					title: 'Grunt, grunt!',
					message: 'JS is all good'
				}
			},
			dist: {
				options: {
					title: 'Grunt, grunt!',
					message: 'Theme ready for production'
				}
			}
		},

		clean: {
			dist: {
				src: ['../alive8'],
				options: {
					force: true
				}
			}
		},

		copyto: {
			dist: {
				files: [{
					cwd: '../',
					src: ['**/*'],
					dest: '../alive8/',
					expand: true
				}],
				options: {
					ignore: [
						'../alive8{,/**/*}',
						'../doc{,/**/*}',
						'../grunt{,/**/*}',
						'../scss{,/**/*}'
					]
				}
			}
		}
	});

	// Load NPM's via matchdep
	require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

	grunt.registerTask('css', ['sass', 'postcss']);

	// Development task
	grunt.registerTask('default', [
		'jshint',
		'css'
	]);

	// Production task
	grunt.registerTask('dist', function () {
		grunt.task.run([
			'jshint',
			'uglify',
			'css',
			'clean:dist',
			'copyto:dist',
			'notify:dist'
		]);
	});
};