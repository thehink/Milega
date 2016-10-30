require('bootstrap/dist/css/bootstrap.min.css');
require('font-awesome/css/font-awesome.min.css');
require('../styles/app.css');

import React from 'react';
import {Link} from 'react-router';
import { connect } from 'react-redux';
import {bindActionCreators} from 'redux';

import {loginUser} from '../actions';

import FontAwesome from 'react-fontawesome';
import { Navbar, NavbarBrand, Nav, NavItem, NavLink } from 'reactstrap';


import Header from '../views/header/Header';
import Footer from '../views/footer/Footer';

class App extends React.Component {
  render() {
    console.log(loginUser, 'asd');
    return (
      <app>
        <Header />
        {this.props.children}
        <Footer />
      </app>
    );
  }
}

const mapStateToProps = state => ({
  isAuthenticating: state.isAuthenticating,
})


export default connect(mapStateToProps,
  {
    loginUser
  }
)(App)
