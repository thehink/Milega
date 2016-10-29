import React from 'react';
import ReactDOM from 'react-dom';

import App from './pages/App/app';
import Home from './pages/Home/home';
import About from './pages/About/about';

import { Router, Route, IndexRoute, browserHistory } from 'react-router';

ReactDOM.render(
  <Router history={ browserHistory }>
    <Route path='/' component={ App }>
      <IndexRoute component={ Home } />
      <Route path='about' component={ About } />
    </Route>
  </Router>,
  document.getElementById('app')
);
