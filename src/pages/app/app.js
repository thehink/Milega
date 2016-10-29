require('./app.css');

import React from 'react';
import {Link} from 'react-router';


class App extends React.Component {
  render() {
    return (
      <app>
      <h1>MyApp</h1>
        {this.props.children}
      </app>
    );
  }
}

export default App;
