require('./bootstrap');

global.$ = global.jQuery = require('jquery');
require('jquery-ui');

$('#date_picker').datepicker();

require('datatables.net');
require('datatables.net-dt');
