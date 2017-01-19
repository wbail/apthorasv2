const elixir = require('laravel-elixir');

//require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

// elixir(mix => {
//     mix.sass('app.scss')
//        .webpack('app.js');
// });

elixir(function(mix) {

	mix.copy('../../../bower_components/bootstrap/dist/fonts', 'public/fonts')
		.copy('../../../bower_components/font-awesome/fonts', 'public/fonts');

	mix.scripts([

		'../../../bower_components/jquery/dist/jquery.js',
		'../../../bower_components/bootstrap/dist/js/bootstrap.js',
		'../../../bower_components/datatables/media/js/jquery.dataTables.js',
		'../../../bower_components/datatables/media/js/dataTables.bootstrap.js',
		'../../../bower_components/moment/moment.js',
		'../../../bower_components/moment/locale/pt-br.js',
		'../../../bower_components/jquery-mask-plugin/dist/jquery.mask.js',
		'../../../bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
		'../../../bower_components/jquery-dateFormat/dist/dateFormat.js',
		'../../../bower_components/seiyria-bootstrap-slider/dependencies/js/modernizr.js',
		'../../../bower_components/seiyria-bootstrap-slider/dist/bootstrap-slider.js',
		'../../../bower_components/summernote/dist/summernote.js',
		'../../../bower_components/summernote/lang/summernote-pt-BR.js',
		'../../../resources/assets/js/main.js'

	], 'public/js/app.js');

	mix.styles([

		//'../../../bower_components/bootstrap/dist/fonts',
		//'../../../bower_components/font-awesome/fonts',
		'../../../bower_components/bootstrap/dist/css/bootstrap.css',
		'../../../bower_components/datatables/media/css/jquery.dataTables.css',
		'../../../bower_components/datatables/media/css/dataTables.bootstrap.css',
		'../../../bower_components/font-awesome/css/font-awesome.css',
		'../../../bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css',
		'../../../bower_components/seiyria-bootstrap-slider/dist/css/bootstrap-slider.css',
		'../../../bower_components/summernote/dist/summernote.css',

	], 'public/css/app.css');




});