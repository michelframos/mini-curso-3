module.exports = function(grunt){

    require('jit-grunt')(grunt);

    grunt.initConfig({

        less:{
            development: {
                files: {
                    'css/site.css' : 'css/site.less'
                }
            }
        },

        watch: {
            styles: {
                files: ['**/*.less'],
                tasks: ['less']
            }
        }

    });

    grunt.registerTask('default', ['less','watch']);

};
