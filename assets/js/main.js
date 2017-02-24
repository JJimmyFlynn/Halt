// External Dependencies
import $ from 'jquery';

// Dependencies
import Router from './util/router';
import common from './routes/Common';
import home from './routes/Home';
import aboutUs from './routes/About';

// Use this object to list all page-specific functions imported above;
const routes = {
  // General
  common,
  // Home page
  home,
  // About us page, not the change from about-us to aboutUs
  aboutUs,
};

// Load all the things
$(document).ready(() => new Router(routes).loadEvents());