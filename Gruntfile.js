module.exports = function(grunt) {
	const sass = require('node-sass');

    // 1. All configuration goes here
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        // Grunt-sass
        sass: {
          app: {
            files: [{
              expand: true,
              cwd: 'library/scss',
              src: ['*.scss'],
              dest: 'library/css',
              ext: '.css'
            }]
          },
          options: {
			implementation: sass,
            sourceMap: false,
            outputStyle: 'nested',
            imagePath: "library/images",
            require: 'susy'
          }
        },


        copy: {
            main: {
                files: [
                    {expand: true, src: ['**','!build/**','!node_modules/**','!.git/**','!sass/**','!package.json','!Gruntfile.js','!*.DS_store','!vendor/**', '!library/js/libs/**', '!.stylelintrc', '!composer.*', '!package-lock.json', '!TODO', '!jbc-wp-theme.*', '.gitignore', '!.eslintrc', '!.nvmrc', '!phpcs.xml.dist', '!jbc.code-workspace'], dest: 'build/'},
                ],
            },
        },

        buildcontrol: {
            deploy: {
              options: {
                dir: 'build',
                remote: 'git@github.com:streeetlamp/jbc-wp-theme.git',
                connectCommits: true,
                branch: 'build',
                remoteBranch: 'build',
                commit: true,
                push: true,
                message: 'Built from commit %sourceCommit% on branch %sourceBranch%'
              }
          }
        },

        clean: {
            build: {
                src: ['!build/.git/**', 'build/**/*']
            }
        },
    });

    // 3. Where we tell Grunt what plugins to use

    // Sass
    grunt.loadNpmTasks('grunt-sass');

    // Building
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-build-control');

    // Deploy
    grunt.registerTask('deploy', ['clean', 'copy', 'buildcontrol']);
};
