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

	mix.copy('../../../node_modules/bootstrap/dist/fonts', 'public/fonts')
		.copy('../../../node_modules/font-awesome/fonts', 'public/fonts');

	mix.scripts([

		'../../../node_modules/jquery/dist/jquery.js',
		'../../../node_modules/bootstrap/dist/js/bootstrap.js',
		'../../../node_modules/datatables/media/js/jquery.dataTables.js',
		//'../../../node_modules/datatables/media/js/dataTables.bootstrap.js',
		'../../../node_modules/moment/moment.js',
		'../../../node_modules/moment/locale/pt-br.js',
		'../../../node_modules/jquery-mask-plugin/dist/jquery.mask.js',
		'../../../node_modules/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
	
		'main.js'
	], 'js/app.js');

	mix.styles([

		'../../../node_modules/bootstrap/dist/css/bootstrap.css',
		//'../../../node_modules/bootstrap/dist/fonts',
		'../../../node_modules/datatables/media/css/jquery.dataTables.css',
		//'../../../node_modules/datatables/media/css/dataTables.bootstrap.css',
		'../../../node_modules/font-awesome/css/font-awesome.css',
		//'../../../node_modules/font-awesome/fonts',
		'../../../node_modules/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css',

	], 'css/app.css');


});