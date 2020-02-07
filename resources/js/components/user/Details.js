import React, { Component } from 'react';
import Tab from 'react-bootstrap/Tab';
import Tabs from 'react-bootstrap/Tabs'
import Nav from './Nav';
import Gall from './Gallery';
import Videos from '../Videos'
import './app.css';

export default class Details extends Component {
    render() {
        return (
            <Tabs style={{ justifyContent: 'center',
            alignItems: 'center' }} defaultActiveKey="detail" transition={false} id="noanim-tab-example">
  <Tab eventKey="detail" title="Info">
    <p>something here</p>
  </Tab>
  <Tab style={{position: 'absolute'}} eventKey="profile" title="Photos">
    <Gall />
  </Tab>
  <Tab eventKey="contact" title="Videos">
  <div className="container">
  <p>some tab taxt</p>
</div>
    
  </Tab>
</Tabs>
        )
    }
}
