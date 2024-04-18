import 'bootstrap';

import $ from 'jquery';
window.$ = window.jQuery = $;
var jQuery = $;

import 'jquery-mask-plugin';

import * as Ladda from 'ladda';
window.Ladda = Ladda;

import Chart from 'chart.js/auto';
window.Chart = Chart;

import colorLib from '@kurkle/color';
window.colorLib = colorLib;

import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

import select2 from 'select2';
select2(window, $);

import { jsPDF } from "jspdf";
window.jsPDF = jsPDF;

import DataTable from 'datatables.net-bs5';
import languagePTDatatable from 'datatables.net-plugins/i18n/pt-BR.mjs';
window.languagePTDatatable = languagePTDatatable
