require('bootstrap/dist/css/bootstrap.min.css');
require('font-awesome/css/font-awesome.min.css');
require('./app.css');

import React from 'react';
import {Link} from 'react-router';

import FontAwesome from 'react-fontawesome';
import { Navbar, NavbarBrand, Nav, NavItem, NavLink } from 'reactstrap';


class App extends React.Component {
  render() {
    return (
      <app>
      <Navbar color="inverse" dark full>
      <button className="navbar-toggler hidden-sm-up pull-right" type="button">
        &#9776;
      </button>
        <div className="container">
            <Link to={'/'} className="navbar-brand">Milega</Link>
            <div className="navbar-toggleable-xs collapse">
            <Nav className="float-xs-left" navbar>
              <NavItem>
                <Link to={'/'} className="nav-link">Home</Link>
              </NavItem>
              <NavItem>
                <Link to={'/about'} className="nav-link">About</Link>
              </NavItem>
            </Nav>
            <Nav className="float-sm-right float-xs-left" navbar>
              <NavItem>
                <Link to={'/login'} className="nav-link">Login</Link>
              </NavItem>
            </Nav>
            </div>
          </div>
        </Navbar>
        {this.props.children}
      </app>
    );
  }
}

export default App;
