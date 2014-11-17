(function() {
  module.exports = {
    tasks: [
      'sass',
      'cssmin',
      'concat_app',
      'concat_vendor',
      'uglify_app',
      'uglify_vendor',
      'sprite',
      // 'browser_sync',
      'rev',
      'deploy'
    ],
    files: {
      watch: {
        concat: [],
        style: []
      },
      concat_vendor: [
        'assets/components/modernizr/modernizr.js',
        'assets/components/underscore/underscore.js',
        'assets/components/jquery/dist/jquery.js',
        'assets/components/fancybox/source/jquery.fancybox.js',
        'assets/components/jquery-ui-1.10.4.custom/js/jquery-ui-1.10.4.custom.js',
        'assets/components/imagesloaded/imagesloaded.pkgd.js',
        'assets/components/Velocity.js/jquery.velocity.js',
        'assets/components/dropkick/jquery.dropkick.js',
        'assets/components/mousetrap/mousetrap.js',
        'assets/components/jquery-hoverIntent/jquery.hoverIntent.js',
        'assets/components/jquery-dotimeout/jquery.ba-dotimeout.js',
        'assets/components/jquery.equalheights/jquery.equalheights.js',
        'assets/components/jquery-cycle2/build/jquery.cycle2.js',
        'assets/components/jquery.cookie/jquery.cookie.js',
        'assets/components/jquery-infinite-scroll/jquery.infinitescroll.js',
        'assets/components/fitvids/jquery.fitvids.js',
        'assets/components/jquery-form/jquery.form.js',
        'assets/components/twbs-bootstrap-sass/vendor/assets/javascripts/bootstrap/collapse.js',
        'assets/components/twbs-bootstrap-sass/vendor/assets/javascripts/bootstrap/transition.js'
      ],
      concat_app: [
        'assets/scripts/_frontpage.js',
        'assets/scripts/index.js',
        'assets/scripts/_slider.js'
      ]
    }
  };

}).call(this);