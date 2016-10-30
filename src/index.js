import 'core-js/fn/object/assign';
import React from 'react';
import ReactDOM from 'react-dom';
import { createStore } from 'redux'
import { Provider } from 'react-redux'
import reducer from './reducers';

import App from './containers/App';

import Home from './views/Home/home';
import About from './views/About/about';
import NotFound from './views/not-found/NotFound';

import { Router, Route, IndexRoute, browserHistory } from 'react-router';

const store = createStore(reducer);

ReactDOM.render(
  <Provider store={store}>
    <Router history={ browserHistory }>
      <Route path='/' component={ App }>
        <IndexRoute component={ Home } />
        <Route path='about' component={ About } />
        <Route path='*' component={ NotFound } />
      </Route>
    </Router>
  </Provider>,
  document.getElementById('app')
);
