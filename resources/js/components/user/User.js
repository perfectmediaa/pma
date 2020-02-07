import React from 'react'
import ReactDOM from 'react-dom';
import Sidebar from './Sidebar';
import Details from './Details';
import Edit from './Edit';
import Nav from './Nav';
import Timeline from './Timeline';
import {
    HashRouter,
    Switch,
    BrowserRouter as Router,
    Route,
  } from 'react-router-dom'


export default function User() {
    return (
            <HashRouter>
                <Sidebar />
            
                <Switch>
                    <Route path="/" exact component ={Details}/>
                    <Route path="/edit" component ={Edit}/>
                    <Route path="/timeline" component ={Timeline}/>
                    
                </Switch>
                
            </HashRouter>
    )
}
if (document.getElementById('user')) {
    ReactDOM.render(<User />, document.getElementById('user'));
}