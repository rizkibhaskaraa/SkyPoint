import React, { Component } from 'react';
import {Switch, Route} from 'react-router-dom';
import './assets/css/login/login.css';
import 'bootstrap/dist/css/bootstrap.min.css';
import Home from './controller/home'

import Login from './controller/Login'

class App extends Component {
  render() {
    return (
      <React.Fragment>
        <Navbar></Navbar>

        <Switch>
        <Route path='/home' component={Home}></Route>

          <div className="App">
            <div className="container">
              <Route exact path="/login" component={Login} />
            </div>
          </div>
        </Switch>
        <Modal></Modal>
      </React.Fragment>
    );
  }
}

export default App;
