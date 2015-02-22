module.exports = function(grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        uglify: {
            development: {
                options: {
                    beautify: true,
                    mangle: false
                },
                files: {
                    'js/script.min.js': ['js/jquery.mmenu.min.js', 'js/jquery.say.js', 'js/script.js']
                }
            },
            production: {
                files: {
                    'js/script.min.js': ['js/jquery.mmenu.min.js', 'js/jquery.say.js', 'js/script.js']
                }
            }
        },
        autoprefixer: {
            options: {
                browsers: ['last 2 versions', 'ie 8', 'ie 9'],
                map: true
            },
            no_dest: {
                src: 'style.css'
            }
        },
        imagemin: {
            png: {
                options: {
                    optimizationLevel: 7
                },
                files: [
                {
                        expand: true,
                        cwd: 'img-uncompressed',
                        src: ['**/*.png', 'favicons/*.ico', 'favicons/*.xml'],
                        dest: 'img',
                        ext: '.png'
                    }
                ]
            },
            jpg: {
                options: {
                    progressive: true
                },
                files: [
                    {
                        expand: true,
                        cwd: 'img-uncompressed',
                        src: ['**/*.jpg'],
                        dest: 'img',
                        ext: '.jpg'
                    }
                ]
            },
            svg: {
                files: [
                    {
                        expand: true,
                        cwd: 'img-uncompressed',
                        src: ['**/*.svg'],
                        dest: 'img',
                        ext: '.svg'
                    }
                ]
            },
            gif: {
                files: [
                    {
                        expand: true,
                        cwd: 'img-uncompressed',
                        src: ['**/*.gif'],
                        dest: 'img',
                        ext: '.gif'
                    }
                ]
            }
        },
        notify: {
            html: {
                options: {
                    title: 'Done!',
                    message: 'HTML files copied!'
                }
            },
            styles: {
                options: {
                    title: 'Done!',
                    message: 'Styles compiled!'
                }
            },
            images: {
                options: {
                    title: 'Done!',
                    message: 'Images optimized!'
                }
            },
            scripts: {
                options: {
                    title: 'Done',
                    message: 'JS Optimized'
                }
            },
            done: {
                options: {
                    title: 'Done',
                    message: ':)'
                }
            }
        },
        shell: {
            clean: {
              command: 'rm -rf _build/*'
            }
        },
        watch: {
            styles: {
                files: ['styles/**/*.scss'],
                tasks: ['sass', 'autoprefixer', 'notify:styles']
            },
            html: {
                files: ['*.html'],
                tasks: ['copy', 'notify:html']
            },
            images: {
                files: ['img/**/*.{png,jpg,gif,svg}'],
                tasks: ['newer:imagemin', 'notify:images']
            },
            scripts: {
                files: ['js/**/*.js'],
                tasks: ['uglify:development', 'notify:scripts']
            }
        },
        concurrent: {
            developmentTarget1: ['newer:imagemin', 'uglify:development'],
            productionTarget1: ['newer:imagemin', 'uglify:production'],
            target2: ['autoprefixer', 'notify:done']
        }
    });

    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-shell');
    grunt.loadNpmTasks('grunt-contrib-imagemin');
    grunt.loadNpmTasks('grunt-newer');
    grunt.loadNpmTasks('grunt-autoprefixer');
    grunt.loadNpmTasks('grunt-notify');
    grunt.loadNpmTasks('grunt-concurrent');

    grunt.registerTask('default', ['concurrent:developmentTarget1', 'concurrent:target2', 'watch']);
    grunt.registerTask('clean', ['shell:clean']);
    grunt.registerTask('production', ['concurrent:productionTarget1', 'concurrent:target2']);
};