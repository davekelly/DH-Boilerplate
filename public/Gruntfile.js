'use strict';
module.exports = function(grunt) {

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    jshint: {
      options: {
        // jshintrc: '.jshintrc'
      },
      all: [
        'Gruntfile.js',
        'js/*.js',
        '!js/<%= pkg.name %>.min.js'
      ]
    }, 
    less: {
      dist: {
        files: {
          'css/style.css': [
            'less/style.less'
          ]
        },
        options: {
          compress: true,
          // LESS source map
          // To enable, set sourceMap to true and update sourceMapRootpath based on your install
          sourceMap: false
        }
      }
    },
    uglify: {
      dist: {
        files: {
          'js/dist/<%= pkg.name %>.plugins.min.js': [
              'bower_components/respondJs/dest/respond.min.js',
          ],
          'js/dist/<%= pkg.name %>.min.js': 'js/*.js'
        },
        options: {
          // JS source map: to enable, uncomment the lines below and update sourceMappingURL based on your install
          // sourceMap: 'assets/js/scripts.min.js.map',
          // sourceMappingURL: '/app/themes/roots/assets/js/scripts.min.js.map'
        }
      }
    },
    watch: {
      less: {
        files: [
          'less/*.less'
          /*,
          'less/bootstrap/*.less' */
        ],
        tasks: ['less']
      },
      js: {
        files: [
          '<%= jshint.all %>'
        ],
       // tasks: ['jshint', 'uglify']
        tasks: [ 'uglify']
      },
      livereload: {
        // Browser live reloading
        // https://github.com/gruntjs/grunt-contrib-watch#live-reloading
        options: {
          livereload: true
        },
        files: [
          'css/style.css',
          'js/<%= pkg.name %>.min.js',
          // 'templates/*.php',
          '*.php'
        ]
      }
    },
    clean: {
      dist: [
        'css/style.css',
        'js/<%= pkg.name %>.min.js'
      ]
    }
  });

  // Load tasks
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-less');

  // Register tasks
  grunt.registerTask('default', [
    'clean',
    'less',
    'uglify'
  ]);
  grunt.registerTask('dev', [
    'watch'
  ]);

};