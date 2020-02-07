import React from 'react'

import ReactDOM from 'react-dom';

import axios from 'axios';
import { Link } from 'react-router-dom';
import Tab from 'react-bootstrap/Tab'
function Nav(){
    return(
        <Tabs defaultActiveKey="home" transition={false} id="noanim-tab-example">
            <Tab eventKey="home" title="Home">
                <p>tabt ghejsnbs dkjh</p>
            </Tab>
            <Tab eventKey="profile" title="Profile">
                <p> thie sos kjs</p>
            </Tab>
            
        </Tabs>
    );
}
export default Nav;