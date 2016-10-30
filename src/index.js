import 'core-js/fn/object/assign';
import React from 'react';
import ReactDOM from 'react-dom';

import App from './pages/App/';
import Home from './pages/Home/home';
import About from './pages/About/about';
import NotFound from './pages/not-found/not-found';

import { Router, Route, IndexRoute, browserHistory } from 'react-router';

ReactDOM.render(
  <Router history={ browserHistory }>
    <Route path='/' component={ App }>
      <IndexRoute component={ Home } />
      <Route path='about' component={ About } />
      <Route path='*' component={ NotFound } />
    </Route>
  </Router>,
  document.getElementById('app')
);
